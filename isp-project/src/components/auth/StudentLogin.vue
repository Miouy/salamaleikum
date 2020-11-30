<template>
    <div>
        <form>
            <div>
                <label>Login Id</label>
                <input type="number" v-model="form.student_id" name="loginId">

                <span class="text-danger" v-if="errors.student_id">
                    {{ errors.student_id[0] }}
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
    import Student from "../../api/Student";

    export default {
        name: "StudentLogin",
        data(){
            return {
                form: {
                    student_id: "",
                    password: "",
                },
                errors: []
            }
        },
        methods: {
            login() {
                Student.login(this.form)
                    .then(() => {
                        this.$root.$emit("login", true);
                        localStorage.setItem("auth", true);
                        this.$router.push("/manager/students");
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



