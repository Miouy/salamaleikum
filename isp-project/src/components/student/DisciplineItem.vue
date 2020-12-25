<template>
    <tr class="discipline-row" v-if="student_mark!=null">
        <td>{{ discipline.discipline_code }}</td>
        <td>{{ discipline.discipline_name }}</td>
        <td>{{ discipline.discipline_type }}</td>
        <td>{{ discipline.discipline_teacher }}</td>
        <td>{{ semestr }}</td>
        <td>{{ discipline.discipline_credit }}</td>
        <td>{{ student_mark.mt_1 }}</td>
        <td>{{ student_mark.mt_2 }}</td>
        <td>{{ student_mark.exam }}</td>
        <td>{{ student_mark.final }}</td>
        <td>{{ student_mark.grade_name }}</td>
        <td>{{ student_mark.gpa }}</td>
    </tr>
</template>

<script>
export default {
    props:{
        discipline:{
            type:Object,
            required:true
        },
        specialty:{
            type:Object,
            required:true
        },
        student_mark:{
            type:Object,
            required:true
        },
        semestr:{
            type:Number,
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