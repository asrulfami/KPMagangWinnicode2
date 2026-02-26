<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $period = $request->get('period', 'this_month');

        if ($period === 'custom' && $request->filled('start_date') && $request->filled('end_date')) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
        } elseif ($period === 'this_year') {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();
        } elseif ($period === 'last_30_days') {
            $startDate = Carbon::now()->subDays(29)->startOfDay();
            $endDate = Carbon::now()->endOfDay();
        } else {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
            $period = 'this_month';
        }

        $baseQuery = Transaction::where('user_id', Auth::id())
            ->whereBetween('date', [$startDate->toDateString(), $endDate->toDateString()]);

        $totalIncome = (clone $baseQuery)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = (clone $baseQuery)
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $recentTransactions = (clone $baseQuery)
            ->with('category')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        $chartData = $this->getChartData(Auth::id());
        $categoryData = $this->getCategoryDataForRange(Auth::id(), $startDate, $endDate);

        return view('finance.dashboard', [
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'balance' => $balance,
            'recentTransactions' => $recentTransactions,
            'chartData' => $chartData,
            'categoryData' => $categoryData,
            'period' => $period,
            'startDate' => $startDate->toDateString(),
            'endDate' => $endDate->toDateString(),
        ]);
    }

    private function getChartData($userId)
    {
        $months = [];
        $incomeData = [];
        $expenseData = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('M');
            $year = $date->year;

            $months[] = $month;

            $income = Transaction::where('user_id', $userId)
                ->where('type', 'income')
                ->whereMonth('date', $date->month)
                ->whereYear('date', $year)
                ->sum('amount');

            $expense = Transaction::where('user_id', $userId)
                ->where('type', 'expense')
                ->whereMonth('date', $date->month)
                ->whereYear('date', $year)
                ->sum('amount');

            $incomeData[] = $income;
            $expenseData[] = $expense;
        }

        return [
            'labels' => $months,
            'income' => $incomeData,
            'expense' => $expenseData,
        ];
    }

    private function getCategoryData($userId, $month, $year)
    {
        $categories = Category::where('type', 'expense')
            ->where(function ($query) use ($userId) {
                $query->where('user_id', $userId)->orWhereNull('user_id');
            })
            ->get();

        $data = [];
        foreach ($categories as $category) {
            $amount = Transaction::where('user_id', $userId)
                ->where('category_id', $category->id)
                ->where('type', 'expense')
                ->whereMonth('date', $month)
                ->whereYear('date', $year)
                ->sum('amount');

            $data[] = [
                'name' => $category->name,
                'amount' => $amount,
            ];
        }

        return array_filter($data, fn($item) => $item['amount'] > 0);
    }

    private function getCategoryDataForRange($userId, $startDate, $endDate)
    {
        $categories = Category::where('type', 'expense')
            ->where(function ($query) use ($userId) {
                $query->where('user_id', $userId)->orWhereNull('user_id');
            })
            ->get();

        $data = [];
        foreach ($categories as $category) {
            $amount = Transaction::where('user_id', $userId)
                ->where('category_id', $category->id)
                ->where('type', 'expense')
                ->whereBetween('date', [$startDate->toDateString(), $endDate->toDateString()])
                ->sum('amount');

            $data[] = [
                'name' => $category->name,
                'amount' => $amount,
            ];
        }

        return array_filter($data, fn($item) => $item['amount'] > 0);
    }
}
