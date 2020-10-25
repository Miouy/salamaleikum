<template>
    <div>
        <table class="specialties-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Courses quantity</th>
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
        props: {
            specialties: {
                type: Array,
                required: true,
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