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
            
            <ToEnrollItem 
                v-for="(elective,index) in en_el" 
                :key="index"
                :elective="elective"
                :index="index"
                :enrolled="false"
                @enroll="enroll"
            />
        </tbody>
    </table>
</template>

<script>

import ToEnrollItem from './ToEnrollItem'

export default {
    data(){
        return{
            elec: this.en_el,
        }
    },
    props:{
        disciplines: Array,
        electives: Array,
        enrolled: Array,
        en_el:Array,
    },
    components:{
        ToEnrollItem
    },
    created(){
        console.log("en el");
        console.log(this.en_el);
    },
    methods: {
        enroll(discipline_code){
            //console.log("table enroll "+discipline_code)
            this.$emit('enroll',discipline_code);
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