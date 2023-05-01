<script setup>
import PageLayout from '@/Layouts/PageLayout.vue'
import Intro from '@/Components/Pages/Intro.vue'
import Podcasts from '@/Components/Media/Podcasts.vue'
import BannerFooter from '@/Components/Pages/BannerFooter.vue'
</script>


<template>
<PageLayout>

	<Intro :data="$page.props.intro" />


	<section id="team">
		<div class="max-w-sm mx-auto md:max-w-2xl">

			<div 
				v-for="(person, i) in $page.props.list"
				:key="person.id"
				class="grid gap-y-6 place-items-center 
								relative
								md:grid-cols-12 md:gap-x-12"
				:class="{ 'mt-12 md:mt-24': i }, i % 2 ? 'even' : 'odd'">
				
				<div class="-mt-[550px] absolute md:-mt-[500px]" :id="person.ref"/>

				<div 
					class="md:col-span-6"
					:class="{'md:order-2': i % 2}">
					<img 
						:src="`img/team/${person.picture}`" 
						:alt="person.name"
						class="w-60 object-cover md:w-full" />
				</div>

				<div class="md:col-span-6">
					<h3>{{ person.name }}</h3>
					<div class="description" v-html="person.description"></div>
					<div class="position" v-html="person.position"></div>
				</div>

			</div>

		</div>
	</section>


	<BannerFooter :data="$page.props.banner_footer" />
	<Podcasts :data="$page.props.podcasts" />

</PageLayout>
</template>


<style lang="scss" scoped>
#team{
	@apply px-6 pb-24 xl:px-0 xl:pb-32;
}

h3{
	@apply text-brand-blue text-xl font-bold leading-none;
}

.description{
	@apply text-xs font-extrabold mt-6;
}

.position{
	@apply mt-6;
}

.odd::before{
	content: '';
	background: url('../../img/team/baloon-left.svg') no-repeat center / cover;
	width: 70vw;
	height: 60vw;
	max-width: 400px;
	max-height: 350px;
	top: 0;
	left: -8vw;
	position: absolute;
	z-index: -1;

	@media(min-width: 768px){
		width: 500px;
		height: 440px;
		max-width: 100vw;
		max-height: 100vh;
		top: -50px;
		left: -160px;
	}

	@media(min-width: 1024px){
		width: 700px;
		height: 610px;
		top: -80px;
		left: -330px;
	}
}


.even::before{
	content: '';
	background: url('../../img/team/baloon-right.svg') no-repeat center / cover;
	width: 70vw;
	height: 60vw;
	max-width: 400px;
	max-height: 350px;
	top: 0;
	left: 8vw;
	position: absolute;
	z-index: -1;

	@media(min-width: 768px){
		width: 500px;
    height: 440px;
    max-width: 100vw;
    max-height: 100vh;
    top: -30px;
    left: 360px;
	}

	@media(min-width: 1024px){
		width: 700px;
		height: 610px;
		top: -110px;
		left: 310px;
	}
}
</style>

<style>
#mainLayout{
	overflow: hidden;
}
</style>