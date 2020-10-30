<template>
    <div>
        <div>
            <h1 class="advisors-title">Advisors</h1>
            <router-link to="/advisors/">All</router-link>
            <router-link to="/advisors/add">Add</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Advisors"
    }
</script>

<style lang="scss" scoped>
    .advisors-title {
        text-align: center;
        font-family: monospace;
    }
</style>