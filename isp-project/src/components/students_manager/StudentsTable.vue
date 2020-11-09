<template>
    <div>
        <table class="students-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>IIN</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Surname</th>
                    <th>Name</th>
                    <th>Patronymic</th>
                    <th>Password</th>
                    <th>Group</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <StudentItem
                    v-for="student in students"
                    :student="student"
                    :key="student.student_id"
                />
            </tbody>
        </table>
    </div>
</template>

<script>
    import StudentItem from "./StudentItem";

    export default {
        name: "StudentsTable",
        components: {
            StudentItem,
        },
        data(){
            return {
                students: [
                    {
                        student_id: 1,
                        student_iin: 1111111111,
                        student_email: 'ali@mail.ru',
                        student_telephone: '87777777777',
                        student_surname: 'Ryskhan',
                        student_name: 'Alikhan',
                        student_patronymic: '-',
                        student_password: 'ali',
                        student_group: {
                            group_id: 1,
                            group_name: "CSSE-1806K",
                            group_specialty: {
                                specialty_id: 2,
                                specialty_code: "IS",
                                specialty_name: "Information systems",
                                specialty_courses_quantity: 4
                            }
                        }
                    },
                    {
                        student_id: 2,
                        student_iin: 2111111111,
                        student_email: 'zhalgas@mail.ru',
                        student_telephone: '87777777778',
                        student_surname: 'Sarsen',
                        student_name: 'Zhalgas',
                        student_patronymic: 'Sakenuly',
                        student_password: 'zhako',
                        student_group: {
                            group_id: 1,
                            group_name: "CSSE-1806K",
                            group_specialty: {
                                specialty_id: 2,
                                specialty_code: "IS",
                                specialty_name: "Information systems",
                                specialty_courses_quantity: 4
                            }
                        }
                    }
                ]
            }
        }
    }
</script>

<style lang="scss" scoped>
    .students-table {
        border-collapse: collapse;
        margin: 25px auto;
        font-size: 18px;
        font-family: monospace;
        min-width: 80%;
        text-align: left;

        th {
            padding: 12px 15px;
        }

        thead {
            tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }
        }

        tbody {
            tr {
                border-bottom: 1px solid #dddddd;

                &:nth-of-type(even) {
                    background-color: #f3f3f3;
                }

                &:last-of-type {
                    border-bottom: 2px solid #009879;
                }
            }
        }
    }
</style>