<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create default user
        $user = User::create([
            'name' => 'Demo User',
            'email' => 'demo@finance.com',
            'password' => Hash::make('password'),
        ]);

        // Create categories
        $incomeCategories = [
            ['name' => 'Salary', 'type' => 'income'],
            ['name' => 'Freelance', 'type' => 'income'],
            ['name' => 'Investment', 'type' => 'income'],
            ['name' => 'Other Income', 'type' => 'income'],
        ];

        $expenseCategories = [
            ['name' => 'Food & Dining', 'type' => 'expense'],
            ['name' => 'Transportation', 'type' => 'expense'],
            ['name' => 'Utilities', 'type' => 'expense'],
            ['name' => 'Entertainment', 'type' => 'expense'],
            ['name' => 'Shopping', 'type' => 'expense'],
            ['name' => 'Healthcare', 'type' => 'expense'],
            ['name' => 'Office Supplies', 'type' => 'expense'],
            ['name' => 'Other Expense', 'type' => 'expense'],
        ];

        $categories = [];
        foreach (array_merge($incomeCategories, $expenseCategories) as $cat) {
            $categories[] = Category::create([
                'user_id' => null,
                'name' => $cat['name'],
                'type' => $cat['type'],
            ]);
        }

        // Get category IDs by type
        $incomeCategoryIds = Category::where('type', 'income')->pluck('id')->toArray();
        $expenseCategoryIds = Category::where('type', 'expense')->pluck('id')->toArray();

        // Create sample transactions for the last 6 months
        $transactions = [
            ['title' => 'Monthly Salary', 'amount' => 15000000, 'type' => 'income', 'category_id' => $incomeCategoryIds[0], 'months_ago' => 0],
            ['title' => 'Freelance Project', 'amount' => 5000000, 'type' => 'income', 'category_id' => $incomeCategoryIds[1], 'months_ago' => 0],
            ['title' => 'Monthly Salary', 'amount' => 15000000, 'type' => 'income', 'category_id' => $incomeCategoryIds[0], 'months_ago' => 1],
            ['title' => 'Investment Dividend', 'amount' => 2000000, 'type' => 'income', 'category_id' => $incomeCategoryIds[2], 'months_ago' => 1],
            ['title' => 'Monthly Salary', 'amount' => 15000000, 'type' => 'income', 'category_id' => $incomeCategoryIds[0], 'months_ago' => 2],
            ['title' => 'Monthly Salary', 'amount' => 15000000, 'type' => 'income', 'category_id' => $incomeCategoryIds[0], 'months_ago' => 3],
            ['title' => 'Freelance Project', 'amount' => 3500000, 'type' => 'income', 'category_id' => $incomeCategoryIds[1], 'months_ago' => 3],
            ['title' => 'Monthly Salary', 'amount' => 15000000, 'type' => 'income', 'category_id' => $incomeCategoryIds[0], 'months_ago' => 4],
            ['title' => 'Monthly Salary', 'amount' => 15000000, 'type' => 'income', 'category_id' => $incomeCategoryIds[0], 'months_ago' => 5],
            ['title' => 'Office Rent', 'amount' => 3000000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[6], 'months_ago' => 0],
            ['title' => 'Grocery Shopping', 'amount' => 1500000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[0], 'months_ago' => 0],
            ['title' => 'Electricity Bill', 'amount' => 500000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[2], 'months_ago' => 0],
            ['title' => 'Internet Bill', 'amount' => 350000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[2], 'months_ago' => 0],
            ['title' => 'Restaurant Dinner', 'amount' => 400000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[0], 'months_ago' => 0],
            ['title' => 'Office Rent', 'amount' => 3000000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[6], 'months_ago' => 1],
            ['title' => 'Grocery Shopping', 'amount' => 1200000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[0], 'months_ago' => 1],
            ['title' => 'Gas Bill', 'amount' => 450000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[2], 'months_ago' => 1],
            ['title' => 'Movie Tickets', 'amount' => 200000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[3], 'months_ago' => 1],
            ['title' => 'Office Rent', 'amount' => 3000000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[6], 'months_ago' => 2],
            ['title' => 'Grocery Shopping', 'amount' => 1300000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[0], 'months_ago' => 2],
            ['title' => 'Office Supplies', 'amount' => 750000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[6], 'months_ago' => 2],
            ['title' => 'Office Rent', 'amount' => 3000000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[6], 'months_ago' => 3],
            ['title' => 'Grocery Shopping', 'amount' => 1400000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[0], 'months_ago' => 3],
            ['title' => 'Office Rent', 'amount' => 3000000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[6], 'months_ago' => 4],
            ['title' => 'Grocery Shopping', 'amount' => 1350000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[0], 'months_ago' => 4],
            ['title' => 'Office Rent', 'amount' => 3000000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[6], 'months_ago' => 5],
            ['title' => 'Grocery Shopping', 'amount' => 1250000, 'type' => 'expense', 'category_id' => $expenseCategoryIds[0], 'months_ago' => 5],
        ];

        foreach ($transactions as $tx) {
            $date = Carbon::now()->subMonths($tx['months_ago']);
            Transaction::create([
                'user_id' => $user->id,
                'title' => $tx['title'],
                'category_id' => $tx['category_id'],
                'type' => $tx['type'],
                'amount' => $tx['amount'],
                'date' => $date->format('Y-m-d'),
                'description' => 'Sample transaction',
            ]);
        }
    }
}
