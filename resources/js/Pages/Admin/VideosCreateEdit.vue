<script setup>
import { reactive } from 'vue'
import Layout from '@/Layouts/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import { 
	ElButton,
	ElForm,
	ElFormItem,
	ElInput,
	ElMessageBox 
} from 'element-plus'


const data = defineProps([ 'video' ])
let video = {
	title: '',
	link: '',
	youtube_id: ''
}
if( data.video ) video = {...data.video}

const form = useForm({...video})
const errors = reactive({})

const onSubmit = async () => {
	
	if( video.id ){
		form.patch(route('admin.update.videos', video.id), {
			onError: () => {
				console.log(form.errors)
				Object.keys(form.errors).forEach(e => {
					errors[e] = form.errors[e]
				})
			}
		})
	}else{
		form.post(route('admin.store.videos'), {
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
	ElMessageBox.alert('¿Estás segur@ de querer eliminar este video?', null, {
		confirmButtonText: 'SI, elimínalo',
		showCancelButton: true,
		type: 'warning',
		confirmButtonClass: 'el-button--danger',
		draggable: true,
		callback: action => {
			if( 'confirm' === action ){
				form.delete(route('admin.destroy.videos', video.id))
			}
		},
	})
}


const getYtId = url => {
  let regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/
	let match = url.match(regExp)
	return (match&&match[7].length==11)? match[7] : false
}

const setYtId = () => {
	form.youtube_id = getYtId(form.link)
	console.log('video', form)
}
</script>


<template>
<Layout>
	<div class="pb-8">
		<div class="border-b text-xl leading-none font-bold pb-4">
			{{ video.id ? 'Video' : 'Nuevo video' }}
		</div>
	</div>


	<div class="grid lg:grid-cols-12">
		<div class="lg:col-span-6">

			<el-form :model="form" label-width="120px">
				<el-form-item label="Título">
					<el-input v-model="form.title" />
				</el-form-item>

				<el-form-item label="URL">
					<el-input 
						v-model="form.link" 
						@keyup="setYtId"
						@change="setYtId" />
				</el-form-item>

				<el-form-item label="Video ID">
					<el-input v-model="form.youtube_id" readonly disabled />
				</el-form-item>
				
				<el-form-item>
					<div class="w-full flex justify-center items-center gap-x-3 md:justify-end">
						<Link :href="route('admin.videos')" class="text-blue-400 text-sm leading-none">Cancelar</Link>
						<el-button type="primary" @click="onSubmit">Guardar</el-button>
					</div>
				</el-form-item>
			</el-form>


			<el-form
				v-if="video.id" 
				:model="destroy" 
				class="mt-10">
				<el-form-item>
					<div class="w-full flex justify-center items-center gap-x-3 md:justify-end">
						<div class="mt-1 text-red-500 text-xs"><strong>Cuidado:</strong> esta acción no podrá deshacerse</div>
						
						<el-button 
							type="danger" 
							@click="openConfirm">
							<i class="ri-delete-bin-line"></i>
							<span class="pl-2">Eliminar video</span>
						</el-button>
					</div>
				</el-form-item>
			</el-form>

		</div>
	</div>
</Layout>
</template>