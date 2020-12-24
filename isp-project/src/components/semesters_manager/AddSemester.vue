<template>
    <div class="add-advisor">
        <form action="" @submit.prevent="addNewSemester">
            <div class="advisor-field">
                <label for="advisor_name">Semester Name</label>
                <input id="advisor_name" type="text" v-model="semester_name">
            </div>
            <div class="advisor-field">
                <label>Semester Number</label>
                <input type="text" v-model="semester_num">
            </div>
            <div class="advisor-field">
                <label>Total Credits</label>
                <input type="text" v-model="total_gpa">
            </div>
            <div class="advisor-field">
                <label for="group_specialty">Semester Course</label>
                <select name="group_specialty" id="group_specialty" v-model="course_id">
                    <option v-for="option in course_options" :value="option.course_id" :key="option.course_id">{{option.course_name}}</option>
                </select>
            </div>
            <div class="add-button">
                <button type="submit">Add Course</button>
            </div>
        </form>
    </div>
</template>

<script>
    import Api from "../../api/Api";

    export default {
        name: "AddSemester",
        data() {
            return {
                semester_name: '',
                semester_num: '',
                total_gpa: 0,
                course_id: 0,
                course_options: []
            }
        },
        created() {
            this.getCourses();
        },
        methods: {
            getCourses() {
                this.loading = true;

                Api().get("/manager/courses").then(data => {
                    this.course_options = data.data;
                });
            },
            addNewSemester(){
                if(
                    this.semester_name.trim() && this.semester_num.trim()
                    && this.total_gpa && this.course_id
                ){
                    const newSemester = {
                        semester_name: this.semester_name,
                        semester_num: this.semester_num,
                        total_gpa: this.total_gpa,
                        course_id: this.course_id,
                    }

                    Api()
                        .post('/manager/semesters', newSemester)
                        .then(() => {
                            this.$router.push("/manager/semesters");
                        })
                        .catch(e => {
                            alert(e);
                        })
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .add-advisor {
        font-family: monospace;
        font-size: 18px;
        display: flex;
        justify-content: center;

        form {
            width: 400px;
            padding: 20px;
            border-bottom: 2px solid #009879;

            .advisor-field {
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
                    width: 100%;
                }

                button {
                    background-color: #F2F8FD;
                    color: #009879;
                    border: 1px solid #009879;
                    border-radius: 5px;
                    padding: 5px 10px;
                    font-weight: bold;
                    margin: 5px 0;
                    outline: none;

                    &:hover {
                        color: #F2F8FD;
                        background-color: #009879;
                    }

                    &:active {
                        color: #000000;
                    }
                }
            }

            .add-button {
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