import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            keyframes: {
                moveLeftRight: {
                    "0%": { transform: "translateX(0)" },
                    "100%": { transform: "translateX(4px)" },
                },
            },
            clipPath: {
                "curve-bottom":
                    "polygon(0 0, 100% 0, 100% 80%, 50% 100%, 0 80%)",
            },
        },
        animation: {
            moveLeftRight: "moveLeftRight 0.5s infinite alternate ease-in-out",
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
