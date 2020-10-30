<template>
    <div>
        <RetakesTable :retakes="disciplines"/>
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

export default {
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
            retake_cost:21500,
        }
    },
    components:{
        RetakesTable
    },
    methods:{
        retakeCost(index){
            return this.disciplines[index].num_credits*this.retake_cost;
        },
        totalPrice(){
            var c=0;
            for (var i = 0; i < this.disciplines.length; i++) {
                c+=this.disciplines[i].num_credits*this.retake_cost;
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