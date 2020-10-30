<template>
    <div>
        <div>
            <h1 class="discipline-title">Disciplines</h1>
            <router-link to="/disciplines/">All</router-link>
            <router-link to="/disciplines/add">Add</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Disciplines"
    }
</script>

<style lang="scss" scoped>
    .discipline-title {
        text-align: center;
        font-family: monospace;
    }
</style>