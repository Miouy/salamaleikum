<template>
    <div class="edit-advisor">
        <form action="" @submit.prevent="editAdvisor">
            <div class="advisor-field">
                <label for="advisor_name">Advisor Full Name</label>
                <input id="advisor_name" type="text" v-model="advisor_name">
            </div>
            <div class="advisor-field">
                <div class="advisor-groups" v-for="(advisor_group, index) in advisor_groups" :key="advisor_group.group_id">
                    <label>Advisor Group #{{index + 1}}</label>
                    <select name="advisor_group" v-model="advisor_groups[index].group_id" @change="setGroupValues(index)">
                        <template  v-if="advisor_groups[index].group_id !== -1">
                            <option :value="advisor_groups[index].group_id" :key="advisor_groups[index].group_id" selected>{{advisor_groups[index].group_name}}</option>
                        </template>
                        <option v-for="group in not_selected_groups" :value="group.group_id" :key="group.group_id">{{group.group_name}}</option>
                    </select>
                    <template v-if="advisor_groups.length > 1">
                        <button type="button" @click="removeGroup(index)">-</button>
                    </template>
                    <hr>
                </div>
                <template v-if="advisor_groups.length < 3">
                    <button type="button" @click="addGroup">&plus;</button>
                </template>
            </div>
            <div class="edit-button">
                <button type="submit">Edit Advisor</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "EditAdvisor",
        data() {
            return {
                advisor: {},
                advisor_name: '',
                advisor_groups: [
                ],
                advisorId: this.$route.params.advisorId,
                advisors: [
                    {
                        advisor_id: 1,
                        advisor_name: 'Ryskhan Alikhan',
                        advisor_groups: [
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
                                group_name: "CSSE-1807K",
                                group_specialty: {
                                    specialty_id: 2,
                                    specialty_code: "IS",
                                    specialty_name: "Information systems",
                                    specialty_courses_quantity: 4
                                }
                            },
                        ]
                    },
                    {
                        advisor_id: 2,
                        advisor_name: 'Sarsen Zhalgas',
                        advisor_groups: [
                            {
                                group_id: 3,
                                group_name: "CSSE-1808K",
                                group_specialty: {
                                    specialty_id: 2,
                                    specialty_code: "IS",
                                    specialty_name: "Information systems",
                                    specialty_courses_quantity: 4
                                }
                            },
                        ]
                    }
                ],
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
                        group_name: "CSSE-1807K",
                        group_specialty: {
                            specialty_id: 2,
                            specialty_code: "IS",
                            specialty_name: "Information systems",
                            specialty_courses_quantity: 4
                        }
                    },
                    {
                        group_id: 3,
                        group_name: "CSSE-1808K",
                        group_specialty: {
                            specialty_id: 2,
                            specialty_code: "IS",
                            specialty_name: "Information systems",
                            specialty_courses_quantity: 4
                        }
                    }
                ],
                not_selected_groups: [],
            }
        },
        created() {
            this.getAdvisor();
            this.setNotSelected();
        },
        methods: {
            getAdvisor(){
                let advisorIndex = this.advisors.findIndex(advisor => advisor.advisor_id === Number.parseInt(this.advisorId));
                if(advisorIndex !== -1){
                    this.advisor = this.advisors[advisorIndex];
                    this.advisor_name = this.advisor.advisor_name;
                    this.advisor_groups = this.advisor.advisor_groups;
                }
            },
            addGroup(){
                let ad_groups = this.advisor_groups;
                if(ad_groups.length > 0 && ad_groups[ad_groups.length - 1].group_id === -1){
                    return;
                }

                this.advisor_groups.push({group_id: -1});
            },
            setGroupValues(index){
                let selectedGroupId = this.advisor_groups[index].group_id;
                let foundGroupId = this.groups.findIndex(g => g.group_id === selectedGroupId);
                if(foundGroupId !== -1){
                    this.advisor_groups[index] = this.groups[foundGroupId];
                    this.setNotSelected();
                }
            },
            setNotSelected(){
                this.not_selected_groups = this.groups.filter(
                    g => {
                        let check = this.advisor_groups.filter(advisor_group => advisor_group.group_id === g.group_id);
                        return check.length === 0;
                    }
                );
            },
            removeGroup(index){
                this.advisor_groups.splice(index, 1);
                this.setNotSelected();
            }
        }
    }
</script>

<style lang="scss" scoped>
    .edit-advisor {
        font-family: monospace;
        font-size: 18px;
        display: flex;
        justify-content: center;

        form {
            width: 400px;
            padding: 20px;
            border-bottom: 2px solid #009879;

            .advisor-field {
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

                button {
                    background-color: #F2F8FD;
                    color: #009879;
                    border: 1px solid #009879;
                    border-radius: 5px;
                    padding: 5px 10px;
                    font-weight: bold;
                    margin: 5px 0;
                    outline: none;

                    &:hover {
                        color: #F2F8FD;
                        background-color: #009879;
                    }

                    &:active {
                        color: #000000;
                    }
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