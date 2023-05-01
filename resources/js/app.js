import './bootstrap';
import 'remixicon/fonts/remixicon.css'
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import { createPinia, setActivePinia, storeToRefs } from 'pinia'
import { useStore } from '@/store/mainStore.js'
import { getUser } from '@/Composables/Init.js'

import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

import VuePlyr from '@simbiant/vue-plyr'
// eslint-disable-next-line import/no-unresolved,n/no-missing-import
import '@simbiant/vue-plyr/dist/vue-plyr.css'


const pinia = createPinia()

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
	title: (title) => `${title} - ${appName}`,
	resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
	setup({ el, app, props, plugin }) {
		const create_app = createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(pinia)
            .use(VueDatePicker)
            .use(VuePlyr)
            .mount(el);

			getUser(props.initialPage.props.auth.user);

		// Inicializa la APP
		return create_app;
	},
});

InertiaProgress.init({ color: '#4B5563' });
