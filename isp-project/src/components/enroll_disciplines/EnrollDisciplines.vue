<template>
    <div>
        <div class="main-tittle">
            <p>Индивидуальный учебный план</p>
        </div>
        <div class="breadcrumb" style="margin: 10px 0;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Рабочая область</a></li>
                <li class="breadcrumb-item active">Запись на курсы</li>
            </ol>
        </div>
        <EnrollTable 
        :disciplines=disciplines
        :electives=electives
        :enrolled=enrolled
        />
    </div>
</template>

<script>

import EnrollTable from './EnrollTable'

export default {
    data(){
        return{
            disciplines: [
                {
                    discipline_code: 'AP 1206',
                    discipline_name: 'Algorithmization and Programming',
                    discipline_type: 'Теоретическое Обучение',
                    semester: 1,
                    num_credits:7,
                    is_elective:false
                },
                {
                    discipline_code: 'Math 1203',
                    discipline_name: 'Mathematics',
                    discipline_type: 'Теоретическое Обучение',
                    semester: 1,
                    num_credits: 5,
                    is_elective:false
                },
                {
                    discipline_code: 'Robo175',
                    discipline_name: 'Robotics',
                    discipline_type: 'Теоретическое Обучение',
                    semester: 1,
                    num_credits:7,
                    is_elective:false
                },
            ],
            electives:[
                {
                    discipline_code: 'Mus86',
                    discipline_name: 'Music',
                    discipline_type: 'Теоретическое Обучение',
                    semester: 1,
                    num_credits:7,
                    is_elective:true
                },
                {
                    discipline_code: 'Draw7485',
                    discipline_name: 'ART',
                    discipline_type: 'Теоретическое Обучение',
                    semester: 1,
                    num_credits:7,
                    is_elective:true
                },
                {
                    discipline_code: 'Prog',
                    discipline_name: 'Programming',
                    discipline_type: 'Теоретическое Обучение',
                    semester: 1,
                    num_credits:7,
                    is_elective:true
                },
            ],
            enrolled:[],
        }
    },
    components:{
        EnrollTable,
    }

}

</script>

<style lang="scss" scoped>
    .main-tittle{
        font-weight: 700;
        font-size: 30px;
        margin: 10px 0;
        font-family: sans-serif;
    }

    .breadcrumb{
        display: flex;
        flex-wrap: wrap;
        padding: 7px 7px;
        list-style: none;
        background-color: #e9ecef;
        border-radius: 5px;
    
        .breadcrumb-item {
            a{
                color: #007bff;
                text-decoration: none;

                &:hover{
                    color: blue;
                    text-decoration: none;
                }
            }

            .active {
                color: #6c757d;
            }
        }
        
        .breadcrumb-item+.breadcrumb-item::before{
            display: inline-block;
            padding-right: .5rem;
            color: #6c757d;
            content: "/";
            margin-left: 10px;
        }

    }

    select.courses-selection{
        font-size: 19px;
        padding: 10px 30px;
        border-radius: 5px;
        background: #009879;
        color: #ffffff;
        font-family: monospace !important;

        option{
            border-bottom: 1px solid #dddddd;
            background: #e9ecef;
            color: black;

            &:nth-of-type(even) {
                background-color: rgb(169, 231, 219) !important;
            }

            &:last-of-type {
                border-bottom: 2px solid rgb(0, 152, 121);
            }

            &:hover{
                background: black;
                color: white;
            }
        }
    }

    .semester-nav{
        display:flex;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
        list-style: none;
        border-bottom: 1px solid #009879;

        li{
            margin-bottom: -1px;

            a{
                display:block;
                color: #000;
                text-decoration: none;
                border: 1px solid transparent;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                padding: 10px;
            }

            a.active{
                background-color: #fff;
                border-color: #009879 #009879 #fff;
                color: #103830;
                font-weight: 700;
            }
        }
    }

    .menu-item{
        display: flex;
        color: white;
        padding: 10px 20px;
        position: relative;
        text-align: center;
        background-color:#009879;
        transition: 0.3s;
        width: max-content;
        border-radius: 5px 5px 0px 0px;
        
    }
</style>