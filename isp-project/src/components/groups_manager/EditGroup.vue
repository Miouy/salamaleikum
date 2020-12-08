<template>
    <div class="edit-group">
        <form action="" @submit.prevent="editGroup">
            <div class="group-field">
                <label for="group_name">Group Name</label>
                <input id="group_name" type="text" v-model="group_name">
            </div>
            <div class="group-field">
                <label for="group_specialty">Group Specialty</label>
                <select name="group_specialty" id="group_specialty">

                </select>
            </div>
            <div class="edit-button">
                <button type="submit">Edit group</button>
            </div>
        </form>
    </div>
</template>

<script>
    import Api from "../../api/Api";

    export default {
        name: "EditGroup",
        data(){
            return {
                group: {},
                group_name: '',
                specialty_id: 0,
                groupId: this.$route.params.groupId,
                groups: [],
                specialties: []
            }
        },
        created() {
            this.getGroup();
        },
        methods: {
            getGroup(){
                Api()
                    .get("/manager/groups/" + this.groupId + '/edit')
                    .then(data => {
                        this.group = data.data;
                        console.log(this.group);
                    })
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