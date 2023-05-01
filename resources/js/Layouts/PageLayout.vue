<script setup>
import { onMounted, computed, watch, ref } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
import Modal from '@/Components/ModalBlocked.vue'
import Typeform from '@/Components/ModalTypeform.vue'

const page = usePage()
const url = ref(page.url.value)
const store = useStore()
const { 
	user,
	site_allowed,
	modal_contact
} = storeToRefs(store)



const showModal = computed(() => {
	document.body.classList.remove('overflow-hidden')
	return !site_allowed.value
})



const allowSite = () => {
	if( user.value ) return
	
	switch(url.value){
		case '/situaciones-consultas': 
		case '/xeristar': 
			store.allowSite(false)
			break;
		default:
			store.allowSite(true)
	}
}



watch(url, val => {
	switch(val){
		case '/situaciones-consultas': 
		case '/xeristar': 
			store.allowSite(false)
			break;
		default:
			store.allowSite(true)
	}
})



watch(user, val => {
	if(val) store.allowSite(true)
})



onMounted(() => allowSite())
</script>


<template>
<div id="mainLayout">
	<Header />
	<slot />
	<Footer />

	<Teleport to="body">
		<Modal v-if="showModal" />
		<Typeform v-if="modal_contact" />
	</Teleport>
</div>
</template>