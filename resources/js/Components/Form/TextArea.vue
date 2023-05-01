<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: null,
    type: {
        default: 'text',
        type: String
    },
    rows: {
        default: 5,
        type: Number
    },
    cols: {
        default: 10,
        type: Number
    },
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
    <textarea :type="type" :value="modelValue" :rows="rows" :cols="cols" @input="$emit('update:modelValue', $event.target.value)" ref="input"
        class="form-input" />
</template>


<!-- <style lang="scss" scoped>
.form-input {
    @apply bg-color-form border-color-form w-full px-4 py-2.5 mt-2 leading-none rounded-lg focus: border-primary-500;
    box-shadow: 0 0 0 100px var(--color-form) inset;
}
</style> -->
