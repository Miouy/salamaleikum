<template>
    <div class="edit-group">
        <form action="" @submit.prevent="editGroup">
            <div class="group-field">
                <label for="group_name">Group Name</label>
                <input id="group_name" type="text" v-model="group_name">
            </div>
            <div class="group-field">
                <label for="group_specialty">Group Specialty</label>
                <select name="group_specialty" id="group_specialty" v-model="group_specialty">
                    <option v-for="(option, index) in specialty_options"
                            :value="index"
                            :key="option.specialty_id"
                            :selected="option.specialty_id === group.group_specialty.specialty_id"
                    >{{ option.specialty_name }}</option>
                </select>
            </div>
            <div class="edit-button">
                <button type="submit">Edit group</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "EditGroup",
        data(){
            return {
                group: {},
                group_name: '',
                group_specialty: '',
                groupId: this.$route.params.groupId,
                groups: [
                    {
                        group_id: 1,
                        group_name: "CSSE-1806K",
                        group_specialty: {
                            specialty_id: 2,
                            specialty_code: "IS",
                            specialty_name: "Information systems",
                            specialty_courses_quantity: 4
                        }
                    },
                    {
                        group_id: 2,
                        group_name: "CSSE-1806K",
                        group_specialty: {
                            specialty_id: 2,
                            specialty_code: "IS",
                            specialty_name: "Information systems",
                            specialty_courses_quantity: 4
                        }
                    },
                    {
                        group_id: 3,
                        group_name: "CSSE-1806K",
                        group_specialty: {
                            specialty_id: 2,
                            specialty_code: "IS",
                            specialty_name: "Information systems",
                            specialty_courses_quantity: 4
                        }
                    }
                ],
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
        created() {
            let groupIndex = this.groups.findIndex(g => g.group_id === Number.parseInt(this.groupId));
            if(groupIndex !== -1){
                this.group = this.groups[groupIndex];
                this.group_name = this.group.group_name;
                this.group_specialty = this.group.group_specialty;
            }
            this.specialty_options.forEach(option => console.log(option.specialty_id));
        },
        methods: {
            editGroup(){

            }
        }
    }
</script>

<style lang="scss" scoped>
    .edit-group {
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
                }

                select {
                    width: 100%;
                }
            }

            .edit-button {
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