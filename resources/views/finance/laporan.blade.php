<x-layouts.main>
    <div class="animate-fade-in">
        <!-- Page Header -->
        <div class="mb-6 sm:mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Laporan Keuangan</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm sm:text-base">Lihat ringkasan pemasukan, pengeluaran, dan profit berdasarkan periode.</p>
        </div>

        <div class="max-w-7xl mx-auto space-y-6">
            <!-- Filter Form - Mobile First -->
            <div class="card-mobile">
                <form method="GET" action="{{ route('laporan') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Mulai</label>
                        <input
                            type="date"
                            name="start_date"
                            value="{{ $startDate }}"
                            required
                            class="input-mobile"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Akhir</label>
                        <input
                            type="date"
                            name="end_date"
                            value="{{ $endDate }}"
                            required
                            class="input-mobile"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipe</label>
                        <select
                            name="type"
                            class="input-mobile"
                        >
                            <option value="">Semua</option>
                            <option value="income" {{ $type === 'income' ? 'selected' : '' }}>Pemasukan</option>
                            <option value="expense" {{ $type === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                        </select>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="w-full btn-mobile bg-gradient-to-r from-winnicode-pink to-winnicode-blue text-white hover:from-pink-600 hover:to-blue-700 shadow-md"
                        >
                            Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Summary Cards - Mobile First Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <div class="card-mobile">
                    <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">Total Pemasukan</p>
                    <p class="mt-2 text-xl sm:text-2xl font-bold text-emerald-600 dark:text-emerald-400">
                        Rp {{ number_format($income, 2) }}
                    </p>
                </div>
                <div class="card-mobile">
                    <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">Total Pengeluaran</p>
                    <p class="mt-2 text-xl sm:text-2xl font-bold text-rose-600 dark:text-rose-400">
                        Rp {{ number_format($expense, 2) }}
                    </p>
                </div>
                <div class="card-mobile">
                    <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">Profit</p>
                    <p class="mt-2 text-xl sm:text-2xl font-bold {{ $profit >= 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                        Rp {{ number_format($profit, 2) }}
                    </p>
                </div>
            </div>

            <!-- Transactions Table - Mobile First -->
            <div class="card-mobile">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">
                    <h2 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Detail Transaksi</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Periode: {{ $startDate }} s/d {{ $endDate }}
                    </p>
                </div>

                <div class="overflow-x-auto -mx-4 sm:mx-0">
                    <div class="min-w-[600px] px-4 sm:px-0">
                        <table class="table-mobile">
                            <thead class="bg-pink-light-50 dark:bg-purple-dark-900/50">
                                <tr>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Kategori</th>
                                    <th class="px-4 sm:px-6 py-3 text-right text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Jumlah</th>
                                    <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-pink-light-100 dark:divide-purple-dark-700">
                                @forelse($transactions as $t)
                                    <tr class="hover:bg-pink-light-50 dark:hover:bg-purple-dark-900/30 transition-colors">
                                        <td class="px-4 sm:px-6 py-3 text-xs sm:text-sm text-gray-700 dark:text-gray-300">
                                            {{ $t->date->format('Y-m-d') }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 text-xs sm:text-sm text-gray-700 dark:text-gray-300">
                                            {{ $t->category->name ?? '-' }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 text-right">
                                            <span class="text-xs sm:text-sm font-medium {{ $t->type === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                                Rp {{ number_format($t->amount, 2) }}
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                            {{ $t->description }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 sm:px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                            Tidak ada transaksi pada periode ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
