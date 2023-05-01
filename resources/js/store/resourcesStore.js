import { defineStore } from 'pinia'
import { compileScript } from 'vue/compiler-sfc'

export const resourcesStore = defineStore('resources', {
	state: () => ({
		filters: {
			category: null,
			product: null,
			content_type: null,
			channel: null
		},
		params: {},
		content: [],
		current_page: 0
	}),

	getters: {
		pages: state => {
			const {
				content,
				params,
				filters
			} = state

			const products = () => {
				let list = content.map(p => {
					const category = params.categories.filter(el => el.id === p.category_id)[0]
					const content_type = params.content_type.filter(el => el.id === p.content_type_id)[0]
					const channel = params.channels.filter(el => el.id === p.channel_id)[0]

					const el = {
						id: p.id,
						name: p.material,
						image: p.image,
						link: p.link,
                        filename: p.filename,
						color: category.color,
						category: {
							id: p.category_id,
							name: category.name
						},
						content_type: {
							id: p.content_type_id,
							name: content_type.type
						},
						channel: {
							id: p.channel_id,
							name: channel.channel
						},
            product: p.products.map(prod => prod.id)
					}

					return el
				})

				if( filters.category ) list = list.filter( item => item.category.id === filters.category )
				if( filters.product ) list = list.filter( item => item.product.includes(filters.product) )
				if( filters.content_type ) list = list.filter( item => item.content_type.id === filters.content_type )
				if( filters.channel ) list = list.filter( item => item.channel.id === filters.channel )

				return list
			}



			const paginate = (arr, size) => {
				return arr.reduce((acc, val, i) => {
					let idx = Math.floor(i / size)
					let page = acc[idx] || (acc[idx] = [])
					page.push(val)

					return acc
				}, [])
			}

			const posts_per_page = 9
			return paginate(products(), posts_per_page)

		},


		currentPage: state => state.current_page,


		filterCategoryName: state => {
			const { category } = state.filters
			const { categories } = state.params

			if( category ) return categories.filter(item => item.id === category)[0].name
			return 'Categoría'
		},


		filterProductName: state => {
			const { product } = state.filters
			const { products } = state.params

			if( product ) return products.filter(item => item.id === product)[0].name
			return 'Producto'
		},


		filterContentTypeName: state => {
			const { content_type } = state.filters

			if( content_type ) return state.params.content_type.filter(item => item.id === content_type)[0].type
			return 'Tipo de contenido'
		},


		filterChannelName: state => {
			const { channel } = state.filters
			const { channels } = state.params

			if( channel ) return channels.filter(item => item.id === channel)[0].channel
			return 'Canal'
		}
	},

	actions: {
		setContent(list){ this.content = list },
		setParams(params){ this.params = params },
		setPages(list){ this.pages = list },
		setCurrentPage(val){ if( val <= this.pages.length ) this.current_page = val },

		filterByCategory(val){ this.filters.category = val },
		filterByProduct(val){ this.filters.product = val },
		filterByContentType(val){ this.filters.content_type = val },
		filterByChannel(val){ this.filters.channel = val },
		resetFilters(){ for(let i in this.filters){ this.filters[i] = null } }
	}
})
