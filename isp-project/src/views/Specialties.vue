<template>
    <div>
        <div>
            <h1 class="specialties-title">Specialties</h1>
            <router-link to="/manager/specialties/">All</router-link>
            <router-link to="/manager/specialties/add">Add</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        name: "SpecialtiesComponent",
    }
</script>

<style scoped>
    .specialties-title {
        text-align: center;
        font-family: monospace;
    }
</style>