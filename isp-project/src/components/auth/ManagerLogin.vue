<template>
    <div>
        <form>
            <div>
                <label>Email</label>
                <input type="email" v-model="form.manager_email" name="email">

                <span class="text-danger" v-if="errors.manager_email">
                    {{ errors.manager_email[0] }}
                </span>
            </div>
            <div>
                <label>Password</label>
                <input type="password" v-model="form.password" name="password">

                <span class="text-danger" v-if="errors.password">
                    {{ errors.password[0] }}
                </span>
            </div>
            <button type="submit" @click.prevent="login">Login</button>
        </form>
    </div>
</template>

<script>
    import Manager from "../../api/Manager";

    export default {
        name: "ManagerLogin",
        data(){
            return {
                form: {
                    manager_email: "",
                    password: "",
                },
                errors: []
            }
        },
        methods: {
            login() {
                Manager.login(this.form)
                    .then(data => {
                        localStorage.setItem("token", data.data);
                    })
                    .catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>