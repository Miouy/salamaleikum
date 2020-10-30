<template>
    <div>
        <div>
            <h1 class="specialties-title">Specialties</h1>
            <router-link to="/specialties/">All</router-link>
            <router-link to="/specialties/add">Add</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        name: "SpecialtiesComponent",
        components: {
        },
        methods: {
            addNewSpecialty(newSpecialty) {
                newSpecialty['specialty_id'] = this.last_index;
                this.last_index = this.last_index + 1;
                this.specialties.push(newSpecialty);
            },
            saveSpecialty(editedSpecialty){
                let specialtyIndex = this.specialties.findIndex(s => s.specialty_id === editedSpecialty.specialty_id);
                if(specialtyIndex !== -1) {
                    this.specialties[specialtyIndex].specialty_code = editedSpecialty.specialty_code;
                    this.specialties[specialtyIndex].specialty_name = editedSpecialty.specialty_name;
                    this.specialties[specialtyIndex].specialty_courses_quantity = editedSpecialty.specialty_courses_quantity;
                }
            }
        }
    }
</script>

<style scoped>
    .specialties-title {
        text-align: center;
        font-family: monospace;
    }
</style>