<template>
    <div>
        <div v-if="loading">
            <h2 class="text-center">Loading...</h2>
        </div>
        <table class="groups-table" v-else>
            <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <GroupItem
                        v-for="(group, index) in groups"
                        :group="group"
                        :index="index"
                        :key="group.group_id"
                />
            </tbody>
        </table>
    </div>
</template>

<script>
    import GroupItem from "./GroupItem";
    import Api from "../../api/Api";

    export default {
        name: "GroupsTable",
        components: {
            GroupItem
        },
        data(){
            return {
                groups: [],
                loading: false,
            }
        },
        created() {
            this.getGroups();
        },
        methods: {
            getGroups(){
                this.loading = true;

                Api.get("/manager/groups").then(data => {
                    console.log(data);
                    this.groups = data.data;
                    this.loading = false;
                });
            }
        }
    }
</script>

<style lang="scss" scoped>
    .groups-table {
        border-collapse: collapse;
        margin: 25px auto;
        font-size: 18px;
        font-family: monospace;
        min-width: 80%;
        text-align: left;

        th {
            padding: 12px 15px;
        }

        thead {
            tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }
        }

        tbody {
            tr {
                border-bottom: 1px solid #dddddd;

                &:nth-of-type(even) {
                    background-color: #f3f3f3;
                }

                &:last-of-type {
                    border-bottom: 2px solid #009879;
                }
            }
        }
    }
</style>