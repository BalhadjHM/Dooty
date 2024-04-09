/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      'node_modules/preline/dist/*.js'
  ],
  theme: {
    extend: {
        colors: {
            'text': '#000',
            'background': '#fdfaf7',
            'primary': '#d7882d',
            'secondary': '#f0be8a',
            'accent': '#f2a145',
        },
    },
  },
  plugins: [
      require('preline/plugin'),
      require('@tailwindcss/forms'),
  ],
}

