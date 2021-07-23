const defaults = require('tailwindcss/defaultTheme');

module.exports = {
    purge: {
        content: [
            'source/**/*.html',
            'source/**/*.md',
            'source/**/*.js',
            'source/**/*.php',
            'source/**/*.vue',
        ],
        options: {
            safelist: [/language/, /hljs/, /mce/],
        },
    },
    theme: {
        extend: {
            
            fontFamily: {
                sans: ['Khula', ...defaults.fontFamily.sans],
            },
            lineHeight: {
                normal: '1.6',
                loose: '1.75',
            },
            maxWidth: {
                '8xl': '88rem',
            },
            boxShadow: {
                search: '0 -1px 27px 0 rgba(0, 0, 0, 0.04), 0 4px 15px 0 rgba(0, 0, 0, 0.08)',
            },
            colors: {
                'green': {
                    DEFAULT: '#5D806E',
                    '50': '#EAF0ED',
                    '100': '#DAE4DF',
                    '200': '#B9CCC2',
                    '300': '#99B5A6',
                    '400': '#789D8A',
                    '500': '#5D806E',
                    '600': '#4A6557',
                    '700': '#364B40',
                    '800': '#233029',
                    '900': '#101613'
                },
                'red': {
                    DEFAULT: '#C02A1B',
                    '50': '#FAE0DD',
                    '100': '#F7C9C5',
                    '200': '#F09C93',
                    '300': '#E96E62',
                    '400': '#E24131',
                    '500': '#C02A1B',
                    '600': '#982115',
                    '700': '#701810',
                    '800': '#47100A',
                    '900': '#1F0704'
                },
            }
        },
        fontSize: {
            xs: '.8rem',
            sm: '.925rem',
            base: '1rem',
            lg: '1.125rem',
            xl: '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.75rem',
            '4xl': '2.125rem',
            '5xl': '2.625rem',
            '6xl': '10rem',
        },
    },
    variants: {
        extend: {
            width: ['focus'],
        },
    },
};
