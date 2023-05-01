<script setup>
import {
	ElRow, 
	ElMenu,
	ElMenuItem
} from 'element-plus'
import { Link, usePage } from '@inertiajs/inertia-vue3'
const page = usePage()
const url = page.url.value
</script>



<template>
<div class="bg-brand-blue border-r border-primary-blue w-full h-full">
	<div class="brand">Esteve Psiquiatría Legal</div>
	<el-row class="tac w-full">
		<el-menu
			active-text-color="#FFFFFF"
			background-color="#005FAF"
			class="!border-transparent w-full !mt-4"
			text-color="rgba(255,255,255,.7)"
			:default-active="url">

			<el-menu-item index="/admin" class="!p-0">
				<Link :href="route('admin')" class="w-full px-4 select-none">
					<el-icon><i class="ri-dashboard-line"></i></el-icon>
					<span>Dashboard</span>
				</Link>
			</el-menu-item>
			
			<el-menu-item index="/admin/podcasts" class="!p-0">
				<Link :href="route('admin.podcasts')" class="w-full px-4 select-none">
					<el-icon><i class="ri-soundcloud-line"></i></el-icon>
					<span>Podcasts</span>
				</Link>
			</el-menu-item>
			
			<el-menu-item index="/admin/videos" class="!p-0">
				<Link :href="route('admin.videos')" class="w-full px-4 select-none">
					<el-icon><i class="ri-youtube-line"></i></el-icon>
					<span>Videos</span>
				</Link>
			</el-menu-item>
		</el-menu>
	</el-row>
</div>
</template>



<style lang="scss" scoped>
.brand{
	background-color: #005FAF;
	background-image: url('../../img/brand.svg');
	background-position: center bottom;
	background-size: auto 100%;
	background-repeat: no-repeat;
	width: 100%;
	height: 100px;
	font-size: 0;
	padding: 10px 0;
}
</style>