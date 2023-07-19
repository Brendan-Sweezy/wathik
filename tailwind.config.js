/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
  theme: {
    extend: {
      colors: {
        slate: colors.slate,
      },
    },
  },
  plugins: [
    require("@tailwindcss/forms"),

    // Only necessary if you're going to use the switch-toggle component with different colors
    require("./vendor/rawilk/laravel-form-components/resources/js/tailwind-plugins/switch-toggle"),

    // Only necessary if you're going to support dark mode
    require("./vendor/rawilk/laravel-form-components/resources/js/tailwind-plugins/dark-mode"),
  ],
}

