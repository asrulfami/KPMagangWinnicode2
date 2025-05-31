<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Transaksi</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Form Tambah Transaksi -->
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Tambah Transaksi</h3>

                <form method="POST" action="{{ route('transactions.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Gaji Bulanan" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="category_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }} ({{ ucfirst($category->type) }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jumlah (Rp)</label>
                        <input type="number" name="amount" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: 500000" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="date" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <textarea name="description" rows="2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Opsional..."></textarea>
                    </div>

                    <div class="md:col-span-2 flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">Tambah</button>
                    </div>
                </form>
            </div>

            <!-- Tabel Transaksi -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Daftar Transaksi</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-600 font-medium">Tanggal</th>
                                <th class="px-4 py-2 text-left text-gray-600 font-medium">Judul</th>
                                <th class="px-4 py-2 text-left text-gray-600 font-medium">Kategori</th>
                                <th class="px-4 py-2 text-left text-gray-600 font-medium">Jumlah</th>
                                <th class="px-4 py-2 text-left text-gray-600 font-medium">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}</td>
                                    <td class="px-4 py-2">{{ $transaction->title }}</td>
                                    <td class="px-4 py-2">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $transaction->category->type === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $transaction->category->name }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        <span class="{{ $transaction->category->type === 'income' ? 'text-green-600' : 'text-red-600' }}">
                                            Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-gray-600">{{ $transaction->description ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
