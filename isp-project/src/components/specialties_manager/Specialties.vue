<template>
    <div>
        <div>
            <h1 class="specialties-title">Specialties</h1>
            <router-link to="/specialties/all" :specialties="specialties">All</router-link>
            <router-link to="/specialties/add"  @add-new-specialty="addNewSpecialty">Add</router-link>
            <router-link to="/specialties/1/edit" :specialty="specialties[1]" @save-specialty="saveSpecialty">Edit</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    //import SpecialtiesTable from "./SpecialtiesTable";
    //import AddSpecialty from "./AddSpecialty";
    //import EditSpecialty from "./EditSpecialty";

    export default {
        name: "SpecialtiesComponent",
        components: {
            //SpecialtiesTable,
            //AddSpecialty,
            //EditSpecialty,
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