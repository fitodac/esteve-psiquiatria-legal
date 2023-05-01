<script setup>
	import {Link} from '@inertiajs/inertia-vue3'

	defineProps({
		link: String,
		type: String,
		className: String
	})
</script>


<template>
	<Link 
		v-if="!type" 
		:href="link" 
		:class="['btn', className ?? '']">
		<span><slot/></span>
		<i class="ri-arrow-right-s-line"></i>
	</Link>

	<button 
		v-if="'submit' === type" 
		:class="['btn', className ?? '']">
		<span><slot/></span>
		<i class="ri-arrow-right-s-line"></i>
	</button>
</template>


<style lang="scss" scoped>
.btn{
	@apply bg-brand-pink text-white 
						font-medium leading-none whitespace-nowrap 
						pl-8 pr-5 pt-2.5 pb-3 gap-x-3
						inline-flex items-center select-none
						transition-all rounded-full;
}

.btn > span{
	@apply font-bold text-center flex-1;
}



[class^="ri-"]{
	@apply bg-brand-blue w-6 h-6 relative
						left-0
						flex justify-center items-center 
						transition-all rounded-full;
}

.btn:hover{
	@apply brightness-125;

	[class^="ri-"]{
		@apply left-1;
	}
}
</style>