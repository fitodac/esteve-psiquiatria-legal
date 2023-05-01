<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
	<div
		class="dropdown-option">
		<slot />
	</div>
</template>


<style lang="scss" scoped>
.dropdown-option{
	@apply bg-opacity-10 w-full px-4 py-3 flex
						items-center text-sm leading-none text-gray-700 
						cursor-pointer transition ease-in-out
						hover:bg-opacity-20;
}

.dropdown-option:first-child{ @apply rounded-t-lg; }
.dropdown-option:last-child{ @apply rounded-b-lg; }
</style>