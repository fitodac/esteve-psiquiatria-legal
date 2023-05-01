const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
		'./resources/js/**/*.vue',
		'./tailwind-whitelist.txt',
	],

	theme: {

		extend: {
			fontFamily: {
				// sans: ['Barlow', ...defaultTheme.fontFamily.sans],
			},

			colors: {
				'brand': {
					blue: {
						DEFAULT: '#005FAF'
					},
					magenta: {
						DEFAULT: '#9A0079'
					},
					pink: {
						DEFAULT: '#ED6F81'
					}
				},
				'color-form': '#EBF2F4',
				'gray-light': '#EBF2F4'
			}
		},
	},

	plugins: [
		require('@tailwindcss/forms')
	],
};
