import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                roboto: ["Roboto", "sans-serif"],
            },
            boxShadow: {
                "light-shadow": "8px 8px 10px -3px rgb(50,61,74)",
                "lighter-shadow": "8px 8px 10px -3px rgb(60,71,78)",
            },
            textUnderlineOffset: {
                sm: "0.5rem",
            },
            colors: {
                blue: {
                    "background-med": "#012B4C",
                },
            },
        },
    },

    plugins: [forms, typography],
};
