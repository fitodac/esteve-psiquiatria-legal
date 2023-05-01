<script setup>
import PageLayout from '@/Layouts/PageLayout.vue'
import Cards from '@/Components/Home/Cards.vue'
import Podcasts from '@/Components/Media/Podcasts.vue'
import Videos from '@/Components/Media/Videos.vue'
import Team from '@/Components/Home/Team.vue'
import BtnCta from '@/Components/BtnCallToAction.vue'
import CtaIndicator from '@/Components/CtaIndicator.vue'
import { Link } from '@inertiajs/inertia-vue3'

import { useStore } from '@/store/mainStore.js'

const store = useStore()
</script>

<template>
<PageLayout>
	<section class="hero">
		<div class="container">
			<div v-html="$page.props.intro"/>
		</div>
	</section>

	<Cards :data="$page.props.cards"/>

	<Podcasts :data="$page.props.podcasts" />


	<section class="banner1">
		<div class="container global">
			<div class="grid items-center gap-y-1 sm:grid-cols-2">

				<div class="text-center relative z-10">
					<h3 
						class="banner1-title" 
						v-html="$page.props.banner1.title" />

					<div 
						class="banner1-content" 
						v-html="$page.props.banner1.content" />
				</div>

				<div class="flex justify-center">
					<div class="banner1-cta">
						<BtnCta 
							:link="$page.props.banner1.cta_link"
							className="relative z-10">
							{{ $page.props.banner1.cta_title }}
						</BtnCta>
					</div>
				</div>

			</div>
		</div>


		<svg viewBox="0 0 439 465">
			<path d="M213.737253,0 C351.187181,0 439,85.2530783 439,174.808055 C439,237.226886 403.415106,294.325323 320.242681,295.82529 L320.242681,382 C320.242681,382 318.982169,369.025931 297.524979,349.499303 C260.794942,316.078398 211.535274,317.021397 114.38612,264.051072 C29.5130718,217.775754 0,169.43638 0,120.592743 C0,71.7491069 58.1501947,0 213.737253,0 Z" id="Fill-1" opacity="0.354492188" style="mix-blend-mode: multiply;"></path>
			<path d="M182.841619,269 C112.317572,269 67.2617801,312.742417 67.2617801,358.692091 C67.2617801,390.718507 85.5199979,420.015087 128.194855,420.784704 L128.195849,464.990797 L128.195849,464.990797 L128.259305,464.618778 L128.259305,464.618778 L128.301761,464.425674 L128.301761,464.425674 L128.35869,464.194546 L128.35869,464.194546 L128.460495,463.828377 L128.460495,463.828377 L128.558808,463.51111 L128.558808,463.51111 L128.635894,463.279662 L128.635894,463.279662 L128.722892,463.032496 L128.722892,463.032496 L128.928943,462.491791 L128.928943,462.491791 L129.113813,462.046461 L129.113813,462.046461 L129.326854,461.567754 L129.326854,461.567754 L129.485499,461.2304 L129.485499,461.2304 L129.749843,460.697538 L129.749843,460.697538 L129.944501,460.324695 L129.944501,460.324695 L130.154579,459.938 L130.154579,459.938 L130.380657,459.537651 L130.380657,459.537651 L130.623315,459.123844 L130.623315,459.123844 L130.883132,458.696775 L130.883132,458.696775 L131.160688,458.256641 L131.160688,458.256641 L131.456563,457.803638 L131.456563,457.803638 L131.771336,457.337964 L131.771336,457.337964 L132.105589,456.859814 L132.105589,456.859814 L132.459899,456.369386 L132.459899,456.369386 L132.834848,455.866876 L132.834848,455.866876 L133.231014,455.352481 L133.231014,455.352481 L133.648979,454.826397 L133.648979,454.826397 L134.08932,454.28882 L134.08932,454.28882 L134.55262,453.739949 L134.55262,453.739949 L135.039456,453.179978 C135.122589,453.085736 135.206727,452.991039 135.291882,452.895892 L135.815111,452.319642 L135.815111,452.319642 L136.363326,451.732785 C136.45681,451.634102 136.551359,451.534986 136.646985,451.43544 L137.233768,450.83304 L137.233768,450.83304 L137.846987,450.220525 C137.951425,450.117607 138.056989,450.014275 138.163691,449.910535 L138.817651,449.283214 C139.151554,448.967132 139.495914,448.64744 139.851058,448.32425 C146.635538,442.151006 154.253193,438.262836 163.55049,434.5465 L165.115737,433.928339 C165.379252,433.825456 165.644099,433.722616 165.910297,433.619772 L167.523834,433.002308 L167.523834,433.002308 L169.170652,432.382591 L169.170652,432.382591 L170.851623,431.758446 L170.851623,431.758446 L172.567617,431.1277 L172.567617,431.1277 L180.746353,428.149357 L180.746353,428.149357 L182.670542,427.443441 L182.670542,427.443441 L185.633379,426.345013 L185.633379,426.345013 L187.660911,425.583188 L187.660911,425.583188 L189.731303,424.795194 L189.731303,424.795194 L191.845427,423.978857 C203.594969,419.407078 217.368359,413.450604 233.817593,404.481702 C277.365021,380.738345 292.507853,355.935944 292.507853,330.874811 C292.507853,305.813678 262.671628,269 182.841619,269 Z" id="Fill-1-Copy" opacity="0.154492" style="mix-blend-mode: multiply;"></path>
		</svg>
	</section>


	<Videos :data="$page.props.videos"/>

	<Team :data="$page.props.team" />


	<section class="banner2">
		<Link 
			:href="route($page.props.banner2.link)"
			@click="() => store.setScroll(false)"
			class="banner2-wrapper">
			<div class="container global">
				<div 
					class="banner2-title" 
					v-html="$page.props.banner2.title" />

				<div 
					class="banner2-cta" 
					v-html="$page.props.banner2.cta" />
			</div>

			<CtaIndicator/>
		</Link>
	</section>


</PageLayout>
</template>




<style lang="scss" scoped>
.hero{
	background: url('../../img/home/hero.webp') no-repeat center / cover;
	
	@apply text-white px-6 pt-12 pb-40
		lg:px-0 lg:pt-20;

	.container{
		@apply text-center max-w-4xl mx-auto;
	}

	p strong{ @apply font-bold; }

}


.banner1{
	@apply bg-brand-blue text-white 
						px-6 py-10 relative overflow-hidden;
}

.banner1-title{
	@apply text-xl font-bold leading-tight 
					md:text-2xl md:leading-tight
					lg:text-3xl lg:leading-tight;
}

.banner1-content{
	@apply leading-tight mt-6 
					md:text-lg md:leading-tight
					lg:text-xl lg:leading-tight;
}

.banner1-cta{
	background: url('../../img/home/banner1-cta-bg.webp') no-repeat center / cover;
	width: 220px;
	height: 200px;
	@apply grid place-items-center;

	@media (min-width: 768px){ width: 280px; height: 240px; position: relative; top: -10px; }
	@media (min-width: 992px){ width: 310px; height: 260px; }
}

.banner1 > svg{
	@apply w-[300px] -right-16 top-24 absolute 
					opacity-40
					sm:-right-16 sm:-top-24
					md:-top-16
					lg:w-[340px] lg:-right-12;
}



.banner2{
	background: 
		linear-gradient(180deg, rgba(237,111,130,1) 0%, rgba(237,111,130,0) 50%),
		url('../../img/home/banner2-bg-sm.webp') no-repeat center bottom / 100% auto;
	@apply text-white relative;

	@media (min-width: 600px){
		background: 
			linear-gradient(90deg, rgba(237,111,130,1) 0%, rgba(237,111,130,0) 90%),
			url('../../img/home/banner2-bg.webp') no-repeat center top / auto 100%;
	}

	@media (min-width: 1100px){
		background: 
			linear-gradient(90deg, rgba(237,111,130,1) 0%, rgba(237,111,130,0) 90%),
			url('../../img/home/banner2-bg.webp') no-repeat center top / cover;
	}
}

.banner2-wrapper{
	@apply px-6 pt-10 pb-[93vw] block;

	@media (min-width: 600px){ @apply pb-10; }
	@media (min-width: 1100px){ @apply py-32; }
}

.banner2 > .container.global{
	@apply max-w-3xl;
}

.banner2-title{
	@apply text-xl leading-tight max-w-sm
					sm:text-2xl sm:leading-tight;
}

.banner2-cta{
	@apply bg-brand-blue 
						text-lg font-bold leading-tight 
						max-w-[270px] px-8 py-5 mt-10 
						rounded-lg;
}

.banner2 .indicator{
	@apply right-10 bottom-10 absolute
					lg:right-16;
}
</style>