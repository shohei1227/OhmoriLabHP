/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php", "./**/*.php"],
  theme: {
    extend: {
      colors: {
        'main-green': '#008458',
      },
    },
  },
  colors: {
    primary: {
      '50': '#ebfef4',
      '100': '#d0fbe3',
      '200': '#a4f6cc',
      '300': '#6aebb2',
      '400': '#2fd892',
      '500': '#0abf7a',
      '600': '#009b63',
      '700': '#008458',
      '800': '#036242',
      '900': '#045038',
      '950': '#012d21',
    },
  },
  plugins: [],
}