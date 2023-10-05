const colors = require('tailwindcss/colors')

module.exports = {
    content:
        [
            './app/Filament/Resources/**/*.php',
            './app/Http/Livewire/**/*.php',
            './resources/**/*.blade.php',
            './vendor/filament/**/*.blade.php',
        ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.gray,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
