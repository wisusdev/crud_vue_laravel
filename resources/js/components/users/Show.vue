<template>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<router-link :to="{ name: 'users' }" class="btn btn-primary">Back</router-link>
				</div>
				<div class="card-body">
					<h3>{{ user.name }}</h3>
					<p>{{ user.email }}</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "Show",
	data() {
		return {
			user: {},
		};
	},
	created() {
		this.getUser();
	},
	methods: {
		getUser() {
			axios.get("/api/users/" + this.$route.params.id).then((response) => {
				this.user = response.data.data;
			});
		},
	},
};
</script>