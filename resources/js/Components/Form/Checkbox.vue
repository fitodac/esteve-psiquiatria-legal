<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
	checked: {
		type: [Array, Boolean],
		default: false,
	},
	value: {
		default: null,
	},
});

const proxyChecked = computed({
	get() {
		return props.checked;
	},

	set(val) {
		emit('update:checked', val);
	},
});
</script>

<template>
	<div class="checkbox">
		<input
			type="checkbox"
			:value="value"
			v-model="proxyChecked"/>
		
		<div>
			<svg class="w-5 h-5" viewBox="0 0 24 24">
				<path fill="none" d="M0 0h24v24H0z"/>
				<path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" fill="rgba(255,255,255,1)"/>
			</svg>
		</div>
	</div>
</template>


<style scoped>
.checkbox{
	
}

.checkbox > input{
	@apply hidden;
}

.checkbox > input + div{
	@apply border-4 border-color-form w-5 h-5 
					flex justify-center items-center 
					transition-all cursor-pointer;
}

.checkbox > input + div svg{ @apply hidden; }


.checkbox > input:checked + div{
	@apply bg-brand-blue border-brand-blue;
}

.checkbox > input:checked + div svg{ @apply block; }

label:hover .checkbox > div{
	@apply bg-brand-blue;
}
</style>