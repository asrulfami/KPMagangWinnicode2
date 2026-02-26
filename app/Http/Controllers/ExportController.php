<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'format' => 'in:csv,xlsx',
        ]);

        $format = $request->format ?? 'xlsx';

        return Excel::download(
            new TransactionsExport(
                Auth::id(),
                $request->start_date,
                $request->end_date,
                $request->type
            ),
            'transactions_' . $request->start_date . '_to_' . $request->end_date . '.' . $format
        );
    }
}

class TransactionsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $userId;
    protected $startDate;
    protected $endDate;
    protected $type;

    public function __construct($userId, $startDate, $endDate, $type = null)
    {
        $this->userId = $userId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->type = $type;
    }

    public function collection()
    {
        $query = Transaction::with('category')
            ->where('user_id', $this->userId)
            ->whereBetween('date', [$this->startDate, $this->endDate])
            ->orderBy('date', 'desc');

        if ($this->type) {
            $query->where('type', $this->type);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Type',
            'Title',
            'Category',
            'Amount',
            'Description',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->date->format('Y-m-d'),
            ucfirst($transaction->type),
            $transaction->title,
            $transaction->category?->name ?? 'N/A',
            number_format($transaction->amount, 2),
            $transaction->description ?? '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }
}
