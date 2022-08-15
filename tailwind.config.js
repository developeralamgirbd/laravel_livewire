/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        animation: {
            wiggle: 'wiggle 1s ease-in-out infinite',
        }
    },
  },
  plugins: [],
}
