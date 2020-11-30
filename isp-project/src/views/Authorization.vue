<template>
    <div>
        <div>
            <h1 class="auth-title">Authorization</h1>
            <router-link to="/auth/student-login">Student Login</router-link>
            <router-link to="/auth/register">Register</router-link>
            <router-link to="/auth/manager-login">Manager Login</router-link>
            <router-link to="/auth/advisor-login">Advisor Login</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Authorization"
    }
</script>

<style lang="scss" scoped>
    .auth-title {
        text-align: center;
        font-family: monospace;
    }
</style>