<template>
        <table class="discipline-table">
        <thead>
            <tr>
                <th>Код дисциплины</th>
                <th>Наименование дисциплины</th>
                <th>Тип дисциплины</th>
                <th>Семестр</th>
                <th>Кол-во кредитов</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="100%" class="semester-title">2 курс 1 семестр</td>
            </tr>
            
            <!-- <DisciplineItem
                v-for="(discipline,index) in disciplines"
                :key="index"
                :discipline=discipline
                :index=index
            /> -->
            
            <EnrollItem 
                v-for="(discipline,index) in disciplines" 
                :key="index"
                :discipline=discipline
                :index=index
                :enrolled=false
            />
            <EnrollItem 
                v-for="(discipline,index) in enrolled" 
                :key="index"
                :discipline=discipline
                :index=index
                :enrolled=true
            />

        </tbody>
    </table>
</template>

<script>

import EnrollItem from './EnrollItem'

export default {
    data(){
        return{
            
        }
    },
    props:['disciplines','electives','enrolled'],
    components:{
        EnrollItem
    },
    methods: {

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