/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      spacing: {
        '128': '45rem',
        '132': '52rem',
      }
    },
    listStyleType: {
      none: 'none',
      disc: 'disc',
      decimal: 'decimal',
      square: 'square',
      alpha: 'lower-alpha',
    },
  },
  variants: {
    extend: {
      backgroundColor: ['active'],
    }
  },
  daisyui: {
    themes: [
      {
        mytheme: {
                  "primary": "#fb923c", "secondary": "#0ea5e9", "accent": "#a3e635", "neutral": "#f3f4f6", "base-100": "#FFFFFF", "info": "#3396CE","success": "#A3CC46","warning": "#f59e0b", "error": "#F87272",
        },
      },
    ],
  },
  plugins: [require("daisyui")],
}
