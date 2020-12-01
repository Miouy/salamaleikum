<template>
    <tr class="group-row">
        <td>{{group.group_name}}</td>
        <td>{{group.course_id}}</td>
        <td><button type="button" @click.prevent="goEdit">Edit</button></td>
    </tr>
</template>

<script>
    export default {
        name: "GroupItem",
        props: {
            group: {
                type: Object,
                required: true,
            }
        },
        methods: {
            goEdit(){
                this.$router.push({path: '/manager/groups/' + this.group.group_id + '/edit', params: {groupId: this.group.group_id}});
            }
        }
    }
</script>

<style lang="scss" scoped>
    .group-row {
        &:hover {
            color: #009879;
        }

        td {
            padding: 12px 15px;

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