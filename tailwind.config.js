import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    plugins: [forms, typography],

    theme: {
        mode: 'jit',
        extend: {
            colors: {
                'alice-blue': '#F6F9FC',
                'bubble':'#E4F2FE'

            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                Don:[ "Donegal One", "serif"],
                gab:[ "Gabriela", "serif"],
                Ram:["Ramaraja", "serif"],
                roboto:["Roboto Condensed", "sans-serif"],
                nunito:["Nunito", "sans-serif"],
                lexanddeca:["LexendDeca", "sans-serif"],
                bebas:["Bebas Neue", "sans-serif"],

            },
            animation: {
                marquee: 'marquee 25s linear infinite',
            },
            keyframes: {
                marquee: {
                    '0%':{transform: 'translateX(100%)'},
                    '100%':{transform: 'translateX(-100%)'},

                }
            }
        },
    },
    variants: {},
};
