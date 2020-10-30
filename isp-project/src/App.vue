<template>
  <div>
    <SemesterISP/>
    <h1>Manager</h1>
    <div>
      <router-link to="specialties">Specialties</router-link>
    </div>
    <div>
      <router-link to="groups">Groups</router-link>
    </div>
    <div>
      <router-link to="disciplines">Disciplines</router-link>
    </div>
    <div>
      <router-link to="advisors">Advisors</router-link>
    </div>
    <div>
      <router-link to="students">Students</router-link>
    </div>
    <router-view></router-view>

  </div>
</template>

<script>

import SemesterISP from './components/student/SemesterISP'

export default {
  name: 'App',
  components: {
    SemesterISP,
  }
}

</script>

<style>
</style>
