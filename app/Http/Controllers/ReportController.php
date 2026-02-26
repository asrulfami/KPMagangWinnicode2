<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = Carbon::parse($request->start_date)->toDateString();
            $endDate = Carbon::parse($request->end_date)->toDateString();
        } else {
            $startDate = Carbon::now()->startOfMonth()->toDateString();
            $endDate = Carbon::now()->endOfMonth()->toDateString();
        }

        $type = $request->get('type');

        $query = Transaction::with('category')
            ->where('user_id', Auth::id())
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date', 'desc');

        if ($type) {
            $query->where('type', $type);
        }

        $transactions = $query->get();

        $income = $transactions->where('type', 'income')->sum('amount');
        $expense = $transactions->where('type', 'expense')->sum('amount');
        $profit = $income - $expense;

        return view('finance.laporan', [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'income' => $income,
            'expense' => $expense,
            'profit' => $profit,
            'transactions' => $transactions,
            'type' => $type,
        ]);
    }
}
