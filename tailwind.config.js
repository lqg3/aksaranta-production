import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                jua: ["Jua", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
                opensans: ["Open Sans", "sans-serif"],
            },
            colors:{
                bg:{
                    dark: "#1b1b1b",
                    card: "#595959",
                },
                accent:{
                    teal:"#1DBF9F",
                    yellow: "#E5CA46"
                },
                secondary:{
                    base:"#090C9B"
                },
                text:{
                    primary:"#FAF9F6"
                }
            },
            fontSize: {
                title: ['3rem', { lineHeight: '3rem', fontWeight: '500' }],
                heading2: ['2.5rem', { lineHeight: '2.5rem', fontWeight: '600' }],
                heading3: ['2rem', { lineHeight: '2.25rem', fontWeight: '400' }],
                heading4: ['1.75rem', { lineHeight: '2rem', fontWeight: '400' }],
                heading5: ['1.5rem', { lineHeight: '1.75rem', fontWeight: '400' }],
                p: ['1rem', { lineHeight: '1.5rem', fontWeight: '400' }]
            }
        },
    },

    plugins: [forms],
};