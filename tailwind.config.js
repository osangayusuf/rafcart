/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screen:{
        sm: "576px",
        md: "768px",
        lg: "992px",
        xl: "1200px",
    },
    container: {
        center: true,
        padding: "1rem",
    },
    extend: {
        colors: {
            'primary': '#fd3d57',
        },
        fontFamily:{
            'poppins': ["Poppins", "sans-serif"],
            'roboto': ["Roboto", "sans-serif"]
        }
    },
    },
  // plugins: [require("@tailwindcss/forms")],

}
