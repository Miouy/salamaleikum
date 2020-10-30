<template>
    <tr class="discipline-row">
        <td>{{ discipline.discipline_code }}</td>
        <td>{{ discipline.discipline_name }}</td>
        <td>{{ discipline.discipline_type }}</td>
        <td>{{ discipline.discipline_teacher }}</td>
        <td>{{ discipline.semester }}</td>
        <td>{{ discipline.num_credits }}</td>
        <td><button type="button" @click.prevent="goEdit">Edit</button></td>
    </tr>
</template>

<script>
    export default {
        name: "DisciplineItem",
        props:{
            discipline:{
                type:Object,
                required:true
            },
            index: Number
        },
        methods: {
            goEdit(){
                this.$router.push({name: 'EditDiscipline', params: {disciplineId: this.discipline.discipline_id}});
            }
        }
    }
</script>

<style lang="scss" scoped>
    .discipline-row {
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