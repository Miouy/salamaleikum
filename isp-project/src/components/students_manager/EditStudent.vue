<template>
    <div class="edit-student">
        <form action="" @submit.prevent="editStudent">
            <div class="student-field">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text" v-model="student.student_id">
            </div>
            <div class="student-field">
                <label for="student_iin">Student IIN</label>
                <input id="student_iin" type="text" v-model="student.student_iin">
            </div>
            <div class="student-field">
                <label for="student_email">Student Email</label>
                <input id="student_email" type="email" v-model="student.student_email">
            </div>
            <div class="student-field">
                <label for="student_telephone">Student Telephone</label>
                <input id="student_telephone" type="tel" v-model="student.student_telephone">
            </div>
            <div class="student-field">
                <label for="student_surname">Student Surname</label>
                <input id="student_surname" type="text" v-model="student.student_surname">
            </div>
            <div class="student-field">
                <label for="student_name">Student Name</label>
                <input id="student_name" type="text" v-model="student.student_name">
            </div>
            <div class="student-field">
                <label for="student_patronymic">Student Patronymic</label>
                <input id="student_patronymic" type="text" v-model="student.student_patronymic">
            </div>
            <div class="student-field">
                <label for="student_password">Student Password</label>
                <input id="student_password" type="password" v-model="student.student_password">
            </div>
            <div class="student-field">
                <label for="student_group">Student Group</label>
                <select name="student_group" id="student_group">

                </select>
            </div>
            <div class="edit-button">
                <button type="submit">Edit student</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "EditStudent",
        data(){
            return {
                student: {},
                studentId: this.$route.params.studentId,
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
                ],
                groups: [
                    {
                        group_id: 1,
                        group_name: "CSSE-1806K",
                        group_specialty: {
                            specialty_id: 2,
                            specialty_code: "IS",
                            specialty_name: "Information systems",
                            specialty_courses_quantity: 4
                        }
                    },
                    {
                        group_id: 2,
                        group_name: "CSSE-1806K",
                        group_specialty: {
                            specialty_id: 2,
                            specialty_code: "IS",
                            specialty_name: "Information systems",
                            specialty_courses_quantity: 4
                        }
                    },
                    {
                        group_id: 3,
                        group_name: "CSSE-1806K",
                        group_specialty: {
                            specialty_id: 2,
                            specialty_code: "IS",
                            specialty_name: "Information systems",
                            specialty_courses_quantity: 4
                        }
                    }
                ],
            }
        },
        methods: {
            setStudent(){
                let studentIndex = this.students.findIndex(s => s.student_id === Number.parseInt(this.studentId));
                if(studentIndex !== -1){
                    console.log();
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .edit-student {
        font-family: monospace;
        font-size: 18px;
        display: flex;
        justify-content: center;

        form {
            width: 400px;
            padding: 20px;
            border-bottom: 2px solid #009879;

            .student-field {
                margin-bottom: 20px;
                label, input {
                    display: block;
                }

                label {
                    margin-bottom: 10px;
                    background-color: #009879;
                    color: #ffffff;;
                    padding: 5px;
                    border-radius: 5px 5px 0 0;
                }

                input, select {
                    min-width: 100%;
                    min-height: 30px;
                    border: none;
                    outline: none;
                    border-bottom: 1px solid #dddddd;
                    background-color: #F2F8FD;
                    font-family: monospace;
                    font-size: 18px;
                    padding: 5px;
                    box-sizing: border-box;
                }

                select {
                    width: 100%;
                }
            }

            .edit-button {
                text-align: center;
                margin-top: 40px;
                margin-bottom: 20px;

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
    }
</style>