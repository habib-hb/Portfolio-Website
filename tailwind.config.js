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
          animation: {
            fadeIn: 'fadeIn 1s linear',
            fadeIn2: 'fadeIn 1.5s linear',
            fadeIn3: 'fadeIn 2s linear',
            fadeIn4: 'fadeIn 2.5s linear',
            fadeIn5: 'fadeIn 3s linear',

          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            fadeIn2: {
              '0%': { opacity: '0' },
              '50%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            fadeIn3: {
              '0%': { opacity: '0' },
              '33%': { opacity: '0' },
              '66%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            fadeIn4: {
              '0%': { opacity: '0' },
              '25%': { opacity: '0' },
              '50%': { opacity: '0' },
              '75%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            fadeIn5: {
              '0%': { opacity: '0' },
              '20%': { opacity: '0' },
              '40%': { opacity: '0' },
              '60%': { opacity: '0' },
              '80%': { opacity: '0' },
              '100%': { opacity: '1' },
            },

          },
    },
  },
  plugins: [
    require('flowbite/plugin')
],
}



