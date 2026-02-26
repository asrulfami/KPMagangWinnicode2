<x-layouts.main>
    <div class="animate-fade-in max-w-xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('categories.index') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 flex items-center mb-4">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Kategori
            </a>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Tambah Kategori</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Buat kategori baru untuk transaksi pemasukan atau pengeluaran.</p>
        </div>

        <div class="bg-white dark:bg-purple-dark-800 rounded-xl shadow-lg border border-pink-light-200 dark:border-purple-dark-700 p-6">
            <form method="POST" action="{{ route('categories.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Kategori</label>
                    <input
                        type="text"
                        name="name"
                        required
                        class="mt-1 block w-full border-pink-light-200 dark:border-purple-dark-600 bg-white/50 dark:bg-purple-dark-700/50 rounded-lg shadow-sm focus:ring-winnicode-pink dark:focus:ring-purple-dark-400 focus:border-winnicode-pink dark:focus:border-purple-dark-400 text-gray-900 dark:text-white"
                        placeholder="Contoh: Gaji, Makanan, Transportasi"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipe</label>
                    <select
                        name="type"
                        required
                        class="mt-1 block w-full border-pink-light-200 dark:border-purple-dark-600 bg-white/50 dark:bg-purple-dark-700/50 rounded-lg shadow-sm focus:ring-winnicode-pink dark:focus:ring-purple-dark-400 focus:border-winnicode-pink dark:focus:border-purple-dark-400 text-gray-900 dark:text-white"
                    >
                        <option value="income">Pemasukan</option>
                        <option value="expense">Pengeluaran</option>
                    </select>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-lg bg-pink-light-100 dark:bg-purple-dark-700 text-gray-700 dark:text-gray-300 hover:bg-pink-light-200 dark:hover:bg-purple-dark-600 transition">
                        Batal
                    </a>
                    <button
                        type="submit"
                        class="px-5 py-2 rounded-lg bg-gradient-to-r from-winnicode-pink to-winnicode-blue text-white hover:from-pink-600 hover:to-blue-700 transition shadow-md"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.main>
