const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundColor:{
                'stromboli': {
                    DEFAULT: '#346A54',
                    50: '#8EC8B0',
                    100: '#80C1A6',
                    200: '#65B493',
                    300: '#4FA17F',
                    400: '#418669',
                    500: '#346A54',
                    600: '#224436',
                    700: '#0F1F18',
                    800: '#000000',
                    900: '#000000',
                    950: '#000000'
                  },
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
