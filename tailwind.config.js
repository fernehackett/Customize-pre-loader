module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'group-hover'],
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
    corePlugins: {
        boxShadow: false,
    }
}
