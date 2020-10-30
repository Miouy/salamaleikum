<template>
    <div>
        <table class="disciplines-table">
            <thead>
                <tr>
                    <th>Код дисциплины</th>
                    <th>Наименование дисциплины</th>
                    <th>Тип дисциплины</th>
                    <th>Преподователь дисциплины</th>
                    <th>Семестр</th>
                    <th>Кол-во кредитов</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                <DisciplineItem
                        v-for="(discipline, index) in disciplines"
                        :discipline="discipline"
                        :index="index"
                        :key="discipline.discipline_id"
                />
            </tbody>
        </table>
    </div>
</template>

<script>
    import DisciplineItem from "./DisciplineItem";

    export default {
        name: "DisciplinesTable",
        components: {
            DisciplineItem,
        },
        data(){
            return {
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
        }
    }
</script>

<style lang="scss" scoped>
    .disciplines-table {
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