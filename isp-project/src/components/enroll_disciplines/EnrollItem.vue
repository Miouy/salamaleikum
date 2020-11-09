<template>
    <tr class="discipline-row">
        <td>{{ discipline.discipline_code }}</td>
        <td>{{ discipline.discipline_name }}</td>
        <td>{{ discipline.discipline_type }}</td>
        <td>{{ discipline.semester }}</td>
        <td>{{ discipline.num_credits }}</td>
        <td v-if="discipline.is_elective && enrolled"> <button @click="graduate">-</button> </td>
        <td v-else></td>
    </tr>
</template>

<script>
export default {
    props:['discipline','index','enrolled'],
    methods: {
        graduate(){
            this.$emit('graduate',this.discipline.discipline_code);
        }
    },
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