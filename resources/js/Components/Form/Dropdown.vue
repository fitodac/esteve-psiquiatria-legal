<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    align: {
        default: 'right',
    },
    width: {
        default: '48',
    }
});

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const widthClass = computed(() => {
    return {
        48: 'w-48',
    }[props.width.toString()];
});

const alignmentClasses = computed(() => {
    if (props.align === 'left') {
        return 'origin-top-left left-0';
    } else if (props.align === 'right') {
        return 'origin-top-right right-0';
    } else {
        return 'origin-top';
    }
});

const open = ref(false);
</script>

<template>
<div class="form-dropdown relative">
	<div 
		@click="open = !open"
		class="dropdown-trigger">
		<span>
			<slot name="trigger" />
		</span>


		
		<svg class="w-5 h-5" viewBox="0 0 20 12" >
			<g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
				<g id="boton-flecha-abajo" transform="translate(-10.000000, -14.000000)" stroke="#5A5E5F" stroke-width="2">
					<polyline id="Rectangle" transform="translate(19.944059, 15.944059) rotate(45.000000) translate(-19.944059, -15.944059) " points="25.8881179 10 25.8881179 21.8881179 14 21.8881179"></polyline>
				</g>
			</g>
		</svg>
	</div>

	<!-- Full Screen Dropdown Overlay -->
	<div v-show="open" class="fixed inset-0 z-40" @click="open = false"></div>

	<transition
		enter-active-class="transition ease-out"
		enter-from-class="transform opacity-0"
		enter-to-class="transform opacity-100"
		leave-active-class="transition ease-in"
		leave-from-class="transform opacity-100"
		leave-to-class="transform opacity-0">

			<div
				v-show="open"
				class="dropdown-list"
				:class="[widthClass, alignmentClasses]"
				style="display: none"
				@click="open = false">
				
				<slot name="content" />

			</div>

	</transition>
</div>
</template>


<style lang="scss" scoped>
.form-dropdown{
	@apply bg-white border border-gray-400 w-full 
					mt-2 leading-none rounded-lg;
	box-shadow: 0 0 0 100px #FFF inset;
}

.dropdown-trigger{
	@apply w-full px-4 py-2.5 flex justify-between 
					items-center relative cursor-pointer;
}

.dropdown-list{
	@apply bg-color-form w-full pt-1.5 block 
						-mt-1 absolute rounded-b-lg z-50;
}
</style>