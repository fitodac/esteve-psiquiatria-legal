<script setup>
import { reactive } from 'vue'
import Layout from '@/Layouts/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import { 
	ElButton,
	ElForm,
	ElFormItem,
	ElInput,
	ElSelect,
	ElOption,
	ElMessageBox 
} from 'element-plus'



const data = defineProps([ 'podcast' ])
let podcast = {
	title: '',
	url: '',
	month: '',
	content: '',
	iframe: '',
	active: false
}
if( data.podcast ) podcast = {
	...data.podcast,
	active: data.podcast.active ? true : false
}

const form = useForm({...podcast})
const errors = reactive({})


const onSubmit = async () => {
	
	if( podcast.id ){
		form.patch(route('admin.edit.podcasts', podcast.id), {
			onError: () => {
				console.log(form.errors)
				Object.keys(form.errors).forEach(e => {
					errors[e] = form.errors[e]
				})
			}
		})
	}else{
		form.post(route('admin.store.podcasts'), {
			onError: () => {
				console.log(form.errors)
				Object.keys(form.errors).forEach(e => {
					errors[e] = form.errors[e]
				})
			}
		})
	}
}


const destroy = useForm({})

const openConfirm = () => {
	ElMessageBox.alert('¿Estás segur@ de querer eliminar este podcast?', null, {
		confirmButtonText: 'SI, elimínalo',
		showCancelButton: true,
		type: 'warning',
		confirmButtonClass: 'el-button--danger',
		draggable: true,
		callback: action => {
			if( 'confirm' === action ){
				form.delete(route('admin.destroy.podcasts', podcast.id))
			}
		},
	})
}


const getIframeUrl = () => {
	const div = document.createElement("div")
	div.innerHTML = form.iframe
	const iframe = div.querySelector('iframe')
	if( iframe ) form.url = iframe.src
}
</script>


<template>
<Layout>
	<div class="pb-8">
		<div class="border-b text-xl leading-none font-bold pb-4">
			{{ podcast.id ? 'Podcast' : 'Nuevo podcast' }}
		</div>
	</div>


	<div class="grid lg:grid-cols-12">
		<div class="lg:col-span-6">

			<el-form :model="form" label-width="120px">
				<el-form-item label="Título*">
					<el-input v-model="form.title" @blur="errors.title = null"/>
					<div class="text-xs text-red-500">{{ errors.title }}</div>
				</el-form-item>

				<el-form-item label="SoundCloud">
					<el-input 
						v-model="form.iframe" 
						@blur="errors.url = null"
						@keyup="getIframeUrl"
						placeholder="Aquí va el código del iframe" />
					<div>
						<div class="text-xs text-red-500">{{ errors.url }}</div>
					</div>
				</el-form-item>

				<el-form-item label="URL">
					<el-input v-model="form.url" readonly disabled>
						<template #append>
							<el-button 
								type="primary"
								@click="() => form.url = ''">Borrar</el-button>
						</template>
					</el-input>
				</el-form-item>

				<el-alert 
					description="Si ya hay contenido en el campo URL pero el campo iframe está vacío se mostrará el iframe de SoundCloud en el front-end de la página."
					type="warning"
					:closable="false" />
				<div class="h-5"></div>

				<el-form-item label="Mes*" @change="errors.month = null">
					<div>
						<el-select 
							v-model="form.month" 
							placeholder="Selecciona un mes">
							<el-option label="Enero" 			value="enero" />
							<el-option label="Febrero" 		value="febrero" />
							<el-option label="Marzo" 			value="marzo" />
							<el-option label="Abril" 			value="abril" />
							<el-option label="Mayo" 			value="mayo" />
							<el-option label="Junio" 			value="junio" />
							<el-option label="Julio" 			value="julio" />
							<el-option label="Agosto" 		value="agosto" />
							<el-option label="Septiembre" value="septiembre" />
							<el-option label="Octubre" 		value="octubre" />
							<el-option label="Noviembre" 	value="noviembre" />
							<el-option label="Diciembre" 	value="diciembre" />
						</el-select>
						<div class="text-xs text-red-500">{{ errors.month }}</div>
					</div>
				</el-form-item>

				<el-form-item label="Contenido">
					<el-input v-model="form.content" type="textarea" rows="6" @blur="errors.content = null" />
					<div class="text-xs text-red-500">{{ errors.content }}</div>
				</el-form-item>


				<el-form-item label="Activo">
					<el-switch v-model="form.active" />
				</el-form-item>
				
				<el-form-item>
					<div class="w-full flex justify-center items-center gap-x-3 md:justify-end">
						<Link :href="route('admin.podcasts')" class="text-blue-400 text-sm leading-none">Cancelar</Link>
						<el-button type="primary" @click="onSubmit">Guardar</el-button>
					</div>
				</el-form-item>
			</el-form>



			<el-form
				v-if="podcast.id" 
				:model="destroy" 
				class="mt-10">
				<el-form-item>
					<div class="w-full flex justify-center items-center gap-x-3 md:justify-end">
						<div class="mt-1 text-red-500 text-xs"><strong>Cuidado:</strong> esta acción no podrá deshacerse</div>
						
						<el-button 
							type="danger" 
							@click="openConfirm">
							<i class="ri-delete-bin-line"></i>
							<span class="pl-2">Eliminar podcast</span>
						</el-button>
					</div>
				</el-form-item>
			</el-form>
			
		</div>
	</div>
</Layout>
</template>