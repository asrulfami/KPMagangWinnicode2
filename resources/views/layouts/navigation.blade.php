<nav x-data="{ open: false }" class="bg-white/90 dark:bg-purple-dark-900/90 backdrop-blur-md border-b border-pink-light-200 dark:border-purple-dark-700 transition-colors duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gradient-to-br from-winnicode-pink via-winnicode-blue to-winnicode-lightBlue p-0.5">
                            <div class="w-full h-full rounded-full bg-white dark:bg-purple-dark-800 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/LogoWinnicode.png') }}" alt="Winnicode Logo" class="w-7 h-7 sm:w-8 sm:h-8 object-contain" />
                            </div>
                        </div>
                        <span class="font-bold text-base sm:text-lg bg-gradient-to-r from-winnicode-pink to-winnicode-blue bg-clip-text text-transparent hidden sm:block">Winnicode</span>
                    </a>
                </div>

                <!-- Navigation Links - Hidden on mobile -->
                <div class="hidden sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')">
                        {{ __('Transaksi') }}
                    </x-nav-link>

                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                        {{ __('Kategori') }}
                    </x-nav-link>

                    <x-nav-link :href="route('laporan')" :active="request()->routeIs('laporan')">
                        {{ __('Laporan') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3 sm:gap-4">
                <!-- Theme Toggle -->
                <button
                    type="button"
                    id="theme-toggle-desktop"
                    class="p-2 rounded-full bg-pink-light-100 dark:bg-purple-dark-800 hover:bg-pink-light-200 dark:hover:bg-purple-dark-700 transition-colors duration-200 border border-pink-light-200 dark:border-purple-dark-600 touch-target"
                    aria-label="Toggle theme"
                >
                    <!-- Sun Icon (show in dark mode) -->
                    <svg class="w-5 h-5 text-yellow-500 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <!-- Moon Icon (show in light mode) -->
                    <svg class="w-5 h-5 text-purple-600 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                <!-- Settings Dropdown -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-gray-600 dark:text-gray-300 bg-white/50 dark:bg-purple-dark-800/50 hover:bg-pink-light-100 dark:hover:bg-purple-dark-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="hidden sm:block">{{ Auth::user()->name }}</div>
                                <div class="sm:hidden">{{ substr(Auth::user()->name, 0, 1) }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger - Visible on mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-pink-light-100 dark:hover:bg-purple-dark-800 focus:outline-none focus:bg-pink-light-100 dark:focus:bg-purple-dark-800 focus:text-gray-500 transition duration-150 ease-in-out touch-target">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu - Mobile First -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')">
                {{ __('Transaksi') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                {{ __('Kategori') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('laporan')" :active="request()->routeIs('laporan')">
                {{ __('Laporan') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-pink-light-200 dark:border-purple-dark-700">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Theme Toggle Mobile -->
                <button
                    type="button"
                    id="theme-toggle-mobile"
                    class="w-full text-start px-4 py-3 text-sm text-gray-600 dark:text-gray-300 hover:bg-pink-light-100 dark:hover:bg-purple-dark-800 transition-colors duration-150 flex items-center gap-2 touch-target"
                >
                    <svg class="w-5 h-5 text-yellow-500 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <svg class="w-5 h-5 text-purple-600 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <span x-text="document.documentElement.classList.contains('dark') ? 'Light Mode' : 'Dark Mode'"></span>
                </button>

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Theme Toggle Script -->
<script>
    (function() {
        const initThemeToggle = () => {
            const html = document.documentElement;
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }

            // Desktop toggle
            const desktopToggle = document.getElementById('theme-toggle-desktop');
            if (desktopToggle) {
                desktopToggle.addEventListener('click', function() {
                    html.classList.toggle('dark');
                    const isDark = html.classList.contains('dark');
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                });
            }

            // Mobile toggle
            const mobileToggle = document.getElementById('theme-toggle-mobile');
            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    html.classList.toggle('dark');
                    const isDark = html.classList.contains('dark');
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                });
            }
        };

        // Initialize after Alpine loads
        if (window.Alpine) {
            window.Alpine.start();
        }
        initThemeToggle();
    })();
</script>
