/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./inc/**/*.php",
    "./template-parts/**/*.php",
    "./js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: '#2fe43b', // Your new neon green
        secondary: '#0a0a0a', // Deep obsidian background
        surface: '#171717', // Slightly lighter for cards
        tertiary: '#a3a3a3', // Muted text and borders
        neutral: '#ffffff', // Crisp white text
      },
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      }
    },
  },
  plugins: [],
}