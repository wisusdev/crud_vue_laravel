<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="mb-0">Create user</p>
                </div>
                <div class="card-body">
					<form @submit.prevent="createUser">
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" v-model="user.name" class="form-control" id="name" aria-describedby="nameHelp">
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email address</label>
							<input type="email" v-model="user.email" class="form-control" id="email" aria-describedby="emailHelp">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Create",
        data() {
            return {
                user: {},
            };
        },
        methods: {
            createUser() {
                axios.post("/api/users", this.user).then((response) => {
                    this.$router.push({ name: "users" });
                });
            },
        },
    };
</script>

