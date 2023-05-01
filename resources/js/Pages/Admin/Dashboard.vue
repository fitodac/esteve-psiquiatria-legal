<script setup>
import {
	ElButton 
} from 'element-plus'
import Layout from '@/Layouts/AdminLayout.vue'

const {
	podcasts,
	videos
} = defineProps(['podcasts', 'videos'])
</script>

<template>
<Layout>
<div class="pb-8">
	<div class="border-b text-xl leading-none font-bold pb-4">Dashboard</div>
</div>

<div class="grid grid-cols-4 gap-6">
	<div>
		<div class="border justify-between px-6 py-4 rounded-xl shadow">
			<div class="text-blue-300 font-medium select-none">Podcasts publicados</div>
			<div class="h-3"></div>
			<div class="text-gray-500 text-3xl font-light whitespace-nowrap">{{ podcasts }}</div>
		</div>
	</div>

	<div>
		<div class="border justify-between px-6 py-4 rounded-xl shadow">
			<div class="text-indigo-300 font-medium select-none">Videos publicados</div>
			<div class="h-3"></div>
			<div class="text-gray-500 text-3xl font-light whitespace-nowrap">{{ videos }}</div>
		</div>
	</div>

	<div>
		<div class="bg-gray-50 border-gray-50 justify-between h-full px-6 py-4 rounded-xl">
		</div>
	</div>

	<div>
		<div class="bg-gray-50 border-gray-50 justify-between h-full px-6 py-4 rounded-xl">
		</div>
	</div>
</div>


<div class="flex gap-2 mt-5">
	<div>
		<el-button 
			type="primary"
			tag="a"
			:href="route('admin.create.podcasts')">
			Nuevo podcast
		</el-button>
	</div>

	<div>
		<el-button 
			type="primary"
			tag="a"
			:href="route('admin.create.videos')">
			Nuevo video
		</el-button>
	</div>
</div>
</Layout>
</template>