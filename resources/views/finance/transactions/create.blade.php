<x-layouts.main>
    <div class="animate-fade-in max-w-3xl mx-auto">
        <!-- Page Header - Mobile First -->
        <div class="mb-6 sm:mb-8">
            <a href="{{ route('transactions.index') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 flex items-center mb-4 touch-target -ml-2">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Tambah Transaksi</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm sm:text-base">Catat pemasukan atau pengeluaran baru</p>
        </div>

        <!-- Form Card - Mobile First -->
        <div class="card-mobile">
            <form method="POST" action="{{ route('transactions.store') }}">
                @csrf

                <!-- Transaction Type - Full width on mobile -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Tipe Transaksi</label>
                    <div class="grid grid-cols-2 gap-3 sm:gap-4">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="type" value="income" required class="peer sr-only" checked>
                            <div class="rounded-xl border-2 border-pink-light-200 dark:border-purple-dark-600 p-3 sm:p-4 text-center transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-50 dark:peer-checked:bg-emerald-900/30 hover:border-pink-light-300 dark:hover:border-purple-dark-500 bg-white/50 dark:bg-purple-dark-700/50 touch-target flex flex-col items-center justify-center">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 mx-auto mb-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                </svg>
                                <span class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Pemasukan</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="type" value="expense" required class="peer sr-only">
                            <div class="rounded-xl border-2 border-pink-light-200 dark:border-purple-dark-600 p-3 sm:p-4 text-center transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 dark:peer-checked:bg-rose-900/30 hover:border-pink-light-300 dark:hover:border-purple-dark-500 bg-white/50 dark:bg-purple-dark-700/50 touch-target flex flex-col items-center justify-center">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 mx-auto mb-2 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                </svg>
                                <span class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Pengeluaran</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Judul <span class="text-rose-500">*</span></label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        required
                        class="input-mobile"
                        placeholder="Contoh: Gaji, Belanja Kantor"
                    >
                </div>

                <!-- Amount and Date - Stacked on mobile -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-6">
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah (Rp) <span class="text-rose-500">*</span></label>
                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            required
                            min="0"
                            step="0.01"
                            class="input-mobile"
                            placeholder="0"
                        >
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal <span class="text-rose-500">*</span></label>
                        <input
                            type="date"
                            name="date"
                            id="date"
                            required
                            value="{{ date('Y-m-d') }}"
                            class="input-mobile"
                        >
                    </div>
                </div>

                <!-- Category -->
                <div class="mb-6">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kategori</label>
                    <select
                        name="category_id"
                        id="category_id"
                        class="input-mobile"
                    >
                        <option value="">Pilih Kategori (Opsional)</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }} ({{ ucfirst($category->type) }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Deskripsi</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        class="input-mobile resize-none"
                        placeholder="Tambahkan detail tambahan..."
                    ></textarea>
                </div>

                <!-- Action Buttons - Stacked on mobile -->
                <div class="flex flex-col sm:flex-row gap-3 items-center justify-end">
                    <a
                        href="{{ route('transactions.index') }}"
                        class="w-full sm:w-auto px-6 py-2.5 text-gray-700 dark:text-gray-300 bg-pink-light-100 dark:bg-purple-dark-700 rounded-lg hover:bg-pink-light-200 dark:hover:bg-purple-dark-600 transition text-center touch-target"
                    >
                        Batal
                    </a>
                    <button
                        type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 bg-gradient-to-r from-winnicode-pink to-winnicode-blue text-white rounded-lg hover:from-pink-600 hover:to-blue-700 transition shadow-md touch-target"
                    >
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.main>
