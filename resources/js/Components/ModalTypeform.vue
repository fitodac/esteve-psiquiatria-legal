<script setup>
import { useStore } from '@/store/mainStore.js'
const store = useStore()
import { storeToRefs } from 'pinia'

const { user } = storeToRefs(store)

let url = 'https://form.typeform.com/to/E3bLg6rQ'

if( user.value ){
	url += `#correo=${user.value.usu_email}&nombre=${user.value.usu_nombre}`
}
</script>


<template>
	<div class="bg-brand-blue bg-opacity-70  
							inset-0 fixed backdrop-blur-sm z-30">
		<div class="container global h-screen">
			<div class="h-full px-6 grid place-content-center grid-cols-12 xl:px-0">

				<div class="col-span-12">
					<div class="text-right pb-2">
						<button 
							@click="() => store.showModalContact(false)"
							class="text-white">
							<i class="ri-close-circle-line text-3xl"></i>
						</button>
					</div>

					<iframe 
						:src="url"
						height="500"
						frameborder="0"
						allowfullscreen="true"
						class="w-full" />
				</div>

			</div>
		</div>
	</div>
</template>