<template>
    <div class="add-group">
        <form action="" @submit.prevent="addNewGroup">
            <div class="group-field">
                <label for="group_name">Group Name</label>
                <input id="group_name" type="text" v-model="group_name">
            </div>
            <div class="group-field">
                <label for="group_specialty">Group Specialty</label>
                <select name="group_specialty" id="group_specialty" v-model="group_specialty">
                    <option v-for="(option, index) in specialty_options" :value="index" :key="option.specialty_id">{{option.specialty_name}}</option>
                </select>
            </div>
            <div class="add-button">
                <button type="submit">Add group</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddGroup",
        data(){
            return {
                group_name: '',
                group_specialty: '',
                specialty_options: [
                    {
                        specialty_id: 1,
                        specialty_code: "CSSE",
                        specialty_name: "Computer Science and Software Engineering",
                        specialty_courses_quantity: 4
                    },
                    {
                        specialty_id: 2,
                        specialty_code: "IS",
                        specialty_name: "Information systems",
                        specialty_courses_quantity: 4
                    },
                    {
                        specialty_id: 3,
                        specialty_code: "CS",
                        specialty_name: "Computer Science",
                        specialty_courses_quantity: 4
                    }
                ]
            }
        },
        methods: {
            addNewGroup(){

            }
        }
    }
</script>

<style lang="scss" scoped>
    .add-group {
        font-family: monospace;
        font-size: 18px;
        display: flex;
        justify-content: center;

        form {
            width: 400px;
            padding: 20px;
            border-bottom: 2px solid #009879;

            .group-field {
                margin-bottom: 20px;
                label, input {
                    display: block;
                }

                label {
                    margin-bottom: 10px;
                    background-color: #009879;
                    color: #ffffff;;
                    padding: 5px;
                    border-radius: 5px 5px 0 0;
                }

                input, select {
                    min-width: 100%;
                    min-height: 30px;
                    border: none;
                    outline: none;
                    border-bottom: 1px solid #dddddd;
                    background-color: #F2F8FD;
                    font-family: monospace;
                    font-size: 18px;
                    padding: 5px;
                    box-sizing: border-box;
                    width: 100%;
                }
            }

            .add-button {
                text-align: center;
                margin-top: 40px;
                margin-bottom: 20px;

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
    }
</style>