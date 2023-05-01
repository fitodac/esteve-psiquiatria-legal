<script setup>
import Sidebar from '@/Components/Admin/Sidebar.vue'
import {
	ElContainer, 
	ElAside,
	ElMain
} from 'element-plus'
import 'element-plus/dist/index.css'
</script>


<template>
<div class="common-layout w-screen h-screen">
	<el-container class="h-full">
		<el-aside>
			<Sidebar />
		</el-aside>

		<el-main>
			<slot />
		</el-main>
	</el-container>
</div>
</template>