<script setup>
import { onMounted, reactive, ref } from 'vue'

import PageLayout from '@/Layouts/PageLayout.vue'
import Intro from '@/Components/Pages/Intro.vue'
import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import PrimaryButton from '@/Components/Form/PrimaryButton.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import Checkbox from '@/Components/Form/Checkbox.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'

// import { useModal } from '@/store/modalStore.js'

// const modal = useModal();

// onMounted(() => {
//     modal.close()
//     modal.registrationClose()
// })

const {
	specialty_options
} = defineProps({
	specialty_options: Array
})

const specialty_dropdown = ref('')

const triggerDropdown = (opt) => {
	specialty_dropdown.value = opt.label
	form.speciality = opt.value
}



const form = useForm({
	name: 		'Luck Pedro',
	lastname: 	'Skywalker',
	email: 		'l.skywalker@lucasfilms.com',
	speciality: 'Geriatría',
	work_center: 'Hospital St. John',
	phone: 		'12345678',
	message: 	'Hola, quisiera enviar este mensaje por correo y que funcione a la primera... cuzaré los dedos.',
	acceptance: true
})

const submit = () => {
	form.post(route('contact.store'), {
		onSuccess: () => {
			form.reset()
		},
		onError: () => console.log('error')
	})
}
</script>


<template>
<PageLayout>
	<Intro :data="$page.props.intro" />
	
	<div class="container global px-6 xl:px-0">
    <div 
			v-if="$page.props.flash.message"
			class="p-4 mb-4 text-sm text-center rounded-lg" 
			:class="[`bg-${$page.props.flash.message.status}-100 text-${$page.props.flash.message.status}-700`]"
			role="alert">
			<span class="font-medium">
				{{ $page.props.flash.message.content }}
			</span>
    </div>
	</div>


	<form
		class=" pb-20"
		@submit.prevent="submit">

		<div class="container global px-6 xl:px-0">
			<div class="grid gap-y-6">
				<div class="grid gap-6 md:grid-cols-2">
					<div class="">
						<InputLabel value="Nombre*" />

						<TextInput
							id="name"
							type="text"
							class="mt-2 block w-full"
							v-model="form.name"/>

						<InputError class="mt-2" :message="form.errors.name" />
					</div>

					<div class="">
						<InputLabel value="Apellido*" />

						<TextInput
							id="lastname"
							type="text"
							class="mt-2 block w-full"
							v-model="form.lastname"/>

						<InputError class="mt-2" :message="form.errors.lastname" />
					</div>
				</div>

				<div class="">
					<InputLabel value="Correo electrónico*" />

					<TextInput
						id="email"
						type="text"
						class="mt-2 block w-full"
						v-model="form.email"/>

					<InputError class="mt-2" :message="form.errors.email" />
				</div>


				<div class="">
					<InputLabel value="Especialidad" />

					<Dropdown>
						<template #trigger>
							{{ specialty_dropdown }}
						</template>

						<template #content>
							<Option
								v-for="opt in specialty_options"
								:key="opt.value"
								@click="triggerDropdown(opt)">
								{{ opt.label }}
							</Option>
						</template>
					</Dropdown>
					
					<InputError class="mt-2" :message="form.errors.speciality" />
				</div>


				<div class="">
					<InputLabel value="Centro de trabajo" />

					<TextInput
						id="name"
						type="text"
						class="mt-2 block w-full"
						v-model="form.work_center"/>

					<InputError class="mt-2" :message="form.errors.work_center" />
				</div>



				<div class="">
					<InputLabel value="Teléfono" />

					<TextInput
						id="phone"
						type="text"
						class="mt-2 block w-full"
						v-model="form.phone"/>

					<InputError class="mt-2" :message="form.errors.phone" />
				</div>


				<div class="">
					<InputLabel value="Mensaje" />

					<textarea
						id="message"
						class="bg-white border border-gray-400 text-gray-600
										leading-none w-full h-40 px-4 py-2.5 
										mt-2 block rounded-lg resize-none 
										focus:outline-0 focus:ring-0 focus:border-gray-400"
						v-model="form.message"></textarea>

					<InputError class="mt-2" :message="form.errors.message" />
				</div>
				
				
				<div class="block select-none">
					<label class="inline-flex items-center">
						<Checkbox name="remember" v-model:checked="form.acceptance" />

						<span
							class="text-gray-600 cursor-pointer pl-3">
							He leído y acepto la

							<a
								href="https://www.esteveagora.com/es/privacidad"
								target="_blank"
								class="text-brand-blue font-bold pl-0.5 hover:underline">
								política de privacidad
							</a>
						</span>
					</label>
					<InputError class="mt-2" :message="form.errors.acceptance" />
				</div>
			</div>
		</div>



		<div class="bg-[#F2F0F4] px-6 py-8 mt-12 xl:px-0">
			<div class="container global">
				<div class="flex justify-center">
					<PrimaryButton
						class=""
						:class="{ 'opacity-25': form.processing }"
						:disabled="form.processing">
						<span>Enviar</span>
					</PrimaryButton>
				</div>
			</div>
		</div>



	</form>
</PageLayout>


<!-- 
<Layout>

		
		<div class="container px-5 mx-auto md:max-w-xl xl:px-0">
			

			
	</div>

</Layout> 
-->
</template>
