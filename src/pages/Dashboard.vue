<template>
	<f7-page>
		<f7-navbar sliding>
			<f7-nav-left>
				<f7-link icon-f7="icon-bars" panel-open="left"></f7-link>
			</f7-nav-left>
			<f7-nav-title>
				Dashboard
			</f7-nav-title>
		</f7-navbar>
		<f7-block inner class="dashboard-cards">
			<f7-card>
				<template slot="header">
					<f7-icon f7="thermometer"/>
				</template>
				<template slot="content">
					{{ this.temperature ? this.temperature.value : "-" }} °C
				</template>
			</f7-card>
			<f7-card>
				<template slot="header">
					<f7-icon f7="drop_fill"/>
				</template>
				<template slot="content">
					{{ this.humidity ? this.humidity.value : "-" }}%
				</template>
			</f7-card>
			<f7-card>
				<template slot="header">
					<img src="../../static/img/icons/chick.png">
				</template>
				<template slot="content">
					{{ this.chicken ? this.chicken.value : "-" }}
				</template>
			</f7-card>
		</f7-block>
	</f7-page>
</template>
<script>
	export default {
		name: 'Dashboard',
		data() {
			return {
				humidity: null,
				temperature: null,
				chicken: null
			};
		},
		created() {
			if (this.$db("humidity"))
				this.humidity = this.$db("humidity");
			else
				this.$api({
					url: "humidity",
					method: "GET"
				}).then(d => {
					this.$db("humidity", d.data);
					this.humidity = d.data;
				});

			if (this.$db("temperature"))
				this.temperature = this.$db("temperature");
			else
				this.$api({
					url: "temperature",
					method: "GET"
				}).then(d => {
					this.$db("temperature", d.data);
					this.temperature = d.data;
				});

			if (this.$db("chicken-count"))
				this.chicken = this.$db("chicken-count");
			else
				this.$api({
					url: "chicken-count",
					method: "GET"
				}).then(d => {
					this.$db("chicken-count", d.data);
					this.chicken = d.data;
				});

			// then on every page REFRESH button in right corner + auto refresh every minute
		}
	};
</script>
