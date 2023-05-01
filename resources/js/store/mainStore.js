import { defineStore } from 'pinia'

export const useStore = defineStore("main", {
	state: () => ({
		user: null,
		site_allowed: false,
		scroll: '',
		modal_contact: false
		// token: null
	}),

	getters: {
		getName(state){ return state.user?.usu_nombre }
	},

	actions: {
		setUser(val){
			this.user = val;
		},
		deleteUser(){
			this.user = null
		},

		allowSite(val){
			this.site_allowed = val
		},

		setScroll(val){
			if(val) 
				this.scroll = 'affix'
			else
				this.scroll = ''
		},

		showModalContact(val){
			this.modal_contact = val
		}
	},
});
