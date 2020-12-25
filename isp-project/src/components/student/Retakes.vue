<template>
    <div>
        <RetakesTable 
            :disciplines="disciplines"
            :student_marks="student_marks"
            :student="student"
        />
        <div class="retakes-info">
            <div class="info-block">
                <span class="title">Retake cost:</span>
                <span class="content">21500 KZT</span>
            </div>
            <div class="info-block">
                <span class="title">Retakes:</span>
                <div class="retakes-costs">
                    <span class="content" v-for="(discipline,index) in disciplines" :key="index">
                        <span style="display: flex"><span class="discipline-name">{{ discipline.discipline_name }}:</span>  <span>{{retakeCost(index)}}&nbsp;KZT</span></span>
                    </span>
                    <span class="content">
                        <span style="display: flex;"><span class="discipline-name">Total Price:</span>  <span><mark>{{totalPrice()}}&nbsp;KZT</mark></span></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import RetakesTable from './RetakesTable'
import Api from '../../api/Api';
import Student from '../../api/Student'

export default {
    data(){
        return{
            student:{},
            disciplines:[],
            retake_sum:0,
            student_marks:[],
            retake_cost:21500,
        }
    },
    props:{
        curCurs:{
            type:Number,
            required:true,
        },
    },
    components:{
        RetakesTable
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

            Api().get(`/student/courseretake/${this.student.student_id}/${this.curCurs}`).then(data =>{
                console.log(data);
                this.disciplines=data.data.disciplines;
                this.student_marks=data.data.student_marks;
                this.retake_sum=data.data.retake_sum;
                console.log(this.disciplines[0]);
            })
        },

        retakeCost(index){
            return this.disciplines[index].discipline_credit*this.retake_cost;
        },
        totalPrice(){
            var c=0;
            for (var i = 0; i < this.disciplines.length; i++) {
                c+=this.disciplines[i].discipline_credit*this.retake_cost;
            }
            return c;
        }
    }
    
}
</script>

<style lang="scss" scoped>
    .retakes-info{
        margin-top: 30px;
        padding: 30px;
        font-size: 21px;
        font-weight: 700;
        font-family: monospace;
        background-color: #cfe9e4;
        //cfe7e3
        border-radius: 5px;

        .info-block{
            display: flex;
            flex-wrap: wrap;

            .retakes-costs{
                display: flex;
                flex-direction: column;

                .content{
                    padding: 5px;
                    width: 100%;
                }

                .discipline-name{
                        max-width: 600px;
                        width: 100%;
                        margin-right: 90px;
                }
            }

            .title{
                max-width: 300px;
                width: 100%;
            }

            .content{
                padding: 5px;
                width: 60%;
            }

            &::after{
                content: "";
                width: 100%;
                border: 1px solid black;
                margin: 15px 0;
            }
        }
    }
    mark{
        background-color: rgba(211, 211, 122,0.9)
    }
</style>