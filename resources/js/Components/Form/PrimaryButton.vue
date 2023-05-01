<script setup>
defineProps({
	type: {
		type: String,
		default: 'submit',
	},
});
</script>

<template>
	<button
		:type="type"
		class="btn-primary">
		<slot />
		<i class="ri-arrow-right-s-line"></i>
	</button>
</template>


<style lang="scss" scoped>
.btn-primary{
	@apply bg-brand-blue text-white 
					min-w-[200px] pl-8 pr-4 py-2 
					flex justify-between items-center 
					rounded-full transition-all 
					hover:opacity-90;
}

.ri-arrow-right-s-line{
	@apply bg-brand-pink text-white w-6 h-6 rounded-full;
}

i{
	left: 1px;
	position: relative;
}
</style>