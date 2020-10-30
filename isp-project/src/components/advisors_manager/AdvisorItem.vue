<template>
    <tr class="advisor-row">
        <td>{{ advisor.advisor_id }}</td>
        <td>{{ advisor.advisor_name }}</td>
        <td>
            <p v-for="group in advisor.advisor_groups" :key="group.group_id">{{group.group_name}}</p>
        </td>
        <td><button type="button" @click.prevent="goEdit">Edit</button></td>
    </tr>
</template>

<script>
    export default {
        name: "AdvisorItem",
        props:{
            advisor:{
                type:Object,
                required:true
            },
        },
        created() {
            console.log(this.advisor.groups);
        },
        methods: {
            goEdit(){
                this.$router.push({name: 'EditAdvisor', params: {advisorId: this.advisor.advisor_id}});
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