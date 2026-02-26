<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Winnicode Finance Manager') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .gradient-orb {
                position: fixed;
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
    <body class="font-sans text-gray-900 antialiased bg-pink-light-50 dark:bg-purple-dark-950 transition-colors duration-300 no-horizontal-scroll">
        <!-- Background Animation Orbs - Responsive sizing -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="gradient-orb w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96 bg-winnicode-pink/30 dark:bg-purple-dark-600/20" style="top: -10%; left: -5%;"></div>
            <div class="gradient-orb w-56 h-56 sm:w-64 sm:h-64 md:w-80 md:h-80 bg-winnicode-blue/20 dark:bg-purple-dark-500/20" style="bottom: -5%; right: -5%; animation-delay: 2s;"></div>
        </div>

        <!-- Financial SVG Background Animation -->
        <x-financial-bg-animation class="fixed inset-0 opacity-20 dark:opacity-15 pointer-events-none" />

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

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative px-4">
            <!-- Logo Section - Responsive sizing -->
            <div class="mb-6 animate-fade-in">
                <a href="/" class="block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-winnicode-pink via-winnicode-blue to-winnicode-lightBlue rounded-full blur-xl opacity-30 animate-pulse-slow"></div>
                        <div class="relative w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-full bg-white dark:bg-purple-dark-800 shadow-xl flex items-center justify-center overflow-hidden border-2 border-winnicode-pink/30 dark:border-purple-dark-600/40">
                            <img src="{{ asset('images/LogoWinnicode.png') }}" alt="Winnicode Logo" class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 object-contain" />
                        </div>
                    </div>
                </a>
            </div>

            <!-- Main Content Card - Mobile First -->
            <div class="w-full sm:max-w-md mt-4 sm:mt-6 px-6 sm:px-8 py-6 sm:py-8 bg-white/80 dark:bg-purple-dark-800/60 backdrop-blur-sm shadow-2xl overflow-hidden sm:rounded-2xl border border-pink-light-200 dark:border-purple-dark-700 animate-slide-up">
                {{ $slot }}
            </div>

            <!-- Footer - Mobile First -->
            <footer class="mt-6 sm:mt-8 text-center text-xs sm:text-sm text-gray-500 dark:text-gray-400 px-4">
                <p>&copy; {{ date('Y') }} Winnicode. All rights reserved.</p>
            </footer>
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
