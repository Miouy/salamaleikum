<template>
    <div>
        <div>
            <h1 class="students-title">Students</h1>
            <router-link to="/students/">All</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Students"
    }
</script>

<style lang="scss" scoped>
    .advisors-title {
        text-align: center;
        font-family: monospace;
    }
</style>