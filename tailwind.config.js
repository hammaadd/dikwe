module.exports = {
  // purge: {
  //       enabled: true,
  //       content:[
  //           './resources/**/*.blade.php',
  //           './resources/**/*.js',
  //       ]
  // },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        green: {
          '150': '#EAF7F0',
          '250': '#C1E8D2',
          '550': '#2fb268'
        },
        lightblue: {
          '650': '#97C4E3'
        },
        yellow: {
            '350': '#FBD878'
          }
      },
      fontFamily: {
        'cooper': ['cooper-black-std', 'serif'],
        'titan': ['"Titan One"', 'cursive'],
        'roboto': ['Roboto', 'sans-serif'],
        'roboto-slab': ['"Roboto Slab"', 'serif'],
      },
      fill: theme => ({
        green: theme('colors.green.550'),
        white: theme('colors.white')
      })
    },
  },
  variants: {
    extend: {
      fontWeight: ['hover', 'focus', 'active'],
      borderWidth: ['hover', 'focus', 'active'],
      fontSize: ['hover', 'focus', 'active'],
      borderRadius: ['hover', 'focus', 'active'],
      fill: ['hover', 'focus', 'active'],
      backgroundColor: ["checked"],
      borderColor: ["checked"],
      inset: ["checked"],
      zIndex: ["hover", "active"],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
