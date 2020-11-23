<template>
    <form>
        <div>
            <label>student_name</label>
            <input type="text" v-model="form.student_name" name="student_name">
        </div>
        <div>
            <label>student_surname</label>
            <input type="text" v-model="form.student_surname" name="student_surname">
        </div>
        <div>
            <label>student_patronymic</label>
            <input type="text" v-model="form.student_patronymic" name="student_patronymic">
        </div>
        <div>
            <label>student_email</label>
            <input type="text" v-model="form.student_email" name="student_email">
        </div>
        <div>
            <label>student_password</label>
            <input type="text" v-model="form.student_password" name="student_password">
        </div>
        <div>
            <label>student_iin</label>
            <input type="text" v-model="form.student_iin" name="student_iin">
        </div>
        <div>
            <label>student_phone_num</label>
            <input type="text" v-model="form.student_phone_num" name="student_phone_num">
        </div>
    </form>
</template>

<script>
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
            }
        }
    }
}
</script>