module.exports = {
  content: [
      "./app/Views/**/*.php",
      "./public/**/*.html",
      "./node_modules/flowbite/**/*.js",
  ],
  theme: {
      extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
