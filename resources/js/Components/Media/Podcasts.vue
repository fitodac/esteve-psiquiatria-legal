<script setup>
import { h } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'

import CtaIndicator from '@/Components/CtaIndicator.vue'


const { data } = defineProps({
	data: Object
})

const { title, items } = data


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
		slidesPerView: 4,
	}
}

const onSwiper = e => {
	document.querySelector('.podcast-prev').addEventListener('click', () => {
		e.slidePrev()
	})

	document.querySelector('.podcast-next').addEventListener('click', () => {
		e.slideNext()
	})
}

const carouselItem = data => {
	const { item } = data
	// const type = item.link ? Link : 'div'
	// const type = item.link ? 'a' : 'div'

	return (h(
		'a', { class: 'item--body', href: `/situaciones-consultas#podcast-${item.id}` ?? '' },
		[
			h('div', {class: 'item--header'}, [
				h('div', {class: 'item--month capitalize', innerHTML: item.month}),
				h('div', {class: 'item--title', innerHTML: item.title}),
				h('svg', {viewBox: '0 0 63 63', innerHTML: `
																<g stroke="none" stroke-width="1" fill-rule="evenodd">
																	<path d="M45.562936,35.0005211 C46.7555347,34.9753836 47.870056,35.8626014 47.94184,37.045039 C48.1579789,40.6106688 47.8334756,44.0886097 45.9098595,47.2387885 C43.2998699,51.5131404 39.5138017,54.0331276 34.4985545,54.7042408 C34.3062125,54.7301578 34.1160339,54.7724434 33.8633147,54.8182365 L33.8633147,58.3291095 C35.0417533,58.3291095 36.2079984,58.3078692 37.3728668,58.3339811 C39.0587104,58.3719796 40.1751984,59.9821447 39.5633622,61.4948775 C39.1934285,62.4097661 38.4795213,62.9709757 37.4824112,62.9779908 C33.4864976,63.0060513 29.489994,63.0083897 25.4940803,62.9785754 C24.2245842,62.9690271 23.2412409,61.8797348 23.2508777,60.6411763 C23.2605145,59.3948232 24.2446444,58.3877637 25.5296774,58.3347605 C26.1169299,58.3104025 26.7061492,58.3287197 27.2945818,58.32833 L29.0901666,58.32833 L29.0901666,58.32833 L29.0901666,54.9137201 C27.7911702,54.5919989 26.4660168,54.3564077 25.2036007,53.9355005 C19.3355982,51.9786716 15.1320025,46.2416671 15.0157713,40.1077237 C14.9982678,39.1850405 14.9927611,38.2611881 15.0126246,37.3386997 C15.0409449,36.0153752 16.0494618,35.0139667 17.3344947,35.0005211 C18.6445046,34.9866857 19.6555781,36.0073857 19.7191021,37.3614989 C19.7918695,38.9091124 19.7135954,40.4929707 20.0253152,41.9951808 C21.0049217,46.7157723 25.2938716,50.1085574 30.1627974,50.1541557 C31.9711656,50.1711089 33.7838606,50.2718538 35.5646952,49.758386 C40.0794207,48.4566914 43.2062556,44.4249457 43.2597495,39.7696338 C43.2695829,38.9194402 43.2367392,38.0680774 43.2727296,37.2194427 C43.3252401,35.9834174 44.336117,35.0262432 45.562936,35.0005211 Z M31.5188308,8 C36.7360472,8.00688349 40.9598952,12.1911398 40.9890361,17.4089388 C41.0086616,20.959949 40.9928026,24.5111556 40.9924061,28.0621658 C40.9924061,31.5888204 41.0124281,35.115475 40.9874502,38.6417368 C40.9537498,43.4097424 37.4556496,47.2394673 32.5540274,47.919657 C28.1519639,48.5305116 23.6799225,45.5968378 22.4090214,41.204773 C22.1606298,40.346041 22.0280088,39.4244557 22.0240441,38.530958 C21.9935155,31.5023973 21.9954979,24.4736401 22.0109604,17.4450794 C22.0224582,12.1921219 26.2667246,7.99293793 31.5188308,8 Z M33.2371188,-1.94124377e-05 L34.0239618,0.137958983 L34.0239618,0.137958983 L35.6015656,0.399173107 C36.3893412,0.533628505 37.1732447,0.682618965 37.9427803,0.885576003 C47.2952677,3.35153799 54.4003217,11.3989641 55.7048306,20.9741491 C55.8774404,22.2406165 55.9051047,23.5278553 55.9721225,24.8069408 C56.006021,25.4555104 55.977967,26.10738 55.977967,26.6330688 C57.0438225,26.7747796 58.0847412,26.7604144 59.0185093,27.0684898 C61.1114513,27.7587961 62.570257,29.2485066 62.8032607,31.4384237 C63.0395763,33.6595949 63.0824365,35.9485154 62.824496,38.1632804 C62.4705096,41.2026858 59.6458269,43.2413801 56.6374298,42.9769827 C53.6323446,42.7129735 51.3352322,40.2291521 51.3198415,37.1664518 C51.2984114,32.9304637 51.3288032,28.6942815 51.3104902,24.4582934 C51.2703574,15.1576003 45.0747192,7.36040053 35.9994594,5.16465968 C24.9933471,2.50185558 13.6998765,9.99214473 11.9537126,21.1370194 C11.7709722,22.3033187 11.6840829,23.4950483 11.6747316,24.676101 C11.6412227,28.863558 11.6858363,33.0515973 11.6517429,37.2390543 C11.6246631,40.5696462 8.86582928,43.128982 5.53617541,42.986883 C3.01716397,42.8795322 0.814928449,41.0766991 0.171830479,38.5988955 C0.124294609,38.4158363 0.0576664645,38.2378242 0,38.0572885 L0,31.6659375 L0,31.6659375 C0.0526011669,31.5094732 0.113189918,31.3551444 0.156829405,31.1961565 C0.756872346,29.0136161 2.12859389,27.5450652 4.31991954,26.9539564 C5.15725219,26.7281898 6.06666792,26.767597 6.99751376,26.6812117 C6.99751376,26.1887181 6.96342041,25.6323577 7.00394279,25.0816268 C7.13077005,23.3480961 7.16934423,21.5978707 7.44929933,19.8878291 C8.93576935,10.8064965 16.5685883,2.76935897 25.5945589,0.73202362 C26.9612152,0.423559982 28.3565098,0.240888942 29.7385568,-1.94124377e-05 L33.2371188,-1.94124377e-05 Z"></path>
																</g>`}),
			]),
			h('div', {class: 'item--footer'}, [
				h('div', {class: 'item--content', innerHTML: item.content}),
				h('div', {class: 'item--soon' }, [
					h('div', {}, [
						!Number(item.active) ? h('span', {innerText: 'Próximamente'}) : '',
					]),
					h(CtaIndicator)
				])
			])
		]
	))
}
</script>


<template>
<section id="carousel">
	<div class="container global">
		<div class="title">{{ title }}</div>

		<div class="px-6 hidden justify-end gap-x-10 md:flex md:mt-4 lg:mt-10">
			<button class="podcast-prev">
				<i class="ri-arrow-left-s-line"></i>
			</button>
			<button class="podcast-next">
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
			class="item"
			:class="{'opacity-50': !Number(item.active)}">
			<carouselItem :item="item"/>
		</swiper-slide>

		<swiper-slide class="hidden md:block"></swiper-slide>

	</Swiper>
</section>
</template>


<style lang="scss" scoped>
#carousel{
	@apply px-6 pb-20 sm:px-0 md:pb-28;

	@media (min-width: 480px){
		@apply px-0;
	}
}

.title{
	@apply text-brand-pink text-xl leading-none text-center font-bold md:text-2xl;
}


.swiper-slide.item{
	@apply bg-brand-blue text-white
						text-left min-w-[240px] relative select-none
						rounded-2xl
						lg:min-w-[280px];
	background-image: url('../../img/home/carousel-item-bg.svg');
	background-repeat: no-repeat;
	background-size: 230px auto;
	background-position: 65px -40px;

	&::after{
		content: '';
		@apply left-10 bottom-[-17px] absolute;
		border-top: solid 17px #005faf;
		border-right: solid 38px transparent;
	}
}

#carousel :deep(.item--body){
	@apply leading-tight h-56 px-5 py-5 grid;
}

#carousel :deep(.item--header){
	@apply pr-12 relative;
}

#carousel :deep(.item--header svg){
	@apply fill-white w-9 right-0 top-0 absolute opacity-50;
}

#carousel :deep(.item--title){
	@apply text-xl leading-none font-bold mt-0.5;
}

#carousel :deep(.item--footer){
	@apply grid;
}

#carousel :deep(.item--content){
	@apply text-sm leading-tight;
}

#carousel :deep(.item--soon){
	@apply text-sm leading-none self-end
					flex items-center justify-between;

	.indicator{
		@apply justify-self-end;
	}
}

.podcast-prev,
.podcast-next{
	@apply bg-brand-blue text-white
						text-lg leading-none w-7 h-7
						grid place-content-center
						transition-all rounded-full
						hover:opacity-80;
}
</style>


<style>
.swiper-wrapper{
	padding-bottom: 20px;
}
</style>
