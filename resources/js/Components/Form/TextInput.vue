<script setup>
import { onMounted, ref } from 'vue';

defineProps({
	modelValue: null,
	type: {
		default: 'text',
		type: String
	},
	rounded: Boolean
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
	<input
		:type="type"
		:value="modelValue"
		@input="$emit('update:modelValue', $event.target.value)"
		ref="input" 
		class="form-input"
		:class="rounded ? 'rounded-full' : 'rounded-lg'"/>
</template>


<style lang="scss" scoped>
.form-input{
	@apply bg-white text-gray-800 border 
					border-gray-400 w-full px-4 
					py-2.5 mt-2 leading-none;
	box-shadow: 0 0 0 100px #FFF inset;
}
</style>
