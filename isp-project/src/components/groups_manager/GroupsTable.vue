<template>
    <div>
        <table class="groups-table">
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

    export default {
        name: "GroupsTable",
        components: {
            GroupItem
        },
        data(){
            return {
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
                last_index: 4,
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