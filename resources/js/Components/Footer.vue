<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

const store = useStore()
const { user } = storeToRefs(store)

const menu = [
	{id: 'menu-item-talk', text: 'Hablemos de Psiquiatría Legal', link: '/'},
	{id: 'menu-item-about', text: 'Sobre Hablemos', link: '/sobre-hablemos'},
	{id: 'menu-item-concepts', text: 'Conceptos', link: '/conceptos'},
	{id: 'menu-item-media', text: 'Situaciones y Consultas', link: '/situaciones-consultas'},
	{id: 'menu-item-committee', text: 'Comité', link: '/comite'}
]


const menu_secondary = [
	// {
	// 	id: 'menu-item-legal',
	// 	text: 'Legal',
	// 	link: 'https://www.esteveagora.com/es/aviso-legal',
	// 	target: '_blank'
	// },
	{
		id: 'menu-item-cookies',
		text: 'Política de cookies',
		link: '/politica-de-cookies',
		target: '_self'
	},
	{
		id: 'menu-item-privacy',
		text: 'Privacidad',
		link: 'https://www.esteveagora.com/es/privacidad',
		target: '_blank'
	},
	{
		id: 'menu-item-advice',
		text: 'Aviso legal',
		link: 'https://www.esteveagora.com/es/aviso-legal',
		target: '_blank'
	},
	{
		id: 'menu-item-contact',
		text: 'Contacto',
		link: '/contacto',
		target: '_self'
	}
]

const date = new Date()
const year = date.getFullYear()
</script>


<template>
<div class="bg-white border-t border-gray-200 h-8"></div>

<div id="mainFooter">
	<div class="container global">

		<div class="grid gap-y-8 sm:grid-cols-2 lg:grid-cols-12">

			<div class="lg:col-span-3">
				<div class="menu">
					<Link
						v-for="(item, i) in menu"
						:key="item.id"
						:href="item.link"
						class="text-sm leading-none hover:text-brand-pink">
						{{ item.text }}
					</Link>
				</div>
			</div>


			<div class="lg:col-span-2">
				<div
					v-if="user !== null"
					class="grid gap-y-2">
					<span class="text-sm font-bold">Productos</span>
					<div class="xeristar mt-2">
						<div class="sr-only">Logo Xeristar</div>
					</div>
					<a
						class="text-sm"
						href="xeristar-ficha-tecnica.pdf"
						target="_blank">
						Ficha técnica
					</a>
				</div>
			</div>


			<div class="lg:col-span-2">
				<span class="text-sm font-bold">Legal</span>
				<div class="menu pt-2">
					<a
						v-for="(item, i) in menu_secondary"
						:key="item.id"
						:href="item.link"
						class="text-sm leading-none hover:text-brand-pink">
						{{ item.text }}
					</a>
				</div>
			</div>


			<div class="lg:col-span-5">
				<div class="copy">
					<p>
						Última actualización {{ year }} | © 1996-{{ year }} Esteve
					</p>
					<p>
						El sitio Web pone a disposición del usuario,
						únicamente para la búsqueda de, y acceso a,
						contenidos y servicios disponibles en Internet,
						hiperenlaces o dispositivos técnicos de enlace,
						que permiten al usuario el acceso a sitios web
						o portales de Internet pertenecientes a, o
						gestionados por, terceros (los "Sitios Web
						de Terceros"). Los Sitios Web de Terceros
						referidos anteriormente no están bajo el
						control de Esteve y, en consecuencia, Esteve
						(o cualesquiera sociedades pertenecientes al
						grupo al que pertenece Esteve) no es responsable
						del contenido y servicios de ninguno de los
						Sitios Web de Terceros.
					</p>
					<p>
						Estos Sitios Web de Terceros se proporcionan
						únicamente para informarle sobre la existencia
						de otras fuentes de información sobre un tema
						concreto y la inclusión de un enlace en el
						presente Sitio Web no implica la aprobación
						de los Sitios Web de Terceros por parte de Esteve.
					</p>
                    <p>El contenido de esta página web refleja las conclusiones propias de los autores, que no son necesariamente las de Esteve Pharmaceuticals, S.A. Aunque se lleva a cabo una revisión exhaustiva de la información incluida en esta página web, Esteve Pharmaceuticals, S.A. no se hace responsable de la actualización de la información ni de ningún error u omisión de los datos contenidos en esta página web.
                    </p>
				</div>
			</div>

		</div>

	</div>
</div>
</template>



<style lang="scss" scoped>
#mainFooter{
	@apply bg-[#FAFAFA] px-6 py-8;
}

.xeristar{
	background: url('../../img/xeristar.webp') no-repeat 0 0 / auto 100%;
	width: 140px;
	height: 50px;
}


.menu{
	@apply grid gap-y-2;
}


.copy{
	@apply text-sm leading-tight md:text-xs;
}
</style>
