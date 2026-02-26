<x-layouts.main>
    <div class="animate-fade-in">
        <!-- Page Header - Mobile First -->
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Transaksi</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm sm:text-base">Kelola pemasukan dan pengeluaran Anda</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="toggleExportModal()" class="btn-mobile bg-gradient-to-r from-emerald-500 to-emerald-600 text-white hover:from-emerald-600 hover:to-emerald-700 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Export
                </button>
                <a href="{{ route('transactions.create') }}" class="btn-mobile bg-gradient-to-r from-winnicode-pink to-winnicode-blue text-white hover:from-pink-600 hover:to-blue-700 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Transaksi
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 px-4 py-3 rounded-lg flex items-center animate-slide-up">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Filters - Mobile First -->
        <div class="card-mobile mb-6">
            <form method="GET" action="{{ route('transactions.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="sm:col-span-2 lg:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pencarian</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Judul atau deskripsi..." class="input-mobile">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipe</label>
                    <select name="type" class="input-mobile">
                        <option value="">Semua Tipe</option>
                        <option value="income" {{ request('type') === 'income' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="expense" {{ request('type') === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Mulai</label>
                    <input type="date" name="start_date" value="{{ request('start_date') }}" class="input-mobile">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Akhir</label>
                    <input type="date" name="end_date" value="{{ request('end_date') }}" class="input-mobile">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full btn-mobile bg-gradient-to-r from-winnicode-pink to-winnicode-blue text-white hover:from-pink-600 hover:to-blue-700 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Transactions Table - Mobile First -->
        <div class="card-mobile overflow-hidden p-0">
            <div class="overflow-x-auto">
                <div class="min-w-[700px]">
                    <table class="w-full">
                        <thead class="bg-pink-light-50 dark:bg-purple-dark-900/50 border-b border-pink-light-200 dark:border-purple-dark-700">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Transaksi</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kategori</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tipe</th>
                                <th class="px-4 sm:px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jumlah</th>
                                <th class="px-4 sm:px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-pink-light-100 dark:divide-purple-dark-700">
                            @forelse($transactions as $transaction)
                                <tr class="hover:bg-pink-light-50 dark:hover:bg-purple-dark-900/30 transition-colors animate-slide-up">
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                        {{ $transaction->date->format('d M Y') }}
                                    </td>
                                    <td class="px-4 sm:px-6 py-4">
                                        <div class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white">{{ $transaction->title }}</div>
                                        @if($transaction->description)
                                            <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs">{{ $transaction->description }}</div>
                                        @endif
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                        @if($transaction->category)
                                            <span class="badge-mobile bg-pink-light-100 dark:bg-purple-dark-700 text-gray-700 dark:text-gray-300">
                                                {{ $transaction->category->name }}
                                            </span>
                                        @else
                                            <span class="text-xs text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                        @if($transaction->type === 'income')
                                            <span class="badge-mobile bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400">Pemasukan</span>
                                        @else
                                            <span class="badge-mobile bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400">Pengeluaran</span>
                                        @endif
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-xs sm:text-sm font-semibold {{ $transaction->type === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                            {{ $transaction->type === 'income' ? '+' : '-' }} Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('transactions.edit', $transaction) }}" class="text-winnicode-pink dark:text-purple-dark-400 hover:text-pink-700 dark:hover:text-purple-dark-300 p-2 touch-target">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-600 dark:text-rose-400 hover:text-rose-800 dark:hover:text-rose-300 p-2 touch-target">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 sm:px-6 py-8 sm:py-12 text-center">
                                        <svg class="mx-auto h-10 w-10 sm:h-12 sm:w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Belum ada transaksi</p>
                                        <a href="{{ route('transactions.create') }}" class="mt-3 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-winnicode-pink to-winnicode-blue rounded-lg hover:from-pink-600 hover:to-blue-700 touch-target">
                                            Tambah transaksi pertama Anda
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($transactions->hasPages())
                <div class="px-4 sm:px-6 py-4 border-t border-pink-light-200 dark:border-purple-dark-700">
                    {{ $transactions->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Export Modal - Mobile First -->
    <div id="exportModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white dark:bg-purple-dark-800 rounded-2xl shadow-xl max-w-md w-full p-5 sm:p-6 animate-slide-up border border-pink-light-200 dark:border-purple-dark-700 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Export Transaksi</h3>
                <button onclick="toggleExportModal()" class="text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300 p-2 touch-target">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('export') }}" target="_blank">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal Mulai</label>
                        <input type="date" name="start_date" required class="input-mobile">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal Akhir</label>
                        <input type="date" name="end_date" required class="input-mobile">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tipe</label>
                        <select name="type" class="input-mobile">
                            <option value="">Semua Transaksi</option>
                            <option value="income">Pemasukan Saja</option>
                            <option value="expense">Pengeluaran Saja</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Format</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="format" value="xlsx" checked class="peer sr-only">
                                <div class="rounded-lg border-2 border-pink-light-200 dark:border-purple-dark-600 p-3 text-center transition-all peer-checked:border-winnicode-pink dark:peer-checked:border-purple-dark-400 peer-checked:bg-pink-light-50 dark:peer-checked:bg-purple-dark-700/50 touch-target flex items-center justify-center">
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">Excel (.xlsx)</span>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="format" value="csv" class="peer sr-only">
                                <div class="rounded-lg border-2 border-pink-light-200 dark:border-purple-dark-600 p-3 text-center transition-all peer-checked:border-winnicode-pink dark:peer-checked:border-purple-dark-400 peer-checked:bg-pink-light-50 dark:peer-checked:bg-purple-dark-700/50 touch-target flex items-center justify-center">
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">CSV (.csv)</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 mt-6">
                    <button type="button" onclick="toggleExportModal()" class="flex-1 px-4 py-2.5 text-gray-700 dark:text-gray-300 bg-pink-light-100 dark:bg-purple-dark-700 rounded-lg hover:bg-pink-light-200 dark:hover:bg-purple-dark-600 transition touch-target">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-2.5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-lg hover:from-emerald-600 hover:to-emerald-700 transition shadow-lg touch-target">Export</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleExportModal() {
            const modal = document.getElementById('exportModal');
            modal.classList.toggle('hidden');
        }
    </script>
</x-layouts.main>
