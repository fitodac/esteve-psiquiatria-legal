<template>
<div class="indicator">
	<i class="ri-arrow-right-s-line"></i>
</div>
</template>


<style lang="scss" scoped>
.indicator{
	@apply bg-brand-pink text-white
					text-2xl 
					w-7 h-7
					grid place-content-center 
					rounded-full;

	i{
		left: 1px;
		position: relative;
	}
}
</style>