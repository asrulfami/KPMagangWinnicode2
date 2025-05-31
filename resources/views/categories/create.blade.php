<x-app-layout>
    <x-slot name="header"><h2>Add Category</h2></x-slot>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <label>Name</label>
        <input type="text" name="name" required class="form-control" />
        <label>Type</label>
        <select name="type" required class="form-control">
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</x-app-layout>
