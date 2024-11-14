module.exports = {
  content: [
      "./app/Views/**/*.php",
      "./public/**/*.html",
      "./node_modules/flowbite/**/*.js",
  ],
  theme: {
      extend: {
          colors: {
              'gozi': {
                  '50': '#eff6ff',
                  '100': '#dbeafe',
                  '200': '#bedaff',
                  '300': '#92c4fe',
                  '400': '#5fa3fb',
                  '500': '#3f83f8',
                  '600': '#2360ed',
                  '700': '#1b4bda',
                  '800': '#1d3db0',
                  '900': '#1d398b',
                  '950': '#162455',
              },
          },
      },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
