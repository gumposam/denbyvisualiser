const colours = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
      './resources/**/*.vue',
      './resources/js/Components/**/*.vue',
      './resources/js/Components/QuoteCamper/*.vue',
      './resources/js/database/faq.js'
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
        },
        minWidth: {
            share: '37.5%',
        },
        colors: {
            slate: colours.slate,
            cyan: colours.cyan,
            sky: colours.sky,
            denbyRed: '#EE1111',
            denbyDarkBlue: '#2F4250',
            denbyLightBlue: '#234B69',
            denbyHeader: '#344154',
            denbyOrange: '#FF5C2B',
            denbySubtitle: '#828282',
            denbyTitle: '#344154',
            denbyShare: '#586577',
            denbyNavigationLight: '#586577',
            denbyNavigationDark: '#2C333C',
            placeholder: '#C5C5C5',
            denbyFormButton: '#2ccbe5',
        },
    },
  },
  plugins: [],
}
