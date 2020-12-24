<template>
    
    <div>

        <div class="form">
            
            <div id="login">
                <h1>Welcome Back</h1>
                <form>
                    <div class="form-row">
                        <div class="field-wrap">
                            <label>
                                Student Name<span class="req">*</span>
                            </label>
                            <input type="text" v-model="form.student_name" name="student_name" required autocomplete="off"/>
                            <span class="text-danger" v-if="errors.student_name">
                                {{ errors.student_name[0] }}
                            </span>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Student Surname<span class="req">*</span>
                            </label>
                            <input type="text" v-model="form.student_surname" name="student_surname" required autocomplete="off"/>
                            <span class="text-danger" v-if="errors.student_surname">
                                {{ errors.student_surname[0] }}
                            </span>
                        </div>
                    </div>
                    

                    <div class="field-wrap">
                        <label>
                            Student Patronymic<span class="req">*</span>
                        </label>
                        <input type="text" v-model="form.student_patronymic" name="student_patronymic" required autocomplete="off"/>
                        <span class="text-danger" v-if="errors.student_patronymic">
                            {{ errors.student_patronymic[0] }}
                        </span>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Student Email<span class="req">*</span>
                        </label>
                        <input type="email" v-model="form.student_email" name="student_email" required autocomplete="off"/>
                        <span class="text-danger" v-if="errors.student_email">
                            {{ errors.student_email[0] }}
                        </span>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Student Password<span class="req">*</span>
                        </label>
                        <input type="password" v-model="form.student_password" name="student_password" required autocomplete="off"/>
                        <span class="text-danger" v-if="errors.student_name">
                            {{ errors.student_name[0] }}
                        </span>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Student IIN<span class="req">*</span>
                        </label>
                        <input type="text" v-model="form.student_iin" name="student_iin" required autocomplete="off"/>
                        <span class="text-danger" v-if="errors.student_iin">
                            {{ errors.student_iin[0] }}
                        </span>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Student Phone Num<span class="req">*</span>
                        </label>
                        <input type="text" v-model="form.student_phone_num" name="student_phone_num" required autocomplete="off"/>
                        <span class="text-danger" v-if="errors.student_phone_num">
                            {{ errors.student_phone_num[0] }}
                        </span>
                    </div>
                
                    <button class="button button-block" type="submit" @click.prevent="register">Sign Up</button>
                
                </form>
            </div>
            
        </div>

    </div>

</template>

<script>

import Student from "../../api/Student";

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
            Student.register(this.form)
            .then(() => {
                this.$router.push({name: "StudentLogin"});
            })
            .catch(error => {
                if(error.response.status === 422){
                    this.errors = error.response.data.errors;
                }
            });
        }
    }
}
</script>

<style lang="scss" scoped>

    $h1_size:200;
    $main_green:#1ab188;
    $gray-light: #a0b3b0;
    $main_dark:darken($main_green,5%);

    .form-row{
        display: flex;
        justify-content: space-between;
    }

    .form{
        background:rgba(#13232f,.9);
        padding: 40px;
        max-width:600px;
        margin:40px auto;
        border-radius:4px;
        box-shadow:0 4px 10px 4px rgba(#13232f,.3);

        .text-danger{
            margin-left: 5px;
            color: rgba(189, 19, 19, 0.9);
            max-width: 250px;
            width: 100%;
        }

        a {
            text-decoration:none;
            color:$main_green;
            transition:.5s ease;
            &:hover {
                color:$main_dark;
            }
        }

        h1 {
            text-align:center;
            color:#ffffff;
            font-weight:$h1_size;
            margin:0 0 40px;
        }

        label{
            color: #ffffff;
            display: block;
            font-size:22px;
            .req{
                color: $main_green;
            }
        }

        input{
            font-size: 22px;
            display:block;
            width:100%;
            margin-top:15px;
            margin-bottom:5px;
            padding:5px 0px;
            background:none;
            background-image:none;
            border:1px solid $gray-light;
            color:#ffffff;
            border-radius:0;
            text-indent:5px;
            transition:border-color .25s ease, box-shadow .25s ease;
            &:focus {
                    outline:0;
                    border-color:$main_green;
            }
        }

        .field-wrap {
            position:relative;
            margin-bottom:25px;
        }

        .forgot {
            margin-top:-15px;
            text-align:right;
        }

        .button{
            border:0;
            outline:none;
            border-radius:0;
            padding:15px 0;
            font-size:2rem;
            font-weight:600;
            width: 100%;
            text-transform:uppercase;
            letter-spacing:.1em;
            background:$main_green;
            color:#ffffff;
            transition:all.5s ease;
            -webkit-appearance: none;
            &:hover, &:focus {
                background:$main_dark;
            }
        }
    }

</style>