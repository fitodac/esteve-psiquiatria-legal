<script setup>
const { 
	data, 
	containerMaxWidth,
	titleBold,
	introBold
} = defineProps({
	data: Object,
	containerMaxWidth: Number,
	titleBold: Boolean,
	introBold: Boolean,
})

const {
	title,
	intro,
	content
} = data


let maxWContainer = ''

switch(containerMaxWidth){
	case 2: maxWContainer = 'max-w-2xl'; break;
	case 3: maxWContainer = 'max-w-3xl'; break;
	case 4: maxWContainer = 'max-w-4xl'; break;
	case 5: maxWContainer = 'max-w-5xl'; break;
	case 6: maxWContainer = 'max-w-6xl'; break;
}
</script>


<template>
<section 
	id="intro"
	class="px-6 py-10 lg:pt-16 lg:pb-20">
	<div class="container global">

		<div :class="[maxWContainer, 'mx-auto']">
			<h2
				class="text-brand-blue text-2xl leading-tight 
							text-center md:text-3xl"
				:class="{'font-bold': titleBold}">{{ title }}</h2>
			
			<div 
				class="text-brand-pink text-lg text-center leading-tight mt-6"
				:class="{'font-bold': introBold}" 
				v-html="intro" />
			
			<slot name="button" />
			
			<div class="content" v-html="content" />
		</div>

	</div>
</section>
</template>


<style lang="scss" scoped>
.content{
	@apply text-center mt-6;
}
</style>