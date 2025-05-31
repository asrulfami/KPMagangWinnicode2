<x-app-layout>
    <x-slot name="header"><h2>Financial Report</h2></x-slot>

    <form method="GET" action="{{ route('laporan') }}">
        <label>Start Date</label>
        <input type="date" name="start_date" value="{{ $startDate }}" required />
        <label>End Date</label>
        <input type="date" name="end_date" value="{{ $endDate }}" required />
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <h3>Summary</h3>
    <p>Total Income: Rp {{ number_format($income, 2) }}</p>
    <p>Total Expense: Rp {{ number_format($expense, 2) }}</p>
    <p>Profit: Rp {{ number_format($profit, 2) }}</p>

    <h3>Transactions</h3>
    <table class="table">
        <thead><tr>
            <th>Date</th><th>Category</th><th>Amount</th><th>Description</th>
        </tr></thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td>{{ $t->date->format('Y-m-d') }}</td>
                <td>{{ $t->category->name }}</td>
                <td>Rp {{ number_format($t->amount, 2) }}</td>
                <td>{{ $t->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
