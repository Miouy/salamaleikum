<template>
    <div>
        <div>
            <h1 class="groups-title">Groups</h1>
            <router-link to="/manager/groups/">All</router-link>
            <router-link to="/manager/groups/add">Add</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Groups"
    }
</script>

<style scoped>
    .groups-title {
        text-align: center;
        font-family: monospace;
    }
</style>