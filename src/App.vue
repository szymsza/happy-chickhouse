<template>
	<!-- App -->
	<f7-app :params="f7params">

		<!-- Statusbar -->
		<f7-statusbar></f7-statusbar>

		<!-- Left Panel / View -->
		<left-panel-view/>

		<!-- Main View -->
		<f7-view url="/" :main="true"></f7-view>


	</f7-app>
</template>

<script>
	import routes from './routes';
	import LeftPanel from './components/LeftPanel';

	export default {
		data() {
			return {
				token: null,
				f7params: {
					theme: 'auto',
					routes,
					id: 'io.framework7.testapp',
					pushStateNoAnimation: true,
					panel: {
						leftBreakpoint: 960
					},
				},
			};
		},
		name: 'App',
		components: {
			'left-panel-view': LeftPanel
		},
		methods: {
			handleBackButton() {
				// NOTE: The back button will behave differently depending on circumstance
				// If the side panel is open, close it
				if (document.querySelector('.panel-left.panel-active')) {
					// This will do nothing when the split-view is open
					return this.$f7.panel.close();
				}
				// Close modals
				// @TODO How to handle modals we shouldn't close like a login-screen?
				if (document.querySelector('.modal-in')) {
					return this.$f7.popover.close();
				}
				// If we have a back button, we want it to go back
				if (this.$f7.views.main.router.history.length > 1) {
					return this.$f7.views.main.router.back();
				}
				// Default to closing the app
				return window.navigator.app.exitApp();
			}
		},
		computed: {
			isiOS() {
				return this.$theme.ios;
			}
		},
		created() {
			document.addEventListener('backbutton', this.handleBackButton);
		}
	};
</script>

<style>
	/* style is not `scoped` so navbars in Pages are modified as well */
	@media (min-width: 960px) {
		/* Let's hide panel-opener button when left panel is visible */
		.view-main .navbar .panel-open {
			display: none;
		}
	}
</style>
