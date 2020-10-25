<template>
    <tr class="specialty-row">
        <td>{{specialty.specialty_code}}</td>
        <td>{{specialty.specialty_name}}</td>
        <td>{{specialty.specialty_courses_quantity}}</td>
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
        }
    }
</style>