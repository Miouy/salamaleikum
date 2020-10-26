<template>
    <table class="discipline-table">
        <thead>
            <tr>
                <th>Код дисциплины</th>
                <th>Наименование дисциплины</th>
                <th>Тип дисциплины</th>
                <th>Преподователь дисциплины</th>
                <th>Семестр</th>
                <th>Кол-во кредитов</th>
                <th>РК 1</th>
                <th>РК 2</th>
                <th>Экзамен</th>
                <th>Итог. оценка</th>
                <th>Оценка (букв.)</th>
                <th>GPA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="100%" class="semester-title">1 курс летний семестр</td>
            </tr>
            <DisciplineItem
                v-for="(discipline,index) in disciplines"
                :key="index"
                :discipline=discipline
                :index=index
            />
        </tbody>
    </table>
</template>

<script>

import DisciplineItem from './DisciplineItem'

export default {
    name: 'table',
    data(){
        return{
            disciplines: [
                {
                    discipline_code: 'AP 1206',
                    discipline_name: 'Algorithmization and Programming',
                    discipline_type: 'Теоретическое Обучение',
                    discipline_teacher: 'Хаймульдин А.Г.',
                    semester: 1,
                    num_credits:7,
                    mt_1: 94,
                    mt_2: 98,
                    exam: 89.33,
                    final: 	93,
                    grade_name: 'A-',
                    gpa:3.67
                },
                {
                    discipline_code: 'Math 1203',
                    discipline_name: 'Mathematics',
                    discipline_type: 'Теоретическое Обучение',
                    discipline_teacher: 'Карашбаева Ж.О.',
                    semester: 1,
                    num_credits: 5,
                    mt_1: 99.5,
                    mt_2: 100,
                    exam: 90,
                    final: 96,
                    grade_name: 'A',
                    gpa:4
                },
                {
                    discipline_code: 'AP 1206',
                    discipline_name: 'Algorithmization and Programming',
                    discipline_type: 'Теоретическое Обучение',
                    discipline_teacher: 'Хаймульдин А.Г.',
                    semester: 1,
                    num_credits:7,
                    mt_1: 94,
                    mt_2: 98,
                    exam: 89.33,
                    final: 	93,
                    grade_name: 'A-',
                    gpa:3.67
                },
            ],
        }
    },
    components:{
        DisciplineItem,
    },
    methods:{

    },
}
</script>

<style lang="scss" scoped>
    .discipline-table{
        border-collapse: collapse;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 100%;
        text-align: left;

        th {
            padding: 12px 15px;
        }

        thead {
            tr {
                background-color: #009879;
                color: #ffffff;
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

            .semester-title{
                text-align: center;
                padding: 12px 15px;
                background:  #F2F8FD;
                font-weight: 700;
                color:#414042;
            }
        }
    }
</style>