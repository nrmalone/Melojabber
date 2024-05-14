/** @type {import('tailwindcss').Config} */
module.exports = {
  /*
  if new styles/classes are defined in a view, rerun under the 'app' directory:
  npx tailwindcss -i ../public/assets/input.css -o ../public/assets/styles.css --watch
   */
  content: ["./views/*.{html,js}", "../public/assets/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}

