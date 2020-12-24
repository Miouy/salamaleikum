<template>
    <div class="add-advisor">
        <form action="" @submit.prevent="addNewCourse">
            <div class="advisor-field">
                <label for="advisor_name">Course Name</label>
                <input id="advisor_name" type="text" v-model="course_name">
            </div>
            <div class="advisor-field">
                <label>Course Code</label>
                <input type="text" v-model="course_code">
            </div>
            <div class="advisor-field">
                <label>Course Education Year</label>
                <input type="text" v-model="course_education_year">
            </div>
            <div class="advisor-field">
                <label for="group_specialty">Course Specialty</label>
                <select name="group_specialty" id="group_specialty" v-model="specialty_id">
                    <option v-for="option in specialty_options" :value="option.specialty_id" :key="option.specialty_id">{{option.name}}</option>
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
        name: "AddCourse",
        data() {
            return {
                course_name: '',
                course_code: '',
                course_education_year: '',
                specialty_id: 0,
                specialty_options: []
            }
        },
        created() {
            this.getSpecialties();
        },
        methods: {
            getSpecialties() {
                this.loading = true;

                Api().get("/manager/specialties").then(data => {
                    this.specialty_options = data.data;
                });
            },
            addNewCourse(){
                if(
                    this.course_name.trim() && this.course_code.trim()
                    && this.course_education_year.trim() && this.specialty_id
                ){
                    const newCourse = {
                        course_name: this.course_name,
                        course_code: this.course_code,
                        course_education_year: this.course_education_year,
                        specialty_id: this.specialty_id,
                    }

                    Api()
                        .post('/manager/courses', newCourse)
                        .then(() => {
                            this.$router.push("/manager/courses");
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