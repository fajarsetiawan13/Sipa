module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
            {
                sipa: {
                    primary: '#A855F7',
                    secondary: '#A3A3A3',
                    success: '#22C55E',
                    danger: '#EF4444',
                    warning: '#FCD34D',
                    info: '#5EEAD4',
                    light: '#F5F5F5',
                    dark: '#404040',
                }
            },
            'light', 'dark', 'emerald',
        ]
    }
}
