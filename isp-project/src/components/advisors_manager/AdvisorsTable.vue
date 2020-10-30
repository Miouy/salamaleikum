<template>
    <div>
        <table class="advisors-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Groups</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <AdvisorItem
                        v-for="advisor in advisors"
                        :advisor="advisor"
                        :key="advisor.advisor_name"
                />
            </tbody>
        </table>
    </div>
</template>

<script>
    import AdvisorItem from "./AdvisorItem";

    export default {
        name: "AdvisorsTable",
        components: {
            AdvisorItem,
        },
        data(){
            return {
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
                                group_name: "CSSE-1806K",
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
                                group_name: "CSSE-1806K",
                                group_specialty: {
                                    specialty_id: 2,
                                    specialty_code: "IS",
                                    specialty_name: "Information systems",
                                    specialty_courses_quantity: 4
                                }
                            },
                        ]
                    }
                ]
            }
        },
    }
</script>

<style lang="scss" scoped>
    .advisors-table {
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