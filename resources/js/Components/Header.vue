<script setup>
/**
NOTA IMPORTANTE PARA ESTE COMPONENTE:
El menú en mobile está flotante. Cuando se 
maquetó, la posición top de los elementos 
.menu y .topbar se han fijado de acuerdo a 
la altura del menú en ese momento, y esto 
varía de acuerdo a la cantidad de items que 
había en el menú... entónces, si se agrega 
un nuevo item/link al menú, habrá que modificar 
la posición "top" de los elementos .menu y .topbar.
 */
import { ref, watch } from 'vue'
import { useWindowScroll } from '@vueuse/core'
import { Link, usePage } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

const page = usePage()
const url = page.url.value
const header = ref(null)
const store = useStore()
const { user, scroll } = storeToRefs(store)

const { y } = useWindowScroll()

watch(y, val => {
	if( val >= 25 )
		store.setScroll(true)
	else
		store.setScroll(false)
})

const menu_open = ref(false)
const handleTopBarAction = (cb) => cb()


const main_menu = [
	{
		id: 'menu-item-talk', 
		text: 'Sobre Hablemos', 
		link: '/sobre-hablemos',
		class: 'sobre-hablemos',
		active: '/sobre-hablemos' === url ? true : false
	},
	{
		id: 'menu-item-concepts', 
		text: 'Conceptos', 
		link: '/conceptos',
		class: 'conceptos',
		active: '/conceptos' === url ? true : false
	},
	{
		id: 'menu-item-media', 
		text: 'Situaciones y Consultas', 
		link: '/situaciones-consultas',
		class: 'situaciones-consultas',
		active: '/situaciones-consultas' === url ? true : false
	},
	{
		id: 'menu-item-committee', 
		text: 'Comité', 
		link: '/comite',
		class: 'comite',
		active: '/comite' === url ? true : false
	},
	{
		id: 'menu-item-xeristar', 
		text: 'Xeristar&reg;', 
		link: '/xeristar',
		class: 'xeristar',
		active: '/xeristar' === url ? true : false
	}
]

const toggleMenu = () => {
	setTimeout(() => {
		if( menu_open.value ){
			menu_open.value = false
			document.body.classList.remove('overflow-hidden')
		}else{
			menu_open.value = true
			document.body.classList.add('overflow-hidden')
		}
	}, 100)
}
</script>



<template>
<section 
	id="mainHeader"
	ref="header"
	:class="scroll">

	<div class="badge">
		<img class="badge-img" src="img/corner.svg" alt="Esteve">
	</div>

	<div class="container global">
		<div :class="['topbar', { 'active': menu_open }]">
			<hr>


			<Link 
				:href="route('contact')"
				class="menu-item">
				<span class="nav-item">Contacto</span>
			</Link>

			<Link
				v-if="user === null"
				:href="route('register')"
				class="menu-item">
				<span class="menu-item-separator"></span>
				<span class="nav-item">Registro</span>
			</Link>

			<Link
				v-if="user === null"
				:href="route('login')"
				class="menu-item">
				<span class="menu-item-separator"></span>
				<span class="nav-item">Iniciar sesión</span>
			</Link>

			<Link
				v-if="user !== null"
				:href="route('logout')"
				class="menu-item"
				method="POST"
				as="button"
				@click="() => store.deleteUser()">
				<span class="menu-item-separator"></span>
				<span class="nav-item">Salir</span>
			</Link>
		</div>
	</div>


	<div class="container global">
		<div class="flex justify-between">
			<h1 class="brand">
				<Link :href="route('home')">
					<div class="logo"></div>
					<div class="slogan"></div>
					<span class="sr-only">Hablemos de psiquiatría legal</span>
				</Link>
			</h1>


			<button 
				@click="toggleMenu"
				class="md:hidden">
				<svg 
					v-if="!menu_open"
					class="fill-white w-7"
					xmlns="http://www.w3.org/2000/svg" 
					viewBox="0 0 24 24">
					<path d="M3 4H21V6H3V4ZM9 11H21V13H9V11ZM3 18H21V20H3V18Z"></path>
				</svg>

				<svg 
					v-if="menu_open"
					class="fill-white w-9"
					xmlns="http://www.w3.org/2000/svg" 
					viewBox="0 0 24 24">
					<path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"></path>
				</svg>
			</button>
		</div>
	</div>


	<div class="container global">
		<div :class="['menu', { 'active': menu_open }]">
			<div
				v-for="(item, i) in main_menu"
				:key="item.id"
				class="w-full flex items-center">
				<span v-if="i" class="menu-item-separator"></span>
				<Link 
					class="menu-item" 
					:href="item.link"
					:class="[item.class, { 'active': item.active }]">
					<span v-html="item.text" />
				</Link>
			</div>
		</div>
	</div>
</section>

<div class="spacer"></div>
</template>



<style lang="scss" scoped>
#mainHeader{
	@apply bg-brand-blue text-white 
						py-2 px-5
						inset-x-0 top-0 fixed transition-all 
						z-30
						lg:py-3 lg:px-10;
}

.badge{
	@apply left-0 top-0 absolute z-10;
}

.badge-img{
	@apply h-14 transition-all 
					sm:h-20 md:h-24;
}


.brand{
	@apply mx-auto relative transition-all z-10;

	a{
		@apply flex items-center gap-x-5;
	}

	.logo{
		background-image: url('../../img/brand.svg');
		background-position: center -15px;
		background-size: 100% auto;
		width: 100px;
		height: 85px;
		@apply bg-no-repeat block;

		@media(min-width: 768px){ 
			width: 130px; 
			height: 100px;
		}
	}

	.slogan{
		background-image: url('../../img/slogan.svg');
		background-size: auto 100%;
		background-position: 15px 0;
		width: 140px;
		height: 35px;
		@apply bg-no-repeat border-l-2 border-white;

		@media (min-width: 768px){
			width: 180px;
			height: 47px;
		}
	}
}

.topbar{
	top: 300px;
	@apply bg-brand-blue py-6 hidden inset-x-0 
						absolute select-none
						md:p-0 md:flex md:justify-end md:items-center
						md:top-auto md:relative;

	&.active{
		@apply grid md:flex;
	}

	hr{
		@apply border-white mx-4 mb-5 opacity-30 md:hidden;
	}

	.menu-item{
		@apply font-medium leading-none 
						px-4 py-2 inline-flex items-center
						whitespace-nowrap overflow-hidden 
						overflow-ellipsis cursor-pointer
						md:text-sm md:px-3;

		& > .nav-item{
			@apply transition-all;
		}

		&:hover > .nav-item{
			@apply text-brand-blue bg-white bg-opacity-80;
			box-shadow: -5px 0 0 rgba(255,255,255,.8),
									5px 0 0 rgba(255,255,255,.8);
		}
	}

	.menu-item-separator{
		@apply bg-white w-px h-3.5 hidden -left-3 relative 
							opacity-60 md:block;
	}
}// topbar


.menu{
	top: 100px;
	@apply bg-brand-blue hidden 
						inset-x-0 absolute select-none
						md:p-0 md:mt-3 md:flex md:justify-between
						md:top-auto md:relative;

	&.active{
		@apply grid md:flex;
	}

	.menu-item{
		@apply font-medium leading-none 
						px-4 py-3 inline-flex 
						relative whitespace-nowrap 
						overflow-ellipsis 
						transition-all
						md:px-4 md:py-2 md:mx-auto;

		&.active::after{
			content: '';
			border: solid 12px transparent;
			border-bottom-color: #FFF;
			margin-left: -12px;
			left: 50%;
			bottom: -.8rem;
			position: absolute;

			@media (min-width: 1024px){ bottom: -1rem; }
		}

		&.situaciones-consultas.active::after{
			border-bottom-color: #ed6f81;
		}

		&:hover{
			text-shadow: 0 0 10px #fff;
		}
	}

	.menu-item-separator{
		@apply bg-white w-px h-4 hidden top-px 
							relative opacity-60 md:block;
	}

}// menu


@media (max-width: 767px){
	#mainHeader.affix{
		.badge-img{
			@apply h-16;
		}

		.brand{ @apply h-0 scale-0 opacity-0; }

		.menu{
			top: 44px;
		}
		
		.topbar{
			top: 244px;
		}
	}
}

.spacer{
	@apply bg-brand-blue h-[100px] transition-all 
					md:h-[200px] lg:h-[207px];
	
	@media (min-width: 1200px){ height: 215px; }
}


@media (min-width: 767px){
	#mainHeader.affix{
		@apply pt-1;

		.brand{
			@apply ml-20 -mt-9;

			.logo{
				width: 90px;
				height: 67px;
			}

			.slogan{
				height: 35px;
			}
		}

		.menu{
			@apply mt-0;

			.menu-item{
				&.active::after{ border-bottom-color: transparent; }
			}
		}

	}
}
</style>