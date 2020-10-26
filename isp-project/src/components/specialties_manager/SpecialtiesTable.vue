<template>
    <div>
        <table class="specialties-table">
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

    export default {
        name: "SpecialtiesTable",
        components: {
            SpecialtyItem,
        },
        data(){
            return {
                specialties: [
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
                ],
                last_index: 4,
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