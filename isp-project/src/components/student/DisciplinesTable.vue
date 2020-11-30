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
                <td colspan="100%" class="semester-title">Autumn 2018-2019</td>
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
import Api from '../../api/Api';
import Student from '../../api/Student'

import DisciplineItem from './DisciplineItem'

export default {
    name: 'DisciplineTable',
    data(){
        return{
            disciplines: [],
            student: null,
            loadig:false,
        }
    },
    components:{
        DisciplineItem,
    },
    whatch:{

    },
    mounted(){
        Student.auth().then(response => {
            this.student = response.data;
        });
    },
    methods:{
        getDisciplines(){
            this.loadig=true;

            Api.get('').then(data =>{
                console.log(data);
                this.disciplines=data.data;
                this.loadig=false;
            })
        }
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
            &:first-child{
                border-radius:5px 0 0 0;
            }
            &:last-child{
                border-radius:0 5px 0 0;
            }
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