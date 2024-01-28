<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <router-link :to="{ name: 'users' }" class="btn btn-primary">Back</router-link>
                </div>
                <div class="card-body">
                    <form @submit.prevent="updateUser">
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
    name: "Edit",
    data() {
        return {
            user: {
                name: "",
                email: "",
            },
        };
    },
    created() {
        this.getUser();
    },
    methods: {
        async getUser() {
            await axios.get("/api/users/" + this.$route.params.id)
            .then((response) => {
                const {name, email} = response.data.data;
                this.user = {name, email};
            })
            .catch((err) => {
                console.log(err);
            });
        },
        async updateUser() {
            await axios.put("/api/users/" + this.$route.params.id, this.user)
            .then((response) => {
                this.$router.push({ name: "users" });
            })
            .catch((err) => {
                console.log(err);
            });
        },
    },
};
</script>