/** @type {import('tailwindcss').Config} */
const { addDynamicIconSelectors } = require('@iconify/tailwind');

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
    plugins: [
        require("daisyui"),
        addDynamicIconSelectors(),
    ],
    theme: {
        fontFamily: {
            rubik: ["Rubik", "sans-serif"]
        },
    },
    // all icons need to be added to the safelist so they don't get purged
    // by tailwindcss
    safelist: [
        'icon-[ic--outline-info]',
        'icon-[ic--baseline-space-dashboard]',
        'icon-[ic--round-location-city]',
        'icon-[ic--round-store-mall-directory]',
        'icon-[ic--baseline-public]',
        'icon-[ic--outline-other-houses]',
        'icon-[ic--baseline-person-outline]',
        'icon-[ic--baseline-attach-money]',
        'icon-[ic--outline-bookmark-added]',
        'icon-[ic--round-account-balance]',
        'icon-[material-symbols--notifications-unread-outline-rounded]',
        'icon-[material-symbols--report-outline-rounded]',
        'icon-[ic--round-podcasts]',
        'icon-[material-symbols--chat-outline-rounded]',
        'icon-[material-symbols--nest-clock-farsight-analog-outline-rounded]',
        'icon-[ic--round-attach-money]',
        'icon-[material-symbols--calculate]',
        'icon-[ic--baseline-exit-to-app]',
        'icon-[material-symbols:edit-document-outline-rounded]',
        'icon-[ic--round-attach-money]',
        'icon-[ic--round-mail-outline]',
        'icon-[material-symbols--insert-page-break-outline-rounded]'
    ]
}
