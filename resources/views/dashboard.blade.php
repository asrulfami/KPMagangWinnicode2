<x-app-layout>
    <x-slot name="header">
        <h2>Dashboard</h2>
    </x-slot>

    <div class="py-6">
        <div>Total Income: Rp {{ number_format(\App\Models\Transaction::where('user_id', auth()->id())->whereHas('category', fn($q) => $q->where('type', 'income'))->sum('amount'), 2) }}</div>
        <div>Total Expense: Rp {{ number_format(\App\Models\Transaction::where('user_id', auth()->id())->whereHas('category', fn($q) => $q->where('type', 'expense'))->sum('amount'), 2) }}</div>
    </div>
</x-app-layout>
