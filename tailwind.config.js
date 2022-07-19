/** @type {import('tailwindcss').Config} */
module.exports = {
    prefix: 'tw-',
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: {
                'card-background': "url('https://kinsta.com/pt/wp-content/uploads/sites/3/2021/03/imagens-fundo-wordpress-1024x512.png')",
            },
            colors: {
                'rosa': '#FF69B4'
            }
        },
    },
    plugins: [
    ],
}
