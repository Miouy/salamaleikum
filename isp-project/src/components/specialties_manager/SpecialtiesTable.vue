<template>
    <div>
        <div v-if="loading">
            <h2 class="text-center">Loading...</h2>
        </div>
        <table class="specialties-table" v-else>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Courses quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <SpecialtyItem
                        v-for="(specialty, index) in specialties"
                        :specialty="specialty"
                        :index="index"
                        :key="specialty.specialty_id"
                />
            </tbody>
        </table>
    </div>
</template>

<script>
    import SpecialtyItem from "./SpecialtyItem";
    import Api from "../../api/Api";

    export default {
        name: "SpecialtiesTable",
        components: {
            SpecialtyItem,
        },
        data() {
            return {
                specialties: [],
                loading: false,
            }
        },
        created() {
            this.getSpecialties();
        },
        methods: {
            getSpecialties(){
                this.loading = true;

                Api().get("/manager/specialties").then(data => {
                    console.log(data);
                    this.specialties = data.data;
                    this.loading = false;
                });
            }
        }
    }
</script>

<style lang="scss" scoped>
    .specialties-table {
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