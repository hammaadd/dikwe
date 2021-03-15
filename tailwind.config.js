module.exports = {
  purge: {
        enabled: true,
        content:[
            './resources/**/*.blade.php',
            './resources/**/*.js',
        ]
},
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
