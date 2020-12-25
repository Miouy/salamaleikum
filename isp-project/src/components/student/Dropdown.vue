<template>
    <div class="menu-item" @click="isOpen = !isOpen">
      <a href="#" v-if="course==null">
        {{ title }}
      </a>
      <a href="#" v-else>
        {{ course }} курс
      </a>
      <i class="fas fa-caret-down"></i>
      <transition name="fade" appear>
        <div class="sub-menu" v-if="isOpen">
          <div v-for="(n,index) in specialty.courses_quantity" :key="index" class="menu-item" @click="sendCourse(n)">
            <a href="#">{{ n }} курс</a>
          </div>
        </div>
      </transition>
    </div>
</template>

<script>
  import Student from '../../api/Student'
  export default {
      name:'dropdown',
      data(){
        return{
          isOpen:false,
          course:null,
        }
      },
      props:{
        title:{
          type:String,
          required:true,
        },
        specialty:{
          type:Object,
          required:true,
        }
      },

      created(){
        
        Student.auth().then(response => {
            this.student = response.data;
            //this.getSpecialty();
        });
          
      },
      methods: {
        // getSpecialty(){

        //     Api().get(`/student/specialties/${this.student.student_id}`).then(data =>{
        //         this.specialty=data.data;
        //         console.log(this.specialty);
        //         console.log("dwdw");
        //         this.loadig=false;
        //     })
        // }
          sendCourse(n){
            this.course=n;
            this.$emit('update-course',this.course);
          }
    }
    }
</script>

<style lang="scss" scoped>
  .menu-item {
    display: block;
    position: relative;
    border:1px solid #009879;
    
    i{
      width: 10px;
      margin-left: 10px;
    }

    a{
      text-decoration: none;
      color: white;
    }

    .sub-menu{
      position: absolute;
      background-color: #fff;
      color: #fff;
      top:100%;
      left: 0;
      width: 100%;
      border-radius: 0px 0px 5px 5px;
      border:1px solid #009879;
      margin:0 -1px;
    
      a{
        text-decoration: none;
        color: #00382d;
        width: 100%;
      }

      & .menu-item:hover{
        color: #fff;
        background-color: rgb(169, 231, 219);
      }

      & .menu-item{
        border:none;
      }
    }
  }

  .fade-enter-active,
  .fade-leave-active{
    transition: all .3s ease-out;
  }

  .fade-enter,
  .fade-leave-to{
    opacity: 0;
  }
</style>
