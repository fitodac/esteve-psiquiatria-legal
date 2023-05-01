<script setup>
import { onMounted } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import CtaIndicator from '@/Components/CtaIndicator.vue'

const { data } = defineProps({
	data: Object
})

const { title, people } = data
const classes = ['opacity-50', 'grayscale']

const handleMouseHover = e => { 
	const items = document.querySelectorAll('.team-grid-item')
	items.forEach(e => {
		e.querySelector('.team-grid-item--picture').classList.add(...classes)
		e.querySelector('.team-grid-item--name').classList.add(...classes)
		e.querySelector('.team-grid-item--position').classList.add(...classes)
		e.querySelector('.indicator').classList.add(...classes)
	})
	e.target.querySelector('.team-grid-item--picture').classList.remove(...classes)
	e.target.querySelector('.team-grid-item--name').classList.remove(...classes)
	e.target.querySelector('.team-grid-item--position').classList.remove(...classes)
	e.target.querySelector('.indicator').classList.remove(...classes)
}

const handleMouseLEave = () => { 
	const items = document.querySelectorAll('.team-grid-item')
	items.forEach(e => {
		e.querySelector('.team-grid-item--picture').classList.remove(...classes)
		e.querySelector('.team-grid-item--name').classList.remove(...classes)
		e.querySelector('.team-grid-item--position').classList.remove(...classes)
		e.querySelector('.indicator').classList.remove(...classes)
	})
}
</script>


<template>
<section id="team">
	<div class="container global">

		<div class="title">{{ title }}</div>

		<div class="team-grid">
			<div 
				v-for="el in people"
				:key="el.id"
				class="grid justify-center">
				<Link 
					:href="`/comite#${el.ref}`"
					class="team-grid-item"
					@mouseover="el => handleMouseHover(el)"
					@mouseleave="handleMouseLEave">

					<img 
						:src="`/img/home/${el.thumb}`" 
						:alt="el.name" 
						class="team-grid-item--picture"/>
					<div class="team-grid-item--name">{{ el.name }}</div>
					<div class="team-grid-item--position" v-html="el.position" />

					<div class="h-10 flex justify-center items-end">
						<CtaIndicator class="sm:bottom-0 sm:absolute"/>
					</div>
				</Link>
			</div>
		</div>

	</div>
</section>
</template>


<style lang="scss" scoped>
#team{
	background: #EFEFF3;
	@apply px-6 py-14;
}

.title{
	@apply text-brand-blue text-xl font-bold leading-none text-center md:text-2xl;
}

.team-grid{
	@apply grid gap-y-14 mt-10 relative
					sm:mt-14 sm:grid-cols-3 sm:gap-y-0;
}

.team-grid-item{
	@apply grid gap-y-4 self-start
					justify-center text-center;
}

.team-grid-item > *{
	@apply pointer-events-none;
}

.team-grid-item--picture{
	@apply w-36 h-36 mx-auto transition-all;
}

.team-grid-item--name{
	@apply text-brand-blue text-xl font-bold leading-tight
					whitespace-nowrap overflow-hidden text-ellipsis
					transition-all;
}

.team-grid-item--position{
	@apply text-gray-500 leading-snug transition-all
					sm:text-sm;
}
</style>