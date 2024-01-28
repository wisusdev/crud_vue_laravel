<template>
	<div class="row">
		<div class="col-12 mb-2">
            <router-link :to='{name:"create"}' class="btn btn-success">Create</router-link>
        </div>
		<div class="col-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="user in users" :key="user.id">
						<td>{{ user.id }}</td>
						<td>{{ user.name }}</td>
						<td>{{ user.email }}</td>
						<td>
							<router-link :to="{ name: 'show', params: { id: user.id } }" class="btn btn-primary">Show</router-link>
							<router-link :to="{ name: 'edit', params: { id: user.id } }" class="btn btn-warning">Edit</router-link>
							<button @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	export default {
		name: "Index",
		data() {
			return {
				users: [],
			};
		},
		created() {
			this.getUsers();
		},
		methods: {
			getUsers() {
				axios.get("/api/users").then((response) => {
					this.users = response.data.data;
				});
			},
			deleteUser(id) {
				axios.delete("/api/users/" + id).then((response) => {
					this.getUsers();
				});
			},
		},
	};
</script>