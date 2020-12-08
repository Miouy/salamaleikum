<template>
    <div>
        <form>
            <div>
                <label>Email</label>
                <input type="email" v-model="form.advisor_email" name="email">
            </div>
            <div>
                <label>Password</label>
                <input type="password" v-model="form.password" name="password">
            </div>
            <button type="submit" @click.prevent="login">Login</button>
        </form>
    </div>
</template>

<script>
    import Advisor from "../../api/Advisor";

    export default {
        name: "AdvisorLogin",
        data(){
            return {
                form: {
                    advisor_email: "",
                    password: "",
                }
            }
        },
        methods: {
            login() {
                Advisor.login(this.form)
                    .then(data => {
                        localStorage.setItem("token", data.data);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        }
    }
</script>

<style scoped>

</style>