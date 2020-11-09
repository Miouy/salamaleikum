<template>
    <tr class="discipline-row">
        <td>{{ elective.discipline_code }}</td>
        <td>{{ elective.discipline_name }}</td>
        <td>{{ elective.discipline_type }}</td>
        <td>{{ elective.semester }}</td>
        <td>{{ elective.num_credits }}</td>
        <td> <button @click="enrool">+</button> </td>
    </tr>
</template>

<script>
export default {
    props:['elective','index','enrolled'],

    methods:{
        enrool(){
            //console.log("item enroll "+this.elective.discipline_code)
            this.$emit('enroll',this.elective.discipline_code);
        }
    }
}
</script>

<style lang="scss" scoped>
    .discipline-row {
        &:hover {
            color: #009879;
        }

        td {
            padding: 12px 15px;
        }
    }
</style>