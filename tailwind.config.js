/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      'node_modules/preline/dist/*.js'
  ],
  theme: {
      colors: {
          'text': '#000',
          'background': '#fdfaf7',
          'primary': '#d7882d',
          'secondary': '#f0be8a',
          'accent': '#f2a145',
      },
    extend: {},
  },
  plugins: [
      require('preline/plugin'),
      require('@tailwindcss/forms'),
  ],
}

