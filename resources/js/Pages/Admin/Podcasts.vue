<script setup>
import { h } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/AdminLayout.vue'
import {
  ElButton,
	ElTableV2
} from 'element-plus'


const { podcasts } = defineProps({
	podcasts: Array
})


const columns = [
	{
		key: 'title',
		title: 'Título',
		dataKey: 'title',
		width: 300,
		cellRenderer: e => (
			h(Link, {
				class: 'font-bold hover:text-blue-400',
				innerText: e.rowData.title,
				href: `/admin/podcasts/${e.rowData.id}`
			})
		)
	},
	{
		key: 'month',
		title: 'Mes',
		dataKey: 'month',
		width: 100
	},
	{
		key: 'url',
		title: 'URL',
		dataKey: 'url',
		width: 200
	},
	{
		key: 'active',
		title: 'Activo',
		dataKey: 'active',
		align: 'center',
		width: 50,
		cellRenderer: e => {
			let _cls = 'text-2xl leading-none'
			_cls += e.rowData.active ? ' ri-volume-down-line text-green-500' : ' ri-volume-mute-line text-gray-200'

			return h('i', {
				class: _cls
			})
		}
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
				href: `/admin/podcasts/${e.rowData.id}`
			})
		)
	}
]

</script>

<template>
<Layout>
<div class="pb-8">
	<div class="border-b text-xl leading-none font-bold pb-4">Podcasts</div>
</div>


<el-button 
	type="primary"
	tag="a"
	:href="route('admin.create.podcasts')">
	Nuevo podcast
</el-button>


<el-table-v2
	:columns="columns"
	:data="podcasts"
	:width="800"
	:height="400"
	fixed
/>


</Layout>
</template>