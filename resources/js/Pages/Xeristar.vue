<script setup>
import { h } from 'vue'
import PageLayout from '@/Layouts/PageLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

const store = useStore()
const { scroll } = storeToRefs(store)

defineProps([
	'sections',
	'breadcrumbs',
	'summary',
	'adherence',
	'life_quality',
	'tolerability',
	'dosage',
	'posology',
	'references'
])

const sectionTitle = data => (
	h('div', {class: `section-title`}, [
		h('div', {class: 'container global', innerHTML: data.title})
	])
)
</script>


<template>
<PageLayout>
<div id="productXeristar">

	<!-- MENU -->
	<section class="menu" :class="scroll">
		<div class="container global">
			<nav class="py-2 flex justify-center gap-x-10">
				<Link 
					v-for="(item, key) in sections"
					:key="item.id"
					:href="`#${key}`"
					@click="() => {
						'resumen' === key ? store.setScroll(false) : null
					}"
					class="text-sm font-medium">
					{{ item.text }}
				</Link>
			</nav>
		</div>
	</section>



	<!-- INTRO -->
	<section class="intro bg-xeristar-pink text-white px-6 pb-10 relative 
									md:py-10 md:mt-8 
									xl:px-0">
		<div class="container global">

			<div class="grid gap-y-8 md:grid-cols-12">

				<div class="md:col-span-6 md:order-2 lg:col-span-4">
					<div 
						class="bg-white w-48 px-8 py-3 mx-auto rounded-b-xl 
									md:-mt-10">
						<img 
							src="/img/xeristar/logo.webp" 
							alt="Xeristar&reg;"
							class="w-full" />
					</div>

					<img 
						:src="`/img/xeristar/${summary.intro_image}`" 
						alt="Nuevos productos Xeristar&reg;"
						class="w-full max-w-[360px] mx-auto mt-8">
				</div>
				
				<div class="md:col-span-6 lg:col-span-8">
					<div class="breadcrumbs">
						<span 
							v-for="item in breadcrumbs"
							:key="item.id">
							{{ item.text }}
						</span>
					</div>

					<h2 
						v-html="summary.title" 
						class="text-xl leading-tight mt-4 
										sm:text-2xl sm:leading-tight 
										md:text-3xl md:leading-none"/>
					
					<h3 
						v-html="summary.content" 
						class="leading-tight mt-3 md:mt-5" />

				</div>

			</div>
		</div>
	</section>



	<!-- HERO -->
	<section class="hero">
		<div class="container global">
			<div class="grid md:grid-cols-12">
				<div class="md:col-span-8 lg:col-span-6">
					
					<h4 class="marker-xl" v-html="summary.cards.title" />

					<div class="grid gap-5 justify-center mt-7 sm:grid-cols-2">
						<div 
							v-for="card in summary.cards.blocks"
							:key="card.id"
							class="">
							<Link :href="`#${card.hash}`" class="card">
								<div class="card-icon">
									<img :src="`/img/xeristar/${card.icon}`" :alt="card.icon">
								</div>
								<div class="card-content" v-html="card.content"/>
							</Link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- INTRO LIST -->
	<section 
		class="bg-xeristar-blue text-white px-6 py-14 
					lg:py-16 xl:px-0">
		<div class="">
			<div class="flex justify-center">
				<img 
					src="img/xeristar/logo-white.webp" 
					alt="Xeristar&reg;"
					class="w-36">
			</div>

			<div class="max-w-3xl mx-auto grid gap-y-8 mt-12 md:mt-16">
				<div 
					v-for="(item, i) in summary.list"
					:key="item.id"
					class="font-semibold leading-tight 
									lg:text-xl lg:leading-tight"
					:class="{'border-t-2 border-xeristar-pink border-dashed pt-6': i}">
					<div class="marker-lg">
						<div v-html="item.title" />
					</div>

					<div 
						v-if="item.blocks" 
						class="pl-10 mt-6 grid gap-5 sm:grid-cols-2 md:gap-10">
						<div 
							v-for="block in item.blocks" 
							:key="block.id"
							class="font-normal flex gap-x-6">
							<div 
								v-if="block.icon"
								class="w-16 h-16 p-4 grid place-content-center rounded-full
											md:w-20 md:h-20"
								:class="`bg-xeristar-${block.color}`">
								<img 
									:src="`img/xeristar/${block.icon}`" 
									alt="icono"
									class="w-full">
							</div>

							<div 
								v-html="block.content"
								class="flex-1 pt-2" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




	<!-- ADHERENCIA -->
	<section class="relative">
		<div id="adherencia" class="-top-36 absolute"></div>

		<section-title :title="sections.adherencia.title" />

		<div class="px-6 pt-12 pb-20 xl:px-0">
			<div class="max-w-3xl mx-auto">
				
				<div class="pb-20 flex justify-center items-center gap-x-6">
					<div class="bg-xeristar-blue w-20 h-20 p-6 
											grid place-content-center rounded-full">
						<img 
							:src="`img/xeristar/${adherence.icon1}`" 
							alt="icono"
							class="w-full" />
					</div>

					<h3 
						v-html="adherence.title"
						class="text-xl leading-tight flex-1 
									md:text-2xl md:flex-none" />
				</div>


				<div class="bg-[#FDF0F2] px-10 py-8 rounded-xl">
					<img 
						:src="`img/xeristar/${adherence.image}`" 
						alt="Productos"
						class="w-full max-w-md mx-auto -mt-24
										md:max-w-lg lg:max-w-xl">
					
					<div 
						v-html="adherence.content"
						class="text-xs leading-tight" />
				</div>


				<div class="bg-xeristar-blue px-10 py-12 mt-4 rounded-2xl">
					<div class="grid gap-5 md:items-center sm:flex">
						<div class="bg-xeristar-pink w-20 h-20 p-4 
											grid place-content-center rounded-full">
							<img 
								:src="`img/xeristar/${adherence.icon2}`" 
								alt="icono"
								class="w-full" />
						</div>

						<div class="text-white flex-1">
							<h3 
								v-html="adherence.block.title" 
								class="text-xl font-bold leading-none"/>

							<small 
								v-html="adherence.block.info"
								class="text-xs leading-tight block mt-3" />
						</div>

					</div>
				</div>

				<div 
					v-html="adherence.footer"
					class="text-xs text-center mt-3" />

			</div>
		</div>
	</section>




	<!-- CALIDAD DE VIDA -->
	<section class="relative">
		<div id="calidad-de-vida" class="-top-36 absolute"></div>

		<section-title :title="sections['calidad-de-vida'].title" />

		<div class="px-6 py-14 xl:px-0">
			<div class="max-w-3xl mx-auto">
				<div class="grid gap-10 sm:flex sm:items-center">
					<div class="">
						<img 
							:src="`img/xeristar/${life_quality.image}`" 
							alt="Imagen de calidad de vida"
							class="w-full max-w-[220px] mx-auto
											sm:max-w-md sm:mx-0">
					</div>

					<div class="">
						<h4 class="marker-xl text-xeristar-blue text-xl font-bold leading-tight
											sm:text-2xl">
							{{ life_quality.title }}
						</h4>
						<div class="mt-3 flex gap-x-4 sm:gap-x-6">
							<div class="bg-xeristar-pink w-16 h-16 p-3 grid place-content-center rounded-full
													sm:w-20 sm:h-20">
								<img :src="`img/xeristar/${life_quality.icon}`" alt="Icono de manos y corazón" class="w-full">
							</div>
							
							<div 
								v-html="life_quality.content"
								class="flex-1" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- TOLERABILIDAD -->
	<section class="relative">
		<div id="tolerabilidad" class="-top-36 absolute"></div>
		<section-title :title="sections.tolerabilidad.title" />

		<div class="px-6 py-20 xl:px-0">
			<div class="max-w-3xl mx-auto">
				<h4 class="marker-xl text-xeristar-blue text-xl font-bold leading-tight
									sm:text-2xl">
					{{ tolerability.title }}
				</h4>

				<div class="mt-8 grid gap-y-7">
					<div 
						v-for="(item, i) in tolerability.list"
						:key="item.id"
						class="grid gap-y-2 sm:flex sm:gap-x-6"
						:class="{'border-xeristar-pink border-t-2 border-dashed pt-7' : i}">

						<div 
							class="bg-xeristar-pink w-16 h-16 p-4 grid place-content-center rounded-full
											sm:w-16 sm:h-16 
											md:w-20 md:h-20">
								<img 
									:src="`img/xeristar/${item.icon}`" 
									alt="Icono de manos y corazón" 
									class="w-full">
							</div>

						<div v-html="item.text" class="leading-tight flex-1 sm:pt-2 md:pt-3" />

					</div>
				</div>
			</div>
		</div>


		<div class="beach px-6 py-10 md:py-14 xl:px-0">
			<div class="max-w-3xl mx-auto">
				<div 
					class="bg-xeristar-blue text-white px-10 py-8 mt-4 rounded-2xl
								md:px-20">
					
					<h4 class="text-center leading-tight ">{{ tolerability.banner.title }}</h4>
					
					<div class="grid gap-5 mt-5 sm:mt-4 sm:flex">
						<div class="bg-xeristar-pink w-20 h-20 p-5 
											grid place-content-center rounded-full
											sm:w-16 sm:h-16 
											md:w-20 md:h-20 md:p-5">
							<img 
								:src="`img/xeristar/${ tolerability.banner.icon }`" 
								alt="icono"
								class="w-full" />
						</div>

						<div class="text-lg leading-tight flex-1 md:text-xl md:leading-tight" v-html="tolerability.banner.content" />
					</div>
				</div>
			</div>
		</div>
	</section>





	<!-- DOSIFICACIÓN -->
	<section class="relative">
		<div id="indicaciones-dosificacion" class="-top-36 absolute"></div>
		<section-title :title="sections['indicaciones-dosificacion'].title" />

		<div class="px-6 py-14 xl:px-0 lg:py-20">
			<div class="max-w-3xl mx-auto">
				<h4 
					v-html="dosage.section1.title"
					class="marker-xl text-xeristar-blue text-xl font-bold leading-tight
									sm:text-2xl" />

				<div class="mt-10 grid gap-y-7 md:gap-y-10">
					<div
						v-for="(item, i) in dosage.section1.list"
						:key="item.id"
						class="grid gap-y-2 sm:flex sm:gap-x-6"
						:class="{'border-xeristar-pink border-t-2 border-dashed pt-7 md:pt-10': i}">

						<div 
							class="w-16 h-16 p-4 grid place-content-center rounded-full
											sm:w-20 sm:h-20 
											md:w-24 md:h-24 md:p-7"
							:class="`bg-xeristar-${item.color}`">
								<img 
									:src="`img/xeristar/${item.icon}`" 
									alt="Icono de manos y corazón" 
									class="w-full">
							</div>

						<div class="flex-1 md:pt-3">
							<div 
								v-html="item.title"
								class="text-lg font-bold leading-none
												sm:text-xl sm:leading-none"
								:class="`text-xeristar-${item.color}`" />
							<div v-html="item.content" class="leading-tight flex-1 sm:pt-2 md:pt-3" />
						</div>

					</div>
				</div>


				<div class="mt-20">
					<h4 
						v-html="dosage.section2.title"
						class="marker-xl text-xeristar-blue text-xl font-bold leading-tight
										sm:text-2xl" />

					<div class="mt-8 md:pl-12">
						<div 
							v-html="dosage.section2.intro"
							class="text-center" />
						
						<div class="bg-white border p-8 mt-6 flex justify-center rounded-3xl">
							<img 
								:src="`img/xeristar/${dosage.section2.image.src}`" 
								:alt="`Imagen de ${dosage.section2.image.caption}`"
								class="w-full max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl">
						</div>
						
						<div class="text-xs leading-tight text-center mt-4">{{ dosage.section2.image.caption }}</div>
					</div>


					<div class="bg-xeristar-blue px-10 py-12 mt-10 rounded-2xl 
											md:px-16 md:py-16 md:ml-12">
						<div class="grid items-center gap-5 sm:flex">
							<div class="bg-xeristar-pink w-20 h-20 p-5 
												grid place-content-center rounded-full">
								<img 
									:src="`img/xeristar/${dosage.banner.icon}`" 
									alt="icono"
									class="w-full" />
							</div>

							<div class="text-white flex-1">
								<div 
									v-html="dosage.banner.content" 
									class="text-xl font-bold leading-tight"/>
							</div>

						</div>
					</div>


				</div>
			</div>
		</div>
	</section>



	<!-- POSOLOGÍA -->
	<section class="relative">
		<div id="posologia" class="-top-36 absolute"></div>
		<section-title :title="sections.posologia.title" />

		<div class="px-6 pt-16 pb-20 xl:px-0">
			<div class="max-w-2xl mx-auto grid gap-10 sm:grid-cols-2">
				<div 
					v-for="card in posology.cards"
					:key="card.id"
					class="">

					<div 
						class="w-20 h-20 p-5 mx-auto
									grid place-content-center rounded-full
									md:w-24 md:h-24"
						:class="`bg-xeristar-${card.color}`">
						<img 
							:src="`img/xeristar/${card.icon}`" 
							alt="icono"
							class="w-full" />
					</div>

					<div 
						v-html="card.title"
						class="marker-lg text-lg font-bold leading-tight 
									text-center max-w-xs mx-auto mt-4 justify-center" />

				</div>
			</div>
		</div>


		<div class="bg-[#FDF1F3] px-6 py-12 xl:px-0">
			<div class="max-w-3xl mx-auto">
				<div 
					v-html="posology.presentations.intro"
					class="text-center" />
				
				<div 
					v-if="Object.keys(posology.presentations.products.new).length"
					class="max-w-xl mx-auto mt-10 grid gap-10 
									md:grid-cols-2 md:gap-7">
					<div 
						v-for="prod in posology.presentations.products.new"
						:key="prod.id"
						class="grid justify-center text-center gap-1">
						
						<div>
							<img 
								:src="`img/xeristar/${prod.image}`" 
								alt="Xeristar&reg;"
								class="h-40 mx-auto object-contain">
						</div>

						<h4 class="font-medium">{{ prod.title }}</h4>

						<div>
							<span 
								v-html="prod.label"
								class="text-white text-xs font-medium leading-none 
												px-3 py-1 rounded-lg select-none"
								:class="`bg-xeristar-${prod.color}`" />
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="bg-white pt-14">
			<div 
				v-if="Object.keys(posology.presentations.products.regular).length"
				class="max-w-3xl mx-auto grid gap-10 
								md:grid-cols-3 md:gap-7">
				<div 
					v-for="prod in posology.presentations.products.regular"
					:key="prod.id"
					class="grid justify-center text-center gap-1">
					
					<div>
						<img 
							:src="`img/xeristar/${prod.image}`" 
							alt="Xeristar&reg;"
							class="h-40 mx-auto object-contain">
					</div>

					<h4 class="font-medium">{{ prod.title }}</h4>

					<div>
						<span 
							v-html="prod.label"
							class="text-white text-xs font-medium leading-none 
											px-3 py-1 rounded-lg select-none"
							:class="`bg-xeristar-${prod.color}`" />
					</div>
				</div>
			</div>


			<div class="flex justify-center px-6 py-20 xl:px-0">
				<img 
					src="img/xeristar/logo.webp" 
					alt="Xeristar&reg;"
					class="w-5/12 max-w-xs sm:w-36">
			</div>
		</div>

	</section>




	<!-- REFERENCIAS -->
	<section class="bg-[#F5F5F5] px-6 py-14 xl:px-0">
		<div class="container global">
			<h4 class="font-bold leading-none">REFERENCIAS</h4>

			<div class="text-xs leading-tight mt-4">
				<div 
					v-for="(item, i) in references"
					:key="`ref-${i}`"
					:class="{'mt-1': i}">
					<div class="flex gap-x-1">
						<span class="font-bold">{{ i }}.</span>
						<div v-html="item" />
					</div>
				</div>
			</div>
		</div>
	</section>


</div>
</PageLayout>
</template>


<style lang="scss" scoped>
$pink: #ED6F82;
$blue: #005DA9;
$green: #008E36;
$yellow: #E09D18;
$red: #C5374D;

.bg-xeristar-white{ background: #FFF; }
.border-xeristar-white{ border-color: #FFF; }

.bg-xeristar-blue{ background: $blue; }
.text-xeristar-blue{ color: $blue; }
.border-xeristar-blue{ border-color: $blue; }

.bg-xeristar-pink{ background: $pink; }
.text-xeristar-pink{ color: $pink; }
.border-xeristar-pink{ border-color: $pink; }

.bg-xeristar-green{ background: $green; }
.text-xeristar-green{ color: $green; }
.border-xeristar-green{ border-color: $green; }

.bg-xeristar-yellow{ background: $yellow; }
.bg-xeristar-red{ background: $red; }


[class^=marker]{
	@apply flex flex-row flex-nowrap gap-x-4;
}

[class^=marker]::before{
	content: '';
	background: url('../../img/xeristar/icon-marker.svg') no-repeat center / cover;
	@apply inline-block relative;
}

.marker-lg::before{
	@apply h-6 top-0.5;
	flex: 1.5rem 0 0;
}

.marker-xl::before{
	@apply h-6 top-1;
	flex: 1.7rem 0 0;
}

.section-title{
	background: $pink;
	@apply text-white text-xl leading-tight 
					px-6 py-10 select-none 
					md:text-2xl md:leading-tight xl:px-0;
}


.beach{
	background: url('../../img/xeristar/beach.webp') no-repeat center bottom / cover;
}



.menu{
	@apply bg-white pt-10 hidden inset-x-0 fixed 
					pointer-events-none transition-all z-20
					md:block md:pointer-events-auto;
	top: 156px;

	&.affix{ top: 71px; }

	@media (min-width: 1024px){
		top: 166px;
	}
}


.intro{
	
	&::after{
		content: '';
		background: url('../../img/xeristar/intro-bg.webp') no-repeat center top / 200% auto;
		box-shadow: 0 70px 100px $pink inset;
		@apply h-52 inset-x-0 bottom-0 absolute opacity-50;
	}

	> *{
		@apply relative z-10;
	}
}



.breadcrumbs{
	@apply text-xs leading-none 
					flex gap-x-1 select-none opacity-60;

	span + span::before{
		content: '/';
		@apply mr-1;
	}
}


.hero{
	background-image: url('../../img/xeristar/banner2-bg.webp');
	background-size: cover;
	@apply bg-no-repeat px-6 py-10 xl:px-0;

	@media(min-width: 768px){ background-position: calc(100% + 450px) bottom; }
	@media(min-width: 992px){ background-position: calc(100% + 350px) bottom; }
	@media(min-width: 1300px){ background-position: center bottom; }


	h4{
		color: $blue;
		@apply text-xl font-bold leading-tight select-none 
						md:text-2xl md:leading-tight;
	}


	.card{
		background: $blue;
		@apply text-white text-center max-w-xs h-full px-8 py-8 
						grid justify-center gap-y-4 rounded-2xl;
	}// card

	.card-icon{
		@apply w-12 mx-auto;

		svg{ @apply w-full; }
	}

	.card-content{
		@apply leading-tight select-none;

		sup{ @apply text-xs; }
	}// card-content
}





.intro-list--icon-blue{ background: $blue; }
.intro-list--icon-white{ background: #FFF; }
.intro-list--icon-pink{ background: $pink; }
.intro-list--icon-green{ background: $green; }

.intro-list--block-content{
	@apply mt-4;
}
</style>




<style lang="scss">
$pink: #ED6F82;
$blue: #005DA9;

.text-xeristar-blue{ color: $blue; }
.text-xeristar-pink{ color: $pink; }

h4 span{ color: $pink; }

.xeristar-list{
	li{
		@apply pl-4 relative;

		&::before{
			content: '•';
			@apply text-3xl leading-none left-0 -top-1.5 absolute;
		}
	}
}
</style>