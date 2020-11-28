<template>
    <form>
        <div>
            <label>student_name</label>
            <input type="text" v-model="form.student_name" name="student_name">
            <span style="color:red" v-if="errors.student_name">
                {{ errors.student_name[0] }}
            </span>
        </div>
        <div>
            <label>student_surname</label>
            <input type="text" v-model="form.student_surname" name="student_surname">
            <span style="color:red" v-if="errors.student_surname">
                {{ errors.student_surname[0] }}
            </span>
        </div>
        <div>
            <label>student_patronymic</label>
            <input type="text" v-model="form.student_patronymic" name="student_patronymic">
            <span style="color:red" v-if="errors.student_patronymic">
                {{ errors.student_patronymic[0] }}
            </span>
        </div>
        <div>
            <label>student_email</label>
            <input type="text" v-model="form.student_email" name="student_email">
            <span style="color:red" v-if="errors.student_email">
                {{ errors.student_email[0] }}
            </span>
        </div>
        <div>
            <label>student_password</label>
            <input type="text" v-model="form.student_password" name="student_password">
            <span style="color:red" v-if="errors.student_password">
                {{ errors.student_password[0] }}
            </span>
        </div>
        <div>
            <label>student_iin</label>
            <input type="text" v-model="form.student_iin" name="student_iin">
            <span style="color:red" v-if="errors.student_iin">
                {{ errors.student_iin[0] }}
            </span>
        </div>
        <div>
            <label>student_phone_num</label>
            <input type="text" v-model="form.student_phone_num" name="student_phone_num">
            <span style="color:red" v-if="errors.student_phone_num">
                {{ errors.student_phone_num[0] }}
            </span>
        </div>
        <button type="submit" @click.prevent="register">Register</button>
    </form>
</template>

<script>

import Student from "../../api/Student";
import Csrf from "../../api/Csrf";

export default {
    data(){
        return{
            form:{
                student_name: "",
                student_surname: "",
                student_patronymic: "",
                student_email: "",
                student_password: "",
                student_iin: "",
                student_phone_num: "",
                student_total_gpa: "3.9",
                group_id: "1",
            },
            errors: [],
        };
    },
    methods:{
        register(){
            Csrf.getCookie().then(() => {
                Student.register(this.form)
                .then(() => {
                    this.$router.push({name: "StudentLogin"});
                })
                .catch(error => {
                    if(error.response.status === 422){
                        this.errors = error.response.data.errors;
                    }
                });
            });
        }
    }
}
</script>