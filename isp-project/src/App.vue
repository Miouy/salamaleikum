<template>
  <div>
    <!-- <SemesterISP/> -->
    <EnrollDisciolines/>
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

// import SemesterISP from './components/student/SemesterISP'
import EnrollDisciolines from './components/enroll_disciplines/EnrollDisciplines'

export default {
  name: 'App',
  components: {
    // SemesterISP,
    EnrollDisciolines
  }
}

</script>

<style>
</style>
