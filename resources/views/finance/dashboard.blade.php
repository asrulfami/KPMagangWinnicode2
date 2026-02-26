<x-layouts.main>
    <div class="animate-fade-in">
        <!-- Page Header - Mobile First -->
        <div class="mb-6 space-y-4">
            <div class="flex flex-col items-center text-center gap-2 px-4 sm:px-6">
                <div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
                    <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm sm:text-base">Ringkasan keuangan Anda</p>
                </div>
                
                <!-- Period Filter - Stacked on mobile -->
                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col items-center gap-3 w-full">
                    <!-- Radio buttons stacked vertically on mobile -->
                    <div class="flex flex-wrap justify-center gap-2">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="period" value="this_month" class="peer sr-only" {{ $period === 'this_month' ? 'checked' : '' }}>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs sm:text-sm font-medium border border-pink-light-200/80 dark:border-purple-dark-600/80 bg-white/70 dark:bg-purple-dark-800/70 text-gray-700 dark:text-gray-200 peer-checked:border-winnicode-pink peer-checked:text-winnicode-pink dark:peer-checked:text-purple-dark-200 peer-checked:bg-pink-light-50 dark:peer-checked:bg-purple-dark-700/70 transition-all touch-target">
                                Bulan ini
                            </span>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="period" value="last_30_days" class="peer sr-only" {{ $period === 'last_30_days' ? 'checked' : '' }}>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs sm:text-sm font-medium border border-pink-light-200/80 dark:border-purple-dark-600/80 bg-white/70 dark:bg-purple-dark-800/70 text-gray-700 dark:text-gray-200 peer-checked:border-winnicode-pink peer-checked:text-winnicode-pink dark:peer-checked:text-purple-dark-200 peer-checked:bg-pink-light-50 dark:peer-checked:bg-purple-dark-700/70 transition-all touch-target">
                                30 hari
                            </span>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="period" value="this_year" class="peer sr-only" {{ $period === 'this_year' ? 'checked' : '' }}>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs sm:text-sm font-medium border border-pink-light-200/80 dark:border-purple-dark-600/80 bg-white/70 dark:bg-purple-dark-800/70 text-gray-700 dark:text-gray-200 peer-checked:border-winnicode-pink peer-checked:text-winnicode-pink dark:peer-checked:text-purple-dark-200 peer-checked:bg-pink-light-50 dark:peer-checked:bg-purple-dark-700/70 transition-all touch-target">
                                Tahun ini
                            </span>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="period" value="custom" class="peer sr-only" {{ $period === 'custom' ? 'checked' : '' }}>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs sm:text-sm font-medium border border-pink-light-200/80 dark:border-purple-dark-600/80 bg-white/70 dark:bg-purple-dark-800/70 text-gray-700 dark:text-gray-200 peer-checked:border-winnicode-pink peer-checked:text-winnicode-pink dark:peer-checked:text-purple-dark-200 peer-checked:bg-pink-light-50 dark:peer-checked:bg-purple-dark-700/70 transition-all touch-target">
                                Custom
                            </span>
                        </label>
                    </div>
                    
                    <!-- Date inputs - Full width on mobile -->
                    <div class="w-full grid grid-cols-2 gap-2 sm:flex sm:items-end sm:gap-3 text-xs text-gray-500 dark:text-gray-400">
                        <div class="flex flex-col items-start gap-1">
                            <label class="text-xs font-medium">Mulai</label>
                            <input
                                type="date"
                                name="start_date"
                                value="{{ $startDate }}"
                                class="w-full border-pink-light-200 dark:border-purple-dark-600 bg-white/70 dark:bg-purple-dark-800/70 rounded-lg px-2 sm:px-3 py-2 text-xs sm:text-sm focus:ring-winnicode-pink dark:focus:ring-purple-dark-400 focus:border-winnicode-pink dark:focus:border-purple-dark-400 text-gray-900 dark:text-white touch-target"
                            >
                        </div>
                        <div class="flex flex-col items-start gap-1">
                            <label class="text-xs font-medium">Akhir</label>
                            <input
                                type="date"
                                name="end_date"
                                value="{{ $endDate }}"
                                class="w-full border-pink-light-200 dark:border-purple-dark-600 bg-white/70 dark:bg-purple-dark-800/70 rounded-lg px-2 sm:px-3 py-2 text-xs sm:text-sm focus:ring-winnicode-pink dark:focus:ring-purple-dark-400 focus:border-winnicode-pink dark:focus:border-purple-dark-400 text-gray-900 dark:text-white touch-target"
                            >
                        </div>
                        <button
                            type="submit"
                            class="col-span-2 sm:col-auto inline-flex items-center justify-center px-4 py-2 rounded-full bg-gradient-to-r from-winnicode-pink to-winnicode-blue text-white text-xs sm:text-sm font-medium hover:from-pink-600 hover:to-blue-700 transition shadow-sm touch-target"
                        >
                            Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Summary Cards - Mobile First Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8 px-4 sm:px-0">
            <!-- Income Card -->
            <div class="stats-card group">
                <div class="absolute top-0 right-0 w-24 h-24 sm:w-32 sm:h-32 bg-gradient-to-br from-emerald-400/20 to-emerald-600/20 rounded-full blur-3xl transform translate-x-16 -translate-y-16 group-hover:scale-110 transition-transform"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 px-2 sm:px-3 py-1 rounded-full">Bulan Ini</span>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-xs sm:text-sm font-medium">Total Pemasukan</h3>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mt-1">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Expense Card -->
            <div class="stats-card group" style="animation-delay: 0.1s">
                <div class="absolute top-0 right-0 w-24 h-24 sm:w-32 sm:h-32 bg-gradient-to-br from-rose-400/20 to-rose-600/20 rounded-full blur-3xl transform translate-x-16 -translate-y-16 group-hover:scale-110 transition-transform"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-gradient-to-br from-rose-400 to-rose-600 flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-rose-600 dark:text-rose-400 bg-rose-50 dark:bg-rose-900/30 px-2 sm:px-3 py-1 rounded-full">Bulan Ini</span>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-xs sm:text-sm font-medium">Total Pengeluaran</h3>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mt-1">Rp {{ number_format($totalExpense, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Balance Card -->
            <div class="stats-card group" style="animation-delay: 0.2s">
                <div class="absolute top-0 right-0 w-24 h-24 sm:w-32 sm:h-32 bg-gradient-to-br from-indigo-400/20 to-indigo-600/20 rounded-full blur-3xl transform translate-x-16 -translate-y-16 group-hover:scale-110 transition-transform"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/30 px-2 sm:px-3 py-1 rounded-full">Saat Ini</span>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-xs sm:text-sm font-medium">Saldo</h3>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mt-1">Rp {{ number_format($balance, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Charts Row - Mobile First -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8 px-4 sm:px-0">
            <!-- Bar Chart - Full width on mobile -->
            <div class="lg:col-span-2 card-mobile animate-fade-in">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-4 sm:mb-6">Grafik Keuangan</h3>
                <div class="h-48 sm:h-56 md:h-64 overflow-x-auto">
                    <svg id="barChart" class="h-full min-w-[500px] w-full" viewBox="0 0 500 250" preserveAspectRatio="none">
                        <!-- Grid lines -->
                        <g class="text-gray-200 dark:text-gray-700">
                            <line x1="50" y1="200" x2="480" y2="200" stroke="currentColor" stroke-width="1"/>
                            <line x1="50" y1="160" x2="480" y2="160" stroke="currentColor" stroke-width="1"/>
                            <line x1="50" y1="120" x2="480" y2="120" stroke="currentColor" stroke-width="1"/>
                            <line x1="50" y1="80" x2="480" y2="80" stroke="currentColor" stroke-width="1"/>
                            <line x1="50" y1="40" x2="480" y2="40" stroke="currentColor" stroke-width="1"/>
                        </g>

                        <!-- Bars will be dynamically generated -->
                        <g id="bars"></g>

                        <!-- Labels -->
                        <g id="labels" class="text-xs text-gray-500 dark:text-gray-400"></g>
                    </svg>
                </div>
                <div class="flex justify-center mt-4 space-x-4 sm:space-x-6">
                    <div class="flex items-center">
                        <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-emerald-500 mr-2"></span>
                        <span class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Pemasukan</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-rose-500 mr-2"></span>
                        <span class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Pengeluaran</span>
                    </div>
                </div>
            </div>

            <!-- Category Breakdown -->
            <div class="card-mobile animate-fade-in">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-4 sm:mb-6">Pengeluaran per Kategori</h3>
                @if(count($categoryData) > 0)
                    <div class="flex justify-center mb-4 sm:mb-6">
                        <svg id="categoryPie" class="w-24 h-24 sm:w-32 sm:h-32 md:w-36 md:h-36" viewBox="0 0 200 200"></svg>
                    </div>
                    <div class="space-y-3 sm:space-y-4">
                        @php $totalCategoryAmount = array_sum(array_column($categoryData, 'amount')); @endphp
                        @foreach($categoryData as $index => $category)
                            @php $percentage = ($category['amount'] / $totalCategoryAmount) * 100; @endphp
                            <div class="animate-slide-up" data-delay="{{ $index * 0.1 }}">
                                <div class="flex justify-between text-xs sm:text-sm mb-1">
                                    <span class="text-gray-600 dark:text-gray-400 truncate">{{ $category['name'] }}</span>
                                    <span class="font-medium text-gray-900 dark:text-white whitespace-nowrap">Rp {{ number_format($category['amount'], 0, ',', '.') }}</span>
                                </div>
                                <div class="w-full bg-gray-100 dark:bg-purple-dark-700 rounded-full h-2 sm:h-2.5">
                                    <div class="h-2 sm:h-2.5 rounded-full bg-gradient-to-r from-winnicode-pink via-winnicode-blue to-winnicode-lightBlue animate-grow" data-width="{{ $percentage }}"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center h-40 sm:h-48 text-gray-400">
                        <svg class="w-12 h-12 sm:w-16 sm:h-16 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <p class="text-xs sm:text-sm text-center">Belum ada data pengeluaran bulan ini</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Transactions - Mobile First -->
        <div class="card-mobile animate-fade-in">
            <div class="p-4 sm:p-6 border-b border-pink-light-200 dark:border-purple-dark-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Transaksi Terakhir</h3>
                <a href="{{ route('transactions.index') }}" class="text-sm text-winnicode-pink dark:text-purple-dark-400 hover:text-pink-700 dark:hover:text-purple-dark-300 font-medium inline-flex items-center justify-center sm:justify-start">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <div class="overflow-x-auto -mx-4 sm:mx-0">
                <div class="min-w-[600px] px-4 sm:px-0">
                    <table class="w-full">
                        <thead class="bg-pink-light-50 dark:bg-purple-dark-900/50">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Deskripsi</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kategori</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tipe</th>
                                <th class="px-4 sm:px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-pink-light-100 dark:divide-purple-dark-700">
                            @forelse($recentTransactions as $transaction)
                                <tr class="hover:bg-pink-light-50 dark:hover:bg-purple-dark-900/30 transition-colors">
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                        {{ $transaction->date->format('d M Y') }}
                                    </td>
                                    <td class="px-4 sm:px-6 py-4">
                                        <div class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white">{{ $transaction->title }}</div>
                                        @if($transaction->description)
                                            <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs hidden sm:block">{{ $transaction->description }}</div>
                                        @endif
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                        @if($transaction->category)
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-pink-light-100 dark:bg-purple-dark-700 text-gray-700 dark:text-gray-300">
                                                {{ $transaction->category->name }}
                                            </span>
                                        @else
                                            <span class="text-xs text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                        @if($transaction->type === 'income')
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400">
                                                Pemasukan
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400">
                                                Pengeluaran
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-xs sm:text-sm font-semibold {{ $transaction->type === 'income' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                            {{ $transaction->type === 'income' ? '+' : '-' }} Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 sm:px-6 py-8 sm:py-12 text-center">
                                        <svg class="mx-auto h-10 w-10 sm:h-12 sm:w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p class="mt-2 text-xs sm:text-sm text-gray-500 dark:text-gray-400">Belum ada transaksi</p>
                                        <a href="{{ route('transactions.create') }}" class="mt-3 inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-white bg-gradient-to-r from-winnicode-pink to-winnicode-blue rounded-lg hover:from-pink-600 hover:to-blue-700 touch-target">
                                            Tambah Transaksi
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="application/json" id="dashboard-data">
        @json([
            'chart' => $chartData,
            'categories' => $categoryData,
        ])
    </script>

    <script>
        const rawDashboardData = document.getElementById('dashboard-data')?.textContent || '{}';
        let parsed = {};
        try {
            parsed = JSON.parse(rawDashboardData);
        } catch (e) {
            parsed = {};
        }

        const chartData = parsed.chart || { labels: [], income: [], expense: [] };
        const maxValue = Math.max(...chartData.income, ...chartData.expense, 1);
        const barWidth = 35;
        const gap = 70;
        const startX = 70;

        let barsHTML = '';
        let labelsHTML = '';

        chartData.labels.forEach((label, index) => {
            const x = startX + index * gap;
            const incomeHeight = (chartData.income[index] / maxValue) * 160;
            const expenseHeight = (chartData.expense[index] / maxValue) * 160;

            barsHTML += `
                <g class="animate-grow" style="animation-delay: ${index * 0.15}s">
                    <rect x="${x}" y="${200 - incomeHeight}" width="${barWidth/2 - 2}" height="${incomeHeight}" fill="#10b981" rx="4" class="opacity-80 hover:opacity-100 transition-opacity"/>
                    <rect x="${x + barWidth/2}" y="${200 - expenseHeight}" width="${barWidth/2 - 2}" height="${expenseHeight}" fill="#f43f5e" rx="4" class="opacity-80 hover:opacity-100 transition-opacity"/>
                </g>
            `;

            labelsHTML += `
                <text x="${x + barWidth/2 - 5}" y="220" text-anchor="middle" class="fill-gray-500 dark:fill-gray-400 text-xs">${label}</text>
            `;
        });

        document.getElementById('bars').innerHTML = barsHTML;
        document.getElementById('labels').innerHTML = labelsHTML;

        const categoryDataJs = parsed.categories || [];
        const pieSvg = document.getElementById('categoryPie');
        if (pieSvg && categoryDataJs.length) {
            const total = categoryDataJs.reduce((sum, item) => sum + item.amount, 0) || 1;
            const center = 100;
            const radius = 70;
            let cumulative = 0;
            const colors = ['#f97373', '#60a5fa', '#a855f7', '#22c55e', '#f97316', '#eab308'];

            categoryDataJs.forEach((item, index) => {
                const fraction = item.amount / total;
                const startAngle = cumulative * 2 * Math.PI;
                const endAngle = (cumulative + fraction) * 2 * Math.PI;
                const x1 = center + radius * Math.cos(startAngle - Math.PI / 2);
                const y1 = center + radius * Math.sin(startAngle - Math.PI / 2);
                const x2 = center + radius * Math.cos(endAngle - Math.PI / 2);
                const y2 = center + radius * Math.sin(endAngle - Math.PI / 2);
                const largeArc = fraction > 0.5 ? 1 : 0;
                const pathData = [
                    `M ${center} ${center}`,
                    `L ${x1} ${y1}`,
                    `A ${radius} ${radius} 0 ${largeArc} 1 ${x2} ${y2}`,
                    'Z'
                ].join(' ');

                const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                path.setAttribute('d', pathData);
                path.setAttribute('fill', colors[index % colors.length]);
                path.setAttribute('class', 'opacity-80 hover:opacity-100 transition-opacity');
                pieSvg.appendChild(path);

                cumulative += fraction;
            });
        }

        document.querySelectorAll('[data-delay]').forEach((el) => {
            const value = parseFloat(el.dataset.delay || '0');
            if (!isNaN(value)) {
                el.style.animationDelay = value + 's';
            }
        });

        document.querySelectorAll('[data-width]').forEach((el) => {
            const value = parseFloat(el.dataset.width || '0');
            if (!isNaN(value)) {
                el.style.width = value + '%';
            }
        });
    </script>
</x-layouts.main>
