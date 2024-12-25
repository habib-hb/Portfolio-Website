/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './app/**/*.php',
        "./node_modules/flowbite/**/*.js"
      ],

  theme: {
    extend: {
        fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
    },
  },
  plugins: [
    require('flowbite/plugin')
],
}



