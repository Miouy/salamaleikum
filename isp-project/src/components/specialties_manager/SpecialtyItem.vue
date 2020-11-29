<template>
    <tr class="specialty-row">
        <td>{{specialty.code}}</td>
        <td>{{specialty.name}}</td>
        <td>{{specialty.courses_quantity}}</td>
        <td><button type="button" @click.prevent="goEdit">Edit</button></td>
    </tr>
</template>

<script>
    export default {
        name: "SpecialtyItem",
        props: {
            specialty: {
                type: Object,
                required: true,
            }
        },
        created() {
            console.log(this.specialty.specialty_id);
        },
        methods: {
            goEdit(){
                this.$router.push({path: '/manager/specialties/' + this.specialty.specialty_id + '/edit', params: {specialtyId: this.specialty.specialty_id}});
            }
        }
    }
</script>

<style lang="scss" scoped>
    .specialty-row {
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