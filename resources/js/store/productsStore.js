import { defineStore } from 'pinia'

export const productsStore = defineStore('products', {
	state: () => ({
		current_tab: 'Dormi'
		// token: null
	}),

	actions: {
		toggleTab(val){ this.current_tab = val }
	}
})
