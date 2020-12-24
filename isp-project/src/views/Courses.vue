<template>
    <div>
        <div>
            <h1 class="specialties-title">Courses</h1>
            <router-link to="/manager/courses/">All</router-link>
            <router-link to="/manager/courses/add">Add</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        name: "CoursesComponent",
    }
</script>

<style scoped>
    .specialties-title {
        text-align: center;
        font-family: monospace;
    }
</style>