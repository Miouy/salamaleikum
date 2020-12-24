<template>
    <tr class="advisor-row">
        <td>{{ semester.semester_id }}</td>
        <td>{{ semester.semester_name }}</td>
        <td>{{ semester.semester_num }}</td>
        <td>{{ semester.total_gpa }}</td>
        <td>{{ semester.course_id }}</td>
        <td><button type="button" @click.prevent="goEdit">Edit</button></td>
    </tr>
</template>

<script>
    export default {
        name: "SemesterItem",
        props:{
            semester:{
                type:Object,
                required:true
            },
        },
        created() {
        },
        methods: {
            goEdit(){
                this.$router.push({path: '/manager/semesters/' + this.course.semester_id + '/edit', params: {semesterId: this.course.semester_id}});
            }
        }
    }
</script>

<style lang="scss" scoped>
    .advisor-row {
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