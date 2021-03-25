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
          '550': '#2fb268'
        },
        lightblue: {
          '650': '#3576A4'
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
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
