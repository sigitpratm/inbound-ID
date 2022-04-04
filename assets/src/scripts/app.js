/**
 * Manage global libraries like jQuery or THREE from the webpack.mix.js file
 */
require('lottie-web')
import Alpine from 'alpinejs'

window.Alpine = Alpine
window.dropdown = () => {
	Alpine.data('dropdown', () => ({
		open: false,

		toggle() {
			this.open = ! this.open
		}
	}))
}

Alpine.store('accordion', {
	tab: 0
})
Alpine.start()
