<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, maximum-scale=5">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Winnicode Finance Manager') }}</title>

    <script>
        (function() {
            var storedTheme = localStorage.getItem('theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-transition { transition: transform 0.3s ease-in-out; }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up { animation: slideUp 0.5s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fade-in { animation: fadeIn 0.6s ease-out; }
        @keyframes growBar {
            from { transform: scaleY(0); }
            to { transform: scaleY(1); }
        }
        .animate-grow { animation: growBar 0.8s ease-out forwards; transform-origin: bottom; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-float-delayed { animation: float 4s ease-in-out infinite; animation-delay: 1.5s; }
        @keyframes pulseSlow {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.03); }
        }
        .animate-pulse-slow { animation: pulseSlow 4s ease-in-out infinite; }
    </style>
</head>
<body class="bg-pink-light-50 dark:bg-purple-dark-950 antialiased transition-colors duration-300 no-horizontal-scroll">
    <div class="flex min-h-screen overflow-x-hidden">
        <!-- Sidebar - Hidden on mobile by default, visible on lg+ -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 sm:w-72 bg-gradient-to-b from-winnicode-pink via-winnicode-blue to-winnicode-lightBlue text-white transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0 sidebar-transition shadow-2xl">
            <div class="flex flex-col h-full safe-top">
                <!-- Logo -->
                <div class="flex items-center justify-center h-20 sm:h-24 border-b border-white/20">
                    <div class="flex flex-col items-center space-y-2">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/20 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/LogoWinnicode.png') }}" alt="Winnicode Logo" class="w-8 h-8 sm:w-10 sm:h-10 object-contain" />
                        </div>
                        <span class="text-sm sm:text-base font-semibold tracking-wide">Winnicode</span>
                    </div>
                </div>

                <!-- User -->
                <div class="p-3 sm:p-4 border-b border-white/20">
                    <div class="flex items-center justify-between space-x-2 sm:space-x-3">
                        <div class="flex items-center space-x-2 sm:space-x-3 min-w-0">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white/20 flex items-center justify-center text-white font-semibold backdrop-blur-sm flex-shrink-0">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs sm:text-sm font-medium truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-white/70 truncate hidden sm:block">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <button
                            type="button"
                            data-theme-toggle
                            class="p-2 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors duration-200 border border-white/30 flex-shrink-0 touch-target"
                            aria-label="Toggle theme"
                        >
                            <svg class="w-4 h-4 text-yellow-300 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <svg class="w-4 h-4 text-white block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-3 sm:mt-4">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-3 sm:px-4 py-2 text-xs sm:text-sm text-white/80 hover:text-white hover:bg-white/15 rounded-lg transition-all touch-target">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span class="hidden sm:inline">Logout</span>
                            <span class="sm:hidden">Out</span>
                        </button>
                    </form>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-2 sm:px-3 py-4 sm:py-6 space-y-1 sm:space-y-2 overflow-y-auto">
                    <a href="{{ route('dashboard') }}" class="nav-item-mobile {{ request()->routeIs('dashboard') ? 'bg-white/25 text-white shadow-lg' : 'text-white/80 hover:bg-white/15 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="truncate">Dashboard</span>
                    </a>
                    <a href="{{ route('transactions.index') }}" class="nav-item-mobile {{ request()->routeIs('transactions.*') ? 'bg-white/25 text-white shadow-lg' : 'text-white/80 hover:bg-white/15 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span class="truncate">Transaksi</span>
                    </a>
                    <a href="{{ route('categories.index') }}" class="nav-item-mobile {{ request()->routeIs('categories.*') ? 'bg-white/25 text-white shadow-lg' : 'text-white/80 hover:bg-white/15 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        <span class="truncate">Kategori</span>
                    </a>
                    <a href="{{ route('laporan') }}" class="nav-item-mobile {{ request()->routeIs('laporan') ? 'bg-white/25 text-white shadow-lg' : 'text-white/80 hover:bg-white/15 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="truncate">Laporan</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div id="overlay" class="fixed inset-0 bg-black/50 dark:bg-black/40 z-40 lg:hidden hidden" aria-hidden="true"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Top Bar - Visible only on mobile/tablet -->
            <header class="bg-white/80 dark:bg-purple-dark-900/80 backdrop-blur-md border-b border-pink-light-200 dark:border-purple-dark-700 py-3 sm:py-4 px-4 sm:px-6 lg:hidden transition-colors duration-300 safe-top">
                <div class="flex items-center justify-between">
                    <button type="button" onclick="toggleSidebar()" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 p-2 touch-target -ml-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white dark:bg-purple-dark-800 flex items-center justify-center overflow-hidden border border-pink-light-200 dark:border-purple-dark-600">
                            <img src="{{ asset('images/LogoWinnicode.png') }}" alt="Winnicode Logo" class="w-6 h-6 sm:w-7 sm:h-7 object-contain" />
                        </div>
                        <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-white">Winnicode</span>
                    </div>
                    <button
                        type="button"
                        data-theme-toggle
                        class="p-2 rounded-full bg-pink-light-100 dark:bg-purple-dark-800 hover:bg-pink-light-200 dark:hover:bg-purple-dark-700 transition-colors duration-200 border border-pink-light-200 dark:border-purple-dark-600 touch-target"
                        aria-label="Toggle theme"
                    >
                        <svg class="w-5 h-5 text-yellow-500 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <svg class="w-5 h-5 text-purple-600 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto">
                <x-financial-bg-animation class="fixed inset-0 opacity-30 dark:opacity-20 pointer-events-none" />
                <div class="relative z-10 max-w-7xl mx-auto py-4 sm:py-6 px-4 sm:px-6 lg:px-8 safe-bottom">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script>
        // Global sidebar state (persisted across pages)
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            let sidebarOpen = localStorage.getItem('sidebarOpen') === 'true';

            function applySidebarState() {
                if (sidebarOpen) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }

            function saveState() {
                localStorage.setItem('sidebarOpen', sidebarOpen ? 'true' : 'false');
            }

            window.toggleSidebar = function() {
                sidebarOpen = !sidebarOpen;
                saveState();
                applySidebarState();
            }

            window.openSidebar = function() {
                sidebarOpen = true;
                saveState();
                applySidebarState();
            }

            window.closeSidebar = function() {
                sidebarOpen = false;
                saveState();
                applySidebarState();
            }

            // Initialize UI from stored state
            applySidebarState();

            // Prevent clicks inside the sidebar from bubbling to the document
            sidebar.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            // Overlay should stop propagation and close the sidebar
            overlay.addEventListener('click', function(e) {
                e.stopPropagation();
                window.closeSidebar();
            });

            // Close sidebar only when clicking outside sidebar and overlay
            document.addEventListener('click', function(e) {
                if (!sidebarOpen) return;
                if (!sidebar.contains(e.target) && !overlay.contains(e.target)) {
                    window.closeSidebar();
                }
            }, true);

            // Theme Toggle (unchanged behavior)
            (function() {
                const html = document.documentElement;
                const toggles = document.querySelectorAll('[data-theme-toggle]');

                toggles.forEach(function(toggle) {
                    toggle.addEventListener('click', function(event) {
                        event.stopPropagation();
                        html.classList.toggle('dark');
                        const isDark = html.classList.contains('dark');
                        localStorage.setItem('theme', isDark ? 'dark' : 'light');
                    });
                });
            })();
        });
    </script>
</body>
</html>
