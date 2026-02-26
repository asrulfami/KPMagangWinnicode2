<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::with('category')
            ->where('user_id', Auth::id())
            ->orderBy('date', 'desc');

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by date range
        if ($request->filled('start_date')) {
            $query->whereDate('date', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('date', '<=', $request->end_date);
        }

        // Search by title or description
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $transactions = $query->paginate(10)->withQueryString();
        
        return view('finance.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $categories = Category::where(function ($q) {
            $q->where('user_id', Auth::id())->orWhereNull('user_id');
        })->get();
        return view('finance.transactions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:income,expense',
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Transaction::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        $this->authorize($transaction);
        return view('finance.transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $this->authorize($transaction);
        $categories = Category::where(function ($q) {
            $q->where('user_id', Auth::id())->orWhereNull('user_id');
        })->get();
        return view('finance.transactions.edit', compact('transaction', 'categories'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize($transaction);

        $request->validate([
            'type' => 'required|in:income,expense',
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $transaction->update([
            'type' => $request->type,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $this->authorize($transaction);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    protected function authorize(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
