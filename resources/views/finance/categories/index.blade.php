<x-layouts.main>
    <div class="animate-fade-in">
        <!-- Page Header -->
        <div class="mb-6 sm:mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Kategori Transaksi</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm sm:text-base">Kelola kategori pemasukan dan pengeluaran Anda.</p>
        </div>

        <div class="max-w-7xl mx-auto space-y-6">
            <!-- Add Category Form - Mobile First -->
            <div class="card-mobile">
                <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mb-4">Tambah Kategori Baru</h3>

                <form method="POST" action="{{ route('categories.store') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @csrf
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Kategori</label>
                        <input
                            type="text"
                            name="name"
                            required
                            class="input-mobile"
                            placeholder="Contoh: Gaji, Makanan, Transportasi"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipe</label>
                        <select
                            name="type"
                            required
                            class="input-mobile"
                        >
                            <option value="income">Pemasukan</option>
                            <option value="expense">Pengeluaran</option>
                        </select>
                    </div>

                    <div class="sm:col-span-3">
                        <button
                            type="submit"
                            class="w-full btn-mobile bg-gradient-to-r from-winnicode-pink to-winnicode-blue text-white hover:from-pink-600 hover:to-blue-700 shadow-md"
                        >
                            Tambah
                        </button>
                    </div>
                </form>
            </div>

            <!-- Categories List - Mobile First -->
            <div class="card-mobile">
                <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mb-4">Daftar Kategori</h3>

                <div class="overflow-x-auto -mx-4 sm:mx-0">
                    <div class="min-w-[400px] px-4 sm:px-0">
                        <table class="table-mobile">
                            <thead class="bg-pink-light-50 dark:bg-purple-dark-900/50">
                                <tr>
                                    <th class="px-4 sm:px-6 py-3 text-left font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider text-xs">Nama</th>
                                    <th class="px-4 sm:px-6 py-3 text-left font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider text-xs">Tipe</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-pink-light-100 dark:divide-purple-dark-700">
                                @forelse ($categories as $category)
                                    <tr class="hover:bg-pink-light-50 dark:hover:bg-purple-dark-900/30 transition-colors">
                                        <td class="px-4 sm:px-6 py-4 text-sm sm:text-base text-gray-900 dark:text-white">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-4">
                                            @if($category->type === 'income')
                                                <span class="badge-mobile bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400">
                                                    {{ ucfirst($category->type) }}
                                                </span>
                                            @else
                                                <span class="badge-mobile bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400">
                                                    {{ ucfirst($category->type) }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="px-4 sm:px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                            Belum ada kategori yang terdaftar.
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
