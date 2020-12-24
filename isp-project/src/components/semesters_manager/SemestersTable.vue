<template>
    <div>
        <div v-if="loading">
            <h2 class="text-center">Loading...</h2>
        </div>
        <table class="advisors-table" v-else>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Num</th>
                    <th>Total credits</th>
                    <th>Course Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <SemesterItem
                        v-for="semester in semesters"
                        :course="semester"
                        :key="semester.semester_name"
                />
            </tbody>
        </table>
    </div>
</template>

<script>
    import SemesterItem from "./SemesterItem";
    import Api from "../../api/Api";

    export default {
        name: "SemestersTable",
        components: {
            SemesterItem,
        },
        data(){
            return {
                semesters: [],
                loading: false,
            }
        },
        created() {
            this.getSemesters();
        },
        methods: {
            getSemesters(){
                this.loading = true;

                Api().get("/manager/semesters").then(data => {
                    this.semesters = data.data;
                    this.loading = false;
                });
            }
        }
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