<template>
  <div>
    <h1>Manager</h1>
    <div>
      <router-link :to="{name: 'Specialties'}">Specialties</router-link>
    </div>
    <div>
      <router-link :to="{name: 'Groups'}">Groups</router-link>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>

  export default {
    name: 'App',
    components: {
    }
  }
</script>

<style>
</style>
