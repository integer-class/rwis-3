/** @type {import('tailwindcss').Config} */
const {addDynamicIconSelectors} = require('@iconify/tailwind');
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    themes: [
        "light",
    ],
    plugins: [require("daisyui"), addDynamicIconSelectors()],
    theme: {
        fontFamily: {
            rubik: ["Rubik", "sans-serif"]
        }
    }
}
