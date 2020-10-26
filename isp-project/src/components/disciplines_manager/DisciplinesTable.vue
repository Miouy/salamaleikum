<template>
    <div>
        <table class="disciplines-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "DisciplinesTable",
        data(){
            return {
                disciplines: [
                    {
                        discipline_id: 1,
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>