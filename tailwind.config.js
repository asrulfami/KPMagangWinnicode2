import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        // Mobile-first breakpoints: base styles for mobile, md+ for tablet, lg+ for desktop
        screens: {
            'sm': '640px',   // Small devices (landscape phones)
            'md': '768px',   // Medium devices (tablets)
            'lg': '1024px',  // Large devices (desktops)
            'xl': '1280px',  // Extra large devices (large desktops)
            '2xl': '1536px', // 2XL devices (extra large desktops)
        },
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Light Pink Theme - Winnicode Brand
                'pink-light': {
                    50: '#fff0f5',
                    100: '#ffe6f0',
                    200: '#ffd4e6',
                    300: '#ffb8d1',
                    400: '#ff8fb3',
                    500: '#ff6995',
                    600: '#ff4578',
                    700: '#e62a5f',
                    800: '#c4204f',
                    900: '#a31b42',
                },
                // Dark Purple Theme - Winnicode Brand
                'purple-dark': {
                    50: '#f5f3ff',
                    100: '#ede9fe',
                    200: '#ddd6fe',
                    300: '#c4b5fd',
                    400: '#a78bfa',
                    500: '#8b5cf6',
                    600: '#7c3aed',
                    700: '#6d28d9',
                    800: '#5b21b6',
                    900: '#4c1d95',
                    950: '#1a0b2e',
                },
                // Winnicode Brand Colors (from logo)
                'winnicode': {
                    pink: '#FF69B4',
                    blue: '#4169E1',
                    lightBlue: '#32B4FF',
                },
            },
            spacing: {
                // Extended spacing for mobile-first design
                '18': '4.5rem',
                '88': '22rem',
                '100': '25rem',
                '112': '28rem',
                '128': '32rem',
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'float-delayed': 'float 6s ease-in-out 3s infinite',
                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'spin-slow': 'spin 8s linear infinite',
                'bounce-slow': 'bounce 3s infinite',
                'grow': 'grow 1s ease-out forwards',
                'fade-in': 'fadeIn 0.5s ease-out forwards',
                'slide-up': 'slideUp 0.5s ease-out forwards',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                grow: {
                    '0%': { transform: 'scaleY(0)', opacity: '0' },
                    '100%': { transform: 'scaleY(1)', opacity: '1' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
            },
            // Mobile-first container widths
            container: {
                center: true,
                padding: {
                    DEFAULT: '1rem',
                    sm: '1.5rem',
                    lg: '2rem',
                },
            },
        },
    },

    plugins: [
        forms,
        // Custom plugin for mobile-first utilities
        function({ addUtilities, theme }) {
            const newUtilities = {
                // Mobile-first grid utilities
                '.grid-mobile-1': {
                    display: 'grid',
                    gridTemplateColumns: '1fr',
                    gap: theme('spacing.4'),
                },
                '.grid-mobile-2': {
                    display: 'grid',
                    gridTemplateColumns: 'repeat(2, 1fr)',
                    gap: theme('spacing.3'),
                },
                // Stack on mobile, row on desktop
                '.stack-mobile': {
                    display: 'flex',
                    flexDirection: 'column',
                    gap: theme('spacing.3'),
                },
                '@media (min-width: 768px)': {
                    '.stack-mobile': {
                        flexDirection: 'row',
                        gap: theme('spacing.4'),
                    },
                    '.grid-mobile-1': {
                        gridTemplateColumns: 'repeat(2, 1fr)',
                        gap: theme('spacing.6'),
                    },
                    '.grid-mobile-2': {
                        gridTemplateColumns: 'repeat(4, 1fr)',
                        gap: theme('spacing.4'),
                    },
                },
                '@media (min-width: 1024px)': {
                    '.grid-mobile-1': {
                        gridTemplateColumns: 'repeat(3, 1fr)',
                        gap: theme('spacing.6'),
                    },
                },
                // Card padding responsive
                '.card-padding': {
                    padding: theme('spacing.4'),
                },
                '@media (min-width: 640px)': {
                    '.card-padding': {
                        padding: theme('spacing.5'),
                    },
                },
                '@media (min-width: 768px)': {
                    '.card-padding': {
                        padding: theme('spacing.6'),
                    },
                },
                // Font size responsive
                '.text-responsive-sm': {
                    fontSize: theme('fontSize.sm')[0],
                    lineHeight: theme('fontSize.sm')[1].lineHeight,
                },
                '@media (min-width: 640px)': {
                    '.text-responsive-sm': {
                        fontSize: theme('fontSize.base')[0],
                        lineHeight: theme('fontSize.base')[1].lineHeight,
                    },
                },
                '@media (min-width: 768px)': {
                    '.text-responsive-sm': {
                        fontSize: theme('fontSize.lg')[0],
                        lineHeight: theme('fontSize.lg')[1].lineHeight,
                    },
                },
            };

            addUtilities(newUtilities);
        },
    ],
};
