<template>
    <tr class="discipline-row">
        <td>{{ discipline.discipline_code }}</td>
        <td>{{ discipline.discipline_name }}</td>
        <td>{{ discipline.discipline_type }}</td>
        <td>{{ discipline.discipline_teacher }}</td>
        <td>{{ discipline.semester }}</td>
        <td>{{ discipline.num_credits }}</td>
        <td>{{ discipline.mt_1 }}</td>
        <td>{{ discipline.mt_2 }}</td>
        <td>{{ discipline.exam }}</td>
        <td>{{ discipline.final }}</td>
        <td>{{ discipline.grade_name }}</td>
        <td>{{ discipline.gpa }}</td>
    </tr>
</template>

<script>
export default {
    props:{
        discipline:{
            type:Object,
            required:true
        },
        index: Number
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