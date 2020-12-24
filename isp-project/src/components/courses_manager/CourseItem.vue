<template>
    <tr class="advisor-row">
        <td>{{ course.course_id }}</td>
        <td>{{ course.course_name }}</td>
        <td>{{ course.course_code }}</td>
        <td>{{ course.course_education_year }}</td>
        <td>{{ course.specialty_id }}</td>
        <td><button type="button" @click.prevent="goEdit">Edit</button></td>
    </tr>
</template>

<script>
    export default {
        name: "CourseItem",
        props:{
            course:{
                type:Object,
                required:true
            },
        },
        created() {
        },
        methods: {
            goEdit(){
                this.$router.push({path: '/manager/courses/' + this.course.course_id + '/edit', params: {courseId: this.course.course_id}});
            }
        }
    }
</script>

<style lang="scss" scoped>
    .advisor-row {
        &:hover {
            color: #009879;
        }

        td {
            padding: 12px 15px;

            p {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            button {
                color: #009879;
                background-color: #F2F8FD;
                border: 1px solid #009879;
                outline: none;
                padding: 5px;
                font-family: monospace;
                font-size: 18px;

                &:hover {
                    color: #F2F8FD;
                    background-color: #009879;
                }

                &:active {
                    color: #000000;
                }
            }
        }
    }
</style>