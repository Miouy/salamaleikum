<template>
    <div class="edit-discipline">
        <form action="" @submit.prevent="editDiscipline">
            <div class="discipline-field">
                <label for="discipline_code">Discipline Code</label>
                <input id="discipline_code" type="text" v-model="discipline_code">
            </div>
            <div class="discipline-field">
                <label for="discipline_name">Discipline Name</label>
                <input id="discipline_name" type="text" v-model="discipline_name">
            </div>
            <div class="discipline-field">
                <label for="discipline_type">Discipline Type</label>
                <input id="discipline_type" type="text" v-model="discipline_type">
            </div>
            <div class="discipline-field">
                <label for="discipline_teacher">Discipline Teacher Name</label>
                <input id="discipline_teacher" type="text" v-model="discipline_teacher">
            </div>
            <div class="discipline-field">
                <label for="discipline_semester">Discipline Semester</label>
                <input id="discipline_semester" type="number" v-model="discipline_semester" min="1" max="2">
            </div>
            <div class="discipline-field">
                <label for="discipline_year">Discipline Education Year</label>
                <select name="discipline_year" id="discipline_year" v-model="discipline_year">
                    <option value="2018-2019">2018-2019</option>
                    <option value="2019-2020">2019-2020</option>
                    <option value="2020-2021">2020-2021</option>
                </select>
            </div>
            <div class="discipline-field">
                <label for="discipline_credits">Discipline Credits Quantity</label>
                <input id="discipline_credits" type="number" v-model="discipline_credits" min="0" max="10">
            </div>
            <div class="edit-button">
                <button type="submit">Edit Discipline</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "EditDiscipline",
        data(){
            return {
                disciplineId: this.$route.params.disciplineId,
                discipline: {},
                discipline_code: '',
                discipline_name: '',
                discipline_type: '',
                discipline_teacher: '',
                discipline_semester: '',
                discipline_year: '',
                discipline_credits: '',
                disciplines: [
                    {
                        discipline_id: 1,
                        discipline_code: 'Math 1203',
                        discipline_name: 'Mathematics',
                        discipline_type: 'Теоретическое Обучение',
                        discipline_teacher: 'Карашбаева Ж.О.',
                        semester: 1,
                        education_year: '2018-2019',
                        num_credits: 5,
                    },
                    {
                        discipline_id: 2,
                        discipline_code: 'Math 1203',
                        discipline_name: 'Mathematics',
                        discipline_type: 'Теоретическое Обучение',
                        discipline_teacher: 'Карашбаева Ж.О.',
                        semester: 1,
                        education_year: '2018-2019',
                        num_credits: 5,
                    },
                    {
                        discipline_id: 3,
                        discipline_code: 'Math 1203',
                        discipline_name: 'Mathematics',
                        discipline_type: 'Теоретическое Обучение',
                        discipline_teacher: 'Карашбаева Ж.О.',
                        semester: 1,
                        education_year: '2018-2019',
                        num_credits: 5,
                    }
                ],
            }
        },
        created() {
            let disciplineIndex = this.disciplines.findIndex(d => d.discipline_id === Number.parseInt(this.disciplineId));
            if(disciplineIndex !== -1){
                this.discipline = this.disciplines[disciplineIndex];
                this.discipline_code = this.discipline.discipline_code;
                this.discipline_name = this.discipline.discipline_name;
                this.discipline_type = this.discipline.discipline_type;
                this.discipline_teacher = this.discipline.discipline_teacher;
                this.discipline_semester = this.discipline.semester;
                this.discipline_year = this.discipline.education_year;
                this.discipline_credits = this.discipline.num_credits;
            }
        },
        methods: {
            addNewDiscipline(){

            }
        }
    }
</script>

<style lang="scss" scoped>
    .edit-discipline {
        font-family: monospace;
        font-size: 18px;
        display: flex;
        justify-content: center;

        form {
            width: 400px;
            padding: 20px;
            border-bottom: 2px solid #009879;

            .discipline-field {
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