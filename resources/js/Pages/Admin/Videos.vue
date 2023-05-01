<script setup>
import { h } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/AdminLayout.vue'
import {
  ElButton,
	ElTableV2
} from 'element-plus'

const { videos } = defineProps({
	videos: Array
})

const columns = [
	{
		key: 'title',
		title: 'Título',
		dataKey: 'title',
		width: 550,
		cellRenderer: e => (
			h(Link, {
				class: 'font-bold hover:text-blue-400',
				innerText: e.rowData.title,
				href: `/admin/videos/${e.rowData.id}`
			})
		)
	},
	{
		key: 'youtube_id',
		title: 'Video',
		dataKey: 'youtube_id',
		width: 150
	},
	{
		key: 'actions',
		title: '',
		dataKey: 'actions',
		width: 100,
		align: 'right',
		cellRenderer: e => (
			h(Link, {
				class: 'bg-blue-400 text-sm font-medium text-white leading-none px-3 py-1.5 rounded transition-all hover:opacity-80', 
				innerText: 'Editar',
				href: `/admin/videos/${e.rowData.id}`
			})
		)
	}
]
</script>

<template>
<Layout>
<div class="pb-8">
	<div class="border-b text-xl leading-none font-bold pb-4">Videos</div>
</div>


<el-button 
	type="primary"
	tag="a"
	:href="route('admin.create.videos')">
	Nuevo video
</el-button>


<el-table-v2
	:columns="columns"
	:data="videos"
	:width="800"
	:height="400"
	fixed
/>
</Layout>
</template>