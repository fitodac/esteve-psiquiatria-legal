<script setup>
import { ref, h } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import {useStore} from '@/store/mainStore.js'
import {storeToRefs} from 'pinia'

import 'swiper/css'


const { data } = defineProps({
	data: Object
})

const { title, items } = data
const store = useStore()
const { user } = storeToRefs(store)

const breakpoints = {
	480: {
		slidesPerView: 2,
		spaceBetween: 30
	},
	768: {
		slidesPerView: 2,
		spaceBetween: 40,
		allowTouchMove: false,
		centeredSlides: true,
		centeredSlidesBounds: true
	},
	960: {
		slidesPerView: 3,
	},
	1400: {
		slidesPerView: 4,
	}
}


const onSwiper = e => {
	document.querySelector('.video-prev').addEventListener('click', () => {
		e.slidePrev()
	})

	document.querySelector('.video-next').addEventListener('click', () => {
		e.slideNext()
	})
}



const carouselItem = data => {
	const { item } = data
	
	return (h(
		'div', { class: 'item--body' },
		[
			h('div', {class: 'item--portrait'}, [
				h('img', {class: 'item--portrait-img', src: `https://img.youtube.com/vi/${item.youtube_id}/sddefault.jpg`}),
				h('i', {class: 'ri-play-circle-fill'})
			]),
			h('div', {class: 'item--title', innerHTML: item.title})
		]
	))
}


const modal_open = ref(false)
const video_title = ref('')
const video_src = ref('')

const extractVideoIdFromUrl = url => {
  var match = url.match(/(?:v=)([\w-]+)/);
  return match ? match[1] : null;
}

const openVideoModal = data => {
	if( !user.value ){
		store.allowSite(false)
		return
	}
	const src = extractVideoIdFromUrl(data.link)
	video_src.value = `https://www.youtube.com/embed/${src}?amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1`
	video_title.value = data.title
	modal_open.value = true
}

const closeVideoModal = () => {
	modal_open.value = false
	video_src.value = ''
	video_title.value = ''
}

</script>



<template>
<section id="videos">
	<div class="container global">
		<div v-if="title" class="title">{{ title }}</div>
		
		<div class="px-6 hidden justify-end gap-x-10 md:flex md:mt-4 lg:mt-10">
			<button class="video-prev">
				<i class="ri-arrow-left-s-line"></i>
			</button>
			<button class="video-next">
				<i class="ri-arrow-right-s-line"></i>
			</button>
		</div>
	</div>


	<Swiper
		:centerInsufficientSlides="true"
		:breakpoints="breakpoints"
		:slidesPerView="1"
		:spaceBetween="30"
		@swiper="onSwiper"
		class="mt-10">

		<swiper-slide 
			v-for="item in items"
			:key="item.id"
			class="item">
			<carouselItem 
				:item="item"
				@click="openVideoModal(item)"/>
		</swiper-slide>

		<swiper-slide class="w-10 hidden md:block"></swiper-slide>
	</Swiper>
</section>



<div v-if="modal_open" id="plyrModal">
	<div class="h-full container global 
							grid grid-cols-1 place-content-center">

		<div class="w-full flex justify-center">
			<div class="w-[700px]">
				<div class="flex gap-x-6 pb-4">
					<div class="flex-1">
						<h3 class="text-white select-none">{{ video_title }}</h3>
					</div>

					<button 
						@click="closeVideoModal"
						class="text-white">
						<i class="ri-close-circle-line text-3xl"></i>
					</button>
				</div>

				<vue-plyr class="relative">
					<div class="plyr__video-embed">
						<iframe
							:src="video_src"
							allowfullscreen
							allowtransparency
							allow="autoplay"
						></iframe>
					</div>
				</vue-plyr>
			</div>
		</div>

	</div>
</div>
</template>


<style lang="scss" scoped>
#videos{
	@apply px-6 pt-20 pb-20 md:pb-28;

	@media (min-width: 480px){
		@apply px-0;
	}
}

.title{
	@apply text-brand-pink text-xl font-bold leading-none text-center md:text-2xl;
}


.swiper-slide.item{
	@apply text-left min-w-[300px] relative select-none;
}

#videos :deep(.item--body){
	@apply grid gap-y-4 transition-all cursor-pointer;
}

#videos :deep(.item--portrait){
	@apply h-56 relative rounded-2xl overflow-hidden 
					lg:h-60;

	.item--portrait-img{
		@apply w-full h-full object-cover transition-all pointer-events-none;
	}

	.ri-play-circle-fill{
		@apply text-white text-5xl leading-none
						-ml-5 -mt-5 left-1/2 top-1/2 absolute
						transition-all;
		filter: drop-shadow(0px 0px 6px rgba(0,0,0,0.5));
	}
}

#videos :deep(.item--title){
	@apply text-gray-400 leading-none font-semibold transition-all;
}

#videos :deep(.item--body:hover){
	@apply gap-y-3;

	.item--title{
		@apply text-brand-blue;
	}

	.item--portrait{
		.item--portrait-img{
			@apply scale-110;
		}

		.ri-play-circle-fill{
			@apply opacity-30;
		}
	}
}


.video-prev,
.video-next{
	@apply bg-brand-blue text-white 
						text-lg leading-none w-7 h-7 
						grid place-content-center 
						transition-all rounded-full
						hover:opacity-80;
}


#plyrModal{
	@apply bg-black bg-opacity-80 
					px-6 inset-0 fixed z-30
					xl:px-0;
}

.plyr__video-embed{
	@apply h-60 sm:h-72 md:h-[400px];
}
</style>


<style>
.swiper-wrapper{
	padding-bottom: 20px;

	@media (min-width: 480px){ padding-left: 40px; }
	@media (min-width: 768px){ padding-left: 400px; }
	@media (min-width: 960px){ padding-left: 12vw; }
	@media (min-width: 1400px){ padding-left: 15vw; }
}
</style>

