import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

const getUser = page_props => {
	/**
	 * Aquí se carga el store para usarlo
	 * globalmente en todas las vistas.
	 */
	const store = useStore()
	const { user } = storeToRefs(store)
	// const page_props = props.initialPage.props

	// Si el usuario está logeado lo guarda en el store
	if( page_props ) store.setUser(page_props);
}


export {
	getUser
}
