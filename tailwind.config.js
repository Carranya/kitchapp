/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.{php,html,twig,js}', './node_modules/tw-elements/dist/js/**/*.js'],
  theme: {
    extend: {},
  },
  plugins: [require('tw-elements/dist/plugin')],
}