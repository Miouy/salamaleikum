<template>
    <tr class="student-row">
        <td>{{ student.student_id }}</td>
        <td>{{ student.student_iin }}</td>
        <td>{{ student.student_email }}</td>
        <td>{{ student.student_telephone }}</td>
        <td>{{ student.student_surname }}</td>
        <td>{{ student.student_name }}</td>
        <td>{{ student.student_patronymic }}</td>
        <td>{{ student.student_password }}</td>
        <td>{{ student.student_group.group_name }}</td>
        <td><button type="button" @click.prevent="goEdit">Edit</button></td>
    </tr>
</template>

<script>
    export default {
        name: "StudentItem",
        data(){
            return {

            }
        },
        props:{
            student:{
                type: Object,
                required: true,
            },
        },
        methods: {
            goEdit(){
                this.$router.push({name: 'EditStudent', params: {studentId: this.student.student_id}});
            }
        }
    }
</script>

<style lang="scss" scoped>
    .student-row {
        &:hover {
            color: #009879;
        }

        td {
            padding: 12px 15px;

            p {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            button {
                color: #009879;
                background-color: #F2F8FD;
                border: 1px solid #009879;
                outline: none;
                padding: 5px;
                font-family: monospace;
                font-size: 18px;

                &:hover {
                    color: #F2F8FD;
                    background-color: #009879;
                }

                &:active {
                    color: #000000;
                }
            }
        }
    }
</style>