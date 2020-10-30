<template>
    <div class="menu-item" @click="isOpen = !isOpen">
      <a href="#" v-if="course==null">
        {{ title }}
      </a>
      <a href="#" v-else>
        {{ course.title }}
      </a>
      <i class="fas fa-caret-down"></i>
      <transition name="fade" appear>
        <div class="sub-menu" v-if="isOpen">
          <div v-for="(item,index) in items" :key="index" class="menu-item" @click="course=item">
            <a :href="item.link">{{ item.title }}</a>
          </div>
        </div>
      </transition>
    </div>
</template>

<script>
    export default {
      name:'dropdown',
      data(){
        return{
          isOpen:false,
          course:null,
        }
      },
      props:['title','items'],     
      methods: {
        
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
