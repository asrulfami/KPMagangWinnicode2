<x-app-layout>
    <x-slot name="header"><h2>Add Transaction</h2></x-slot>

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <label>Category</label>
        <select name="category_id" required class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }} ({{ ucfirst($category->type) }})</option>
            @endforeach
        </select>

        <label>Date</label>
        <input type="date" name="date" required class="form-control" value="{{ date('Y-m-d') }}" />

        <label>Amount</label>
        <input type="number" step="0.01" name="amount" required class="form-control" />

        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</x-app-layout>
