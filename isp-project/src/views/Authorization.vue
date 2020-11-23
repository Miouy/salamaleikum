<template>
    <div>
        <div>
            <h1 class="authorization-title">Authorization</h1>
            <router-link to="/auth/">Login</router-link>
            <router-link to="/auth/register">Register</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>