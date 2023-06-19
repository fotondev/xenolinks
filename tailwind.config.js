const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        colors: {
            primary: '#2D3748',
            secondary: '#4A5568',
            tertiary: '#CBD5E0',
            background: '#EDF2F7',
            text: '#1A202C',
            link: '#3182CE',
            hover: '#E2E8F0',
            accent: '#E53E3E',
        },
          fontFamily: {
            sans: ['Roboto', 'sans-serif'],
            serif: ['Georgia', 'serif']
          },
          fontSize: {
            sm: '14px',
            base: '16px',
            lg: '18px',
            xl: '20px'
          },
          fontWeight: {
            normal: 400,
            bold: 700
          },
          lineHeight: {
            tight: 1.2,
            normal: 1.5,
            loose: 2
          },
        spinner: (theme) => ({
            default: {
                color: '#dae1e7', // color you want to make the spinner
                size: '1em', // size of the spinner (used for both width and height)
                border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
                speed: '500ms', // the speed at which the spinner should rotate
            },
            // md: {
            //   color: theme('colors.red.500', 'red'),
            //   size: '2em',
            //   border: '2px',
            //   speed: '500ms',
            // },
        }),
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundColor: {
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
    
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('flowbite/plugin'), require('tailwindcss-spinner')({ className: 'spinner', themeKey: 'spinner' })]
};
