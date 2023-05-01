<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Intro from '@/Components/Pages/Intro.vue'
import PageLayout from '@/Layouts/PageLayout.vue'
import Podcasts from '@/Components/Media/Podcasts.vue'
import BannerFooter from '@/Components/Pages/BannerFooter.vue'


const icons = {
	icon1: `<svg viewBox="0 0 94 93">
						<g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
							<g id="04-Normativa-básica" transform="translate(-205.000000, -803.000000)" stroke="#005CA9" stroke-width="2">
								<g id="iconos-04" transform="translate(206.000000, 804.000000)">
									<path d="M53.9993561,24.3977915 C53.9993561,24.3977915 50.8507638,31.33886 44.09449,38.09449 C37.33886,44.8501199 30.3977915,48 30.3977915,48 L20.3029796,37.9051881 L14,31.6022085 C14,31.6022085 17.1370024,24.6733738 23.90551,17.9048662 C30.6733738,11.1370024 37.6022085,8 37.6022085,8 L43.9051881,14.3029796 L54,24.3977915 L53.9993561,24.3977915 Z" id="Path"></path>
									<path d="M18.0616739,27.8457256 L19.4790375,27.8457256 C21.7146594,27.8457256 23.5294813,29.6605475 23.5294813,31.8961694 L23.5294813,54.2355307 C23.5294813,56.4711526 21.7146594,58.2859745 19.4790375,58.2859745 L18.0623223,58.2859745 C15.8273488,58.2859745 14.0125269,56.4711526 14.0125269,54.2361791 L14.0125269,31.8948726 C14.0125269,29.6598991 15.8267004,27.8457256 18.0616739,27.8457256 Z" id="Path" transform="translate(18.771004, 43.065850) rotate(-44.993000) translate(-18.771004, -43.065850) "></path>
									<path d="M60.808865,22.8033299 L59.8030286,23.8091402 C58.2151741,25.3969533 55.640363,25.3969533 54.0525086,23.8091402 L38.1908908,7.94793549 C36.6030364,6.3601224 36.6030364,3.78537833 38.1908908,2.19691422 L39.1967273,1.19110396 C40.7852328,-0.397360142 43.3593928,-0.396709132 44.9472473,1.19110396 L60.808865,17.0523086 C62.3967195,18.6401217 62.3973705,21.2148658 60.808865,22.8026789 L60.808865,22.8033299 Z" id="Path"></path>
									<path d="M48.7998381,32 L50.86431,34.0643922 C52.1928328,35.3928638 52.3822459,37.3520305 51.2924626,38.4424295 L50.9787471,38.7561329 L50.1882102,39.5466392 L45.5469303,44.1883978 L44.7570512,44.9782465 L44.4433356,45.2919499 C43.3528946,46.3823489 41.3929946,46.192943 40.0644718,44.8644715 L38,42.8000793" id="Path"></path>
									<path d="M72.8614378,60 L90.5495215,76.5524398 C92.4823254,78.4853298 92.4842352,81.6176812 90.5507948,83.5505712 C88.6186275,85.4828246 85.4845059,85.4834612 83.551702,83.5505712 L67,65.8623357" id="Path"></path>
									<line x1="46" y1="44" x2="62" y2="61" id="Path"></line>
									<line x1="68" y1="56" x2="51" y2="40" id="Path"></line>
									<path d="M73.2263735,59.0062688 L66.0061772,66.2265972 C64.9743582,67.2578009 63.3026465,67.2578009 62.2714617,66.2265972 L61.7736265,65.7287529 C60.7424416,64.6975492 60.7418074,63.0251727 61.7736265,61.993969 L68.9938228,54.7736406 C70.0250076,53.7418027 71.6973535,53.7424369 72.7285383,54.7736406 L73.2263735,55.271485 C74.2575584,56.3026886 74.2581926,57.9744309 73.2263735,59.0056346 L73.2263735,59.0062688 Z" id="Path"></path>
									<rect id="Rectangle" x="0" y="83" width="32" height="8"></rect>
									<path d="M4,83 L4,79.2360122 C4,76.8948796 5.78480302,75 7.98423148,75 L25.0157685,75 C27.215197,75 29,76.8948796 29,79.2360122 L29,83" id="Path"></path>
								</g>
							</g>
						</g>
					</svg>`,

	icon2: `<svg viewBox="0 0 85 93">
						<g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
							<g id="04-Normativa-básica" transform="translate(-779.000000, -807.000000)" stroke="#005CA9" stroke-width="2">
								<g id="iconos-05" transform="translate(779.925432, 807.698625)">
									<polyline id="Path" points="54.0745684 8.30137498 54.0745684 23.301375 69.0745684 23.301375"></polyline>
									<polyline id="Path" points="69.0745684 63.7401239 69.0745684 23.2042855 54.2000778 8.30137498 9.07456841 8.30137498 9.07456841 83.301375 61.7020287 83.301375"></polyline>
									<polyline id="Path" points="8.80839166 75.301375 0.0745684129 75.301375 0.0745684129 0.301374981 60.0745684 0.301374981 60.0745684 15.2036339"></polyline>
									<path d="M55.3634652,36.0122815 C62.9782695,43.6276833 62.9782695,55.9744219 55.3634652,63.5898236 C47.7480162,71.2052254 35.4012012,71.2052254 27.786397,63.5898236 C20.1703032,55.9750666 20.170948,43.6276833 27.786397,36.0129263 C35.401846,28.3975245 47.748661,28.3975245 55.36411,36.0129263 L55.3634652,36.0122815 Z" id="Path"></path>
									<path d="M50.2671933,41.108925 C55.3436935,46.1859881 55.3436935,54.4171741 50.2671933,59.4935777 C45.1900336,64.5706407 36.9593505,64.5706407 31.8821909,59.4935777 C26.8056907,54.4171741 26.8050312,46.1859881 31.8821909,41.108925 C36.958691,36.0325214 45.1900336,36.0318619 50.2678527,41.108925 L50.2671933,41.108925 Z" id="Path"></path>
									<polyline id="Path" points="58.1686641 61.301375 67.0745684 70.2075112 61.98111 75.301375 53.0745684 66.3952388"></polyline>
									<path d="M67.7007308,68.301375 L81.4939285,82.0953681 C83.600474,84.2012865 83.6017728,87.6169914 81.4958766,89.7229099 C79.3893311,91.8288283 75.9743117,91.8268802 73.8684155,89.7209617 L60.0745684,75.927618 L67.7000814,68.3020244 L67.7007308,68.301375 Z" id="Path"></path>
								</g>
							</g>
						</g>
					</svg>`
}
</script>


<template>
	<PageLayout>

		<Intro 
			:data="$page.props.intro"
			:titleBold="true">
			<template v-slot:button>
				<div class="text-center my-10">
					<span 
						class="border border-brand-pink text-brand-pink 
										font-bold px-10 py-3 select-none
										rounded-full transition-all">
						LA PSIQUIATRÍA Y EL DERECHO
					</span>
				</div>
			</template>
		</Intro>



		<section id="cards">
			<div class="container global">
				<div class="max-w-3xl mx-auto grid gap-y-12 
										md:grid-cols-2 md:gap-x-10">

					<div 
						v-for="block in $page.props.lists"
						:key="block.id"
						class="card">

						<div class="card-header">
							<div class="card-icon" v-html="icons[block.image]" />
							<h4>{{ block.title }}</h4>
						</div>

						<div class="mt-8">
							<ul 
								v-for="item in block.list"
								:key="item.id"
								class="list">
								<li>
									<div class="" v-html="item.content" />
									<ul v-if="item.ul">
										<li 
											v-for="(el, i) in item.ul"
											:key="i">
											{{ el }}
										</li>
									</ul>
								</li>
							</ul>
						</div>

					</div>

				</div>
			</div>
		</section>



		<section id="content">
			<div class="container global">

				<h3 
					class="content-title">
					{{ $page.props.page_content.title }}
				</h3>


				<div class="list">
					<div 
						v-for="item in $page.props.page_content.list"
						:key="item.id"
						class="list-item">
						<div class="text-lg font-semibold leading-tight">{{ item.title }}</div>
						<div class="list-item-content">{{ item.description }}</div>
						<div class="mt-4">
							<a 
								class="list-item-btn"
								:href="item.button.link"
								target="_blank">

								<svg viewBox="0 0 21 21">
									<defs>
											<polygon id="path-7l2sf9z7mw-1" points="0 0 10 0 10 10 0 10"></polygon>
									</defs>
									<g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="04-Normativa-básica" transform="translate(-292.000000, -2137.000000)">
											<g id="Group-4" transform="translate(292.000000, 2137.000000)">
												<g id="Group" fill="#FFFFFF">
													<circle id="Oval" cx="10.5" cy="10.5" r="10.5"></circle>
												</g>
												<g id="Group-6" transform="translate(3.000000, 5.000000)">
													<g id="Group-3" transform="translate(0.000000, 1.000000)">
														<mask id="mask-7l2sf9z7mw-2" fill="white">
															<use xlink:href="#path-7l2sf9z7mw-1"></use>
														</mask>
														<g id="Clip-2"></g>
														<path d="M0.000768371487,6.08485906 C0.00146689102,5.06544173 0.315102162,4.29930878 0.948659379,3.66574893 C1.811331,2.8026283 2.68098782,1.94788071 3.53597573,1.07708479 C4.60261506,-0.00931684407 5.86833245,-0.265392246 7.25559225,0.270482164 C8.54645634,0.769375658 9.48247252,1.68273451 9.86735678,3.04405089 C10.2222047,4.29930878 9.85687899,5.36896434 8.86987089,6.22092092 C8.57300009,6.47629857 8.12594759,6.44350417 7.85142941,6.1602164 C7.58319791,5.88251065 7.56713196,5.44920595 7.81720195,5.15475413 C7.85422349,5.11079568 7.89334058,5.06753499 7.93664879,5.03055407 C8.65682243,4.42211333 8.59186011,3.45991176 8.13991798,2.83123618 C7.82209159,2.38816294 7.43790585,2.00649197 6.94055994,1.76227837 C6.3992073,1.49643443 5.84109019,1.44200968 5.26900269,1.66389518 C5.05665276,1.74623005 4.87853027,1.8795009 4.71787078,2.04068187 C3.85240508,2.90798902 3.00160829,3.7913445 2.1116944,4.63353253 C1.46276976,5.2475553 1.36218294,6.13300403 1.71563383,6.88029764 C2.00901203,7.50060018 2.472829,7.97856108 3.08054099,8.29813201 C3.66031221,8.60165463 4.47199191,8.56746472 4.97841857,7.98623636 C5.2047389,7.72667219 5.47436744,7.57805078 5.834105,7.67852723 C6.33564202,7.81807785 6.56266087,8.43838039 6.23505521,8.84237946 C5.61127726,9.60990791 4.80309016,10.027862 3.80141315,9.99855641 C2.99881421,9.97553056 2.28143465,9.69154503 1.66883302,9.1724167 C0.987077953,8.5946771 0.426865287,7.92553184 0.16701602,7.04706064 C0.0622380904,6.69190429 -0.00831238245,6.33256142 0.000768371487,6.08485906" id="Fill-1" fill="#ED6F81" mask="url(#mask-7l2sf9z7mw-2)"></path>
													</g>
													<path d="M11.1256637,0.000376490502 C11.750822,-0.00870821264 12.3396583,0.154816444 12.8600415,0.49304693 C13.9217629,1.18278555 14.6977974,2.10034056 14.9331923,3.38268135 C15.1385515,4.50009984 14.8766137,5.49801954 14.0621616,6.31983576 C13.1946234,7.19476256 12.3005423,8.04453171 11.4546576,8.93972438 C10.4411328,10.0124182 8.9519288,10.2870557 7.61849053,9.69095945 C6.33953533,9.11932198 5.40703659,8.19058579 5.08572616,6.78036033 C4.81261229,5.58187834 5.20097881,4.57836805 6.12369854,3.78031182 C6.42824494,3.51685543 6.88436605,3.55319424 7.15468591,3.84390474 C7.42360877,4.1332176 7.42640277,4.56718688 7.16097242,4.86418679 C7.12674587,4.90262207 7.09112233,4.94105735 7.05270477,4.9752997 C6.3933199,5.55532305 6.38912889,6.40369456 6.75933438,7.00258614 C7.21196299,7.73355534 7.81546779,8.30099987 8.70605647,8.44845159 C9.30117927,8.54698568 9.84042198,8.40722102 10.2783821,7.97185409 C11.1556992,7.09832494 12.0246344,6.21710873 12.9061426,5.3470737 C13.4691343,4.79150916 13.616518,4.1332176 13.3853142,3.39875429 C13.1373464,2.61187923 12.5953096,2.04932646 11.8751552,1.68104657 C11.2737459,1.37426314 10.5396214,1.43575959 10.0122532,2.0143853 C9.84042198,2.20306759 9.64903273,2.34632637 9.37452186,2.34283226 C9.05949794,2.33863932 8.83108814,2.19607936 8.69488046,1.92144179 C8.55378327,1.63841835 8.58381881,1.35469608 8.79057509,1.11360204 C9.4031604,0.400802252 10.1610339,-0.0142987992 11.1256637,0.000376490502" id="Fill-4" fill="#ED6F81"></path>
												</g>
											</g>
										</g>
									</g>
								</svg>

								<span>{{ item.button.text }}</span>
							</a>
						</div>
					</div>
				</div>

			</div>
		</section>

		
		<BannerFooter :data="$page.props.banner_footer" />
		<Podcasts :data="$page.props.podcasts" />

	</PageLayout>
</template>


<style lang="scss" scoped>
.title-highlighted{
	@apply border;
}

#cards{
	@apply mx-6 pb-20 xl:px-0;
}

.card{
	background: #F6F6F6;
	@apply px-12 py-8 rounded-3xl;
}

.card-header{
	@apply border-b border-gray-300 pb-3 flex items-center gap-x-3;

	h4{
		@apply text-brand-blue text-lg font-bold leading-none 
						md:text-xl lg:text-2xl;
	}
}// card-header

.card-icon{
	@apply w-9;
}

.list{

	li{
		@apply pl-4 relative;

		&::before{
			content: '';
			@apply bg-brand-pink w-1.5 h-1.5 inline-block 
							left-0 top-2.5 absolute rounded-full;
		}

		ul{
			@apply my-6;

			li{
				&::before{
					content: '';
					@apply bg-transparent border-brand-pink border w-1.5 h-1.5;
				}
			}

			li + li{
				@apply mt-2;
			}
		}
	}

}


#content{
	background: #EFEFF3;
	@apply px-6 py-20 xl:px-0;
}

.content-title{
	@apply text-brand-blue text-2xl leading-none 
					text-center font-bold
					lg:text-3xl lg:leading-none;
}

.list{
	@apply mt-12;
}

.list-item{
	@apply list-none pb-7;
}

.list-item + .list-item{
	@apply border-t border-gray-300 pt-7;
}

.list-item-content{
	@apply text-sm mt-1;
}

.list-item-btn{
	@apply bg-brand-pink text-white 
						text-sm leading-none select-none
						pl-2 pr-5 py-1.5 inline-flex gap-x-2 
						items-center rounded-full transition-all 
						hover:opacity-80;

	svg{
		@apply w-3 inline-block;
	}
}
</style>