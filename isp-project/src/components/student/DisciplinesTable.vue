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
                <td colspan="100%" class="semester-title" v-if="semestr[0]">{{semestr[0].semester_name}}</td>
            </tr>
            <DisciplineItem
                v-for="(discipline,index) in disciplines"
                :key="index"
                :discipline=discipline
                :student_mark="student_marks[index]"
                :index=index
                :semestr="semestr[0].semester_num"
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
    props:{
        table:{
            type:String,
            required:true,
        },
        specialty:{
            type:Object,
            required:true,
        },
        curCurs:{
            type:Number,
            required:true,
        },
    },
    data(){
        return{
            disciplines: [],
            student_marks: [],
            loadig:false,
            semestr:{},
            student:{},
        }
    },
    components:{
        DisciplineItem,
    },
    whatch:{

    },
    created(){
        Student.auth().then(response => {
            this.student = response.data;
            console.log(this.student);
            this.getDisciplines();
            //this.getSemester();
        });
    },
    
    methods:{
        getDisciplines(){
            this.loadig=true;
        
            console.log('ss');

            Api().get(`/student/isp/${this.student.student_id}/${this.curCurs}/${this.table}`).then(data =>{
                console.log(data);
                this.disciplines=data.data.disciplines;
                this.student_marks=data.data.student_marks;
                this.semestr=data.data.semester;
                this.loadig=false;
            })
        },

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