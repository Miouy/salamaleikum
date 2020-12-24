<template>
    <div>
        <div>
            <h1 class="specialties-title">Semesters</h1>
            <router-link to="/manager/semesters/">All</router-link>
            <router-link to="/manager/semesters/add">Add</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        name: "SemestersComponent",
    }
</script>

<style scoped>
    .specialties-title {
        text-align: center;
        font-family: monospace;
    }
</style>