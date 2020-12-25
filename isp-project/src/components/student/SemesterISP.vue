<template>
    <div>
        <div class="main-tittle">
            <p>Индивидуальный учебный план</p>
        </div>
        <div class="breadcrumb" style="margin: 10px 0;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Рабочая область</a></li>
                <li class="breadcrumb-item active">Индивидуальный учебный план</li>
            </ol>
        </div>
        <div>
            <Dropdown 
                title="Courses" 
                :specialty="specialty[0]"
                @update-course="updateCourse"
            />
        </div>
        <div style="margin:30px 0">
            <ul class="semester-nav">
                <li class="one-semester">
                    <a href="#" @click="table='1'" :class="{'active':table=='1'}">1 семестр</a>
                </li>
                <li class="one-semester">
                    <a href="#" @click="table='2'" :class="{'active':table=='2'}">2 семестр</a>
                </li>
                <li class="one-semester">
                    <a href="#" :class="{'active':table=='3'}" @click="table='3'">Летний семестр</a>
                </li>
            </ul>
        </div>
        <DisciplinesTable 
            v-model="curCurs"
            v-if="table=='1'"
            :table="table"
            :specialty="specialty[0]"
            :student="student"
            v-bind:curCurs="curCurs"
        />
        <DisciplinesTable 
            v-model="curCurs"
            v-else-if="table=='2'"
            :table="table"
            :specialty="specialty[0]"
            :student="student"    
            v-bind:curCurs="curCurs"
        />
        <Retakes 
            v-else-if="table=='3'"
            :curCurs = "curCurs"
        />
    </div>
</template>

<script>

import DisciplinesTable from './DisciplinesTable'
import Retakes from './Retakes'
import Dropdown from './Dropdown'
  import Api from '../../api/Api'
import Student from '../../api/Student'

export default {
    data(){
        return{
            table:'1',
            student:{},
            specialty:{},
            curCurs:1,
        }
    },
    components:{
        DisciplinesTable,
        Retakes,
        Dropdown
    },
    created(){
        Student.auth().then(response => {
            this.student = response.data;
            this.getSpecialty();
        });
    },
    methods: {
        methodToRunOnSelect(payload) {
            this.object = payload;
        },

        getSpecialty(){

            Api().get(`/student/specialties/${this.student.student_id}`).then(data =>{
                this.specialty=data.data;
                console.log(this.specialty);
                console.log("dwdw");
                this.loadig=false;
            })
        },

        updateCourse(n){
            this.curCurs = n;
            console.log(this.curCurs);
            
        }
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