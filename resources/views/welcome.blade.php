<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Winnicode - Finance Manager</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .gradient-orb {
                position: absolute;
                border-radius: 50%;
                filter: blur(80px);
                opacity: 0.4;
                animation: float 8s ease-in-out infinite;
            }
            @keyframes float {
                0%, 100% { transform: translate(0, 0) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 30px) scale(0.9); }
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-pink-light-50 dark:bg-purple-dark-950 transition-colors duration-300 no-horizontal-scroll">
        <!-- Theme Toggle - Mobile First Positioning -->
        <div class="fixed top-3 right-3 sm:top-4 sm:right-4 z-50">
            <button
                type="button"
                id="theme-toggle"
                class="p-2.5 sm:p-3 rounded-full bg-white/80 dark:bg-purple-dark-800/80 backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 border border-pink-light-200 dark:border-purple-dark-700 touch-target"
                aria-label="Toggle theme"
            >
                <!-- Sun Icon (show in dark mode) -->
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-yellow-500 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <!-- Moon Icon (show in light mode) -->
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </button>
        </div>

        <!-- Background Animation Orbs -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="gradient-orb w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96 bg-winnicode-pink/30 dark:bg-purple-dark-600/20" style="top: -10%; left: -5%;"></div>
            <div class="gradient-orb w-56 h-56 sm:w-64 sm:h-64 md:w-80 md:h-80 bg-winnicode-blue/20 dark:bg-purple-dark-500/20" style="bottom: -5%; right: -5%; animation-delay: 2s;"></div>
            <div class="gradient-orb w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 bg-winnicode-lightBlue/25 dark:bg-purple-dark-400/15" style="top: 50%; right: 10%; animation-delay: 4s;"></div>
        </div>

        <!-- Financial SVG Background Animation -->
        <x-financial-bg-animation class="fixed inset-0 opacity-30 dark:opacity-20 pointer-events-none" />

        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-winnicode-pink selection:text-white">
            <div class="relative w-full max-w-4xl px-4 sm:px-6 md:px-8 py-12 sm:py-16 md:py-20">
                <!-- Header with Logo - Mobile First -->
                <header class="text-center mb-10 sm:mb-12 md:mb-16 animate-fade-in">
                    <div class="flex justify-center mb-6 sm:mb-8">
                        <div class="relative">
                            <!-- Animated glow effect behind logo -->
                            <div class="absolute inset-0 bg-gradient-to-r from-winnicode-pink via-winnicode-blue to-winnicode-lightBlue rounded-full blur-2xl opacity-30 animate-pulse-slow"></div>
                            <!-- Logo - Responsive sizing -->
                            <div class="relative w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-40 lg:h-40 rounded-full bg-white dark:bg-purple-dark-800 shadow-2xl flex items-center justify-center overflow-hidden border-4 border-winnicode-pink/20 dark:border-purple-dark-600/30">
                                <img src="{{ asset('images/LogoWinnicode.png') }}" alt="Winnicode Logo" class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-36 lg:h-36 object-contain animate-float" />
                            </div>
                        </div>
                    </div>

                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4 sm:mb-6 bg-gradient-to-r from-winnicode-pink via-winnicode-blue to-winnicode-lightBlue bg-clip-text text-transparent px-2">
                        Winnicode Finance Manager
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto px-4">
                        Kelola keuangan perusahaan dengan mudah dan efisien. Pantau pemasukan, pengeluaran, dan saldo Anda dalam satu platform terintegrasi.
                    </p>
                </header>

                <!-- Main Content -->
                <main class="animate-slide-up">
                    <!-- Feature Cards - Mobile First Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 mb-8 sm:mb-10 md:mb-12">
                        <!-- Income Card -->
                        <div class="group bg-white/70 dark:bg-purple-dark-800/50 backdrop-blur-sm rounded-2xl p-5 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-pink-light-200 dark:border-purple-dark-700 hover:scale-105">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center mb-4 shadow-lg group-hover:shadow-emerald-500/50 transition-shadow">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Kelola Pemasukan</h3>
                            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Catat dan pantau semua pemasukan perusahaan dengan mudah dan terstruktur.</p>
                        </div>

                        <!-- Expense Card -->
                        <div class="group bg-white/70 dark:bg-purple-dark-800/50 backdrop-blur-sm rounded-2xl p-5 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-pink-light-200 dark:border-purple-dark-700 hover:scale-105">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-gradient-to-br from-rose-400 to-rose-600 flex items-center justify-center mb-4 shadow-lg group-hover:shadow-rose-500/50 transition-shadow">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Kontrol Pengeluaran</h3>
                            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Monitor pengeluaran dengan detail dan kategori yang jelas.</p>
                        </div>

                        <!-- Report Card -->
                        <div class="group bg-white/70 dark:bg-purple-dark-800/50 backdrop-blur-sm rounded-2xl p-5 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-pink-light-200 dark:border-purple-dark-700 hover:scale-105 sm:col-span-2 lg:col-span-1">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center mb-4 shadow-lg group-hover:shadow-indigo-500/50 transition-shadow">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Laporan Lengkap</h3>
                            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Ekspor laporan keuangan dalam format CSV atau Excel untuk analisis lebih lanjut.</p>
                        </div>
                    </div>

                    <!-- CTA Buttons - Mobile First Stack -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
                        @if (Route::has('login'))
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 text-base font-semibold text-white bg-gradient-to-r from-winnicode-pink to-winnicode-blue rounded-xl shadow-lg hover:shadow-xl hover:from-pink-600 hover:to-blue-700 transform hover:scale-105 transition-all duration-300 touch-target"
                                >
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                    </svg>
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 text-base font-semibold text-white bg-gradient-to-r from-winnicode-pink to-winnicode-blue rounded-xl shadow-lg hover:shadow-xl hover:from-pink-600 hover:to-blue-700 transform hover:scale-105 transition-all duration-300 touch-target"
                                >
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    Log In
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="w-full sm:w-auto inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 text-base font-semibold text-winnicode-pink dark:text-winnicode-blue bg-white dark:bg-purple-dark-800 rounded-xl shadow-lg hover:shadow-xl border-2 border-winnicode-pink dark:border-purple-dark-500 transform hover:scale-105 transition-all duration-300 touch-target"
                                    >
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                        </svg>
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </main>

                <!-- Footer - Mobile First -->
                <footer class="mt-12 sm:mt-16 text-center">
                    <div class="flex items-center justify-center gap-2 text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                        <span>Dibuat dengan ❤️ oleh Winnicode</span>
                    </div>
                    <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">
                        &copy; {{ date('Y') }} Winnicode. All rights reserved.
                    </p>
                </footer>
            </div>
        </div>

        <!-- Theme Toggle Script -->
        <script>
            (function() {
                const themeToggle = document.getElementById('theme-toggle');
                const html = document.documentElement;

                // Check localStorage for saved theme
                const savedTheme = localStorage.getItem('theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                // Set initial theme
                if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                    html.classList.add('dark');
                } else {
                    html.classList.remove('dark');
                }

                // Toggle theme on button click
                themeToggle.addEventListener('click', function() {
                    html.classList.toggle('dark');
                    const isDark = html.classList.contains('dark');
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                });
            })();
        </script>
    </body>
</html>
