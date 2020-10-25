<template>
    <div class="add-specialty">
        <form action="" @submit.prevent="addNewSpecialty">
            <div class="specialty-field">
                <label for="specialty_code">Specialty Code</label>
                <input id="specialty_code" type="text" v-model="specialty_code">
            </div>
            <div class="specialty-field">
                <label for="specialty_name">Specialty Name</label>
                <input id="specialty_name" type="text" v-model="specialty_name">
            </div>
            <div class="specialty-field">
                <label for="specialty_courses_quantity">Specialty Courses Quantity</label>
                <input id="specialty_courses_quantity" type="number" max="10" min="0"  v-model="specialty_courses_quantity">
            </div>
            <div class="add-button">
                <button type="submit">Add Specialty</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddSpecialty",
        data(){
            return {
                specialty_code: '',
                specialty_name: '',
                specialty_courses_quantity: 0,
            }
        },
        methods: {
            addNewSpecialty(){
                if(this.specialty_code.trim() && this.specialty_name && this.specialty_courses_quantity){
                    const newSpecialty = {
                        specialty_code: this.specialty_code,
                        specialty_name: this.specialty_name,
                        specialty_courses_quantity: this.specialty_courses_quantity,
                    }
                    this.specialty_code = '';
                    this.specialty_name = '';
                    this.specialty_courses_quantity = 0;
                    this.$emit('add-new-specialty', newSpecialty);
                }
            }
        },
    }
</script>

<style lang="scss" scoped>
    .add-specialty {
        font-family: monospace;
        font-size: 18px;
        display: flex;
        justify-content: center;

        form {
            width: 400px;
            padding: 20px;
            border-bottom: 2px solid #009879;

            .specialty-field {
                margin-bottom: 20px;
                label, input {
                    display: block;
                }

                label {
                    margin-bottom: 10px;
                    background-color: #009879;
                    color: #ffffff;;
                    padding: 5px;
                    border-radius: 5px 5px 0 0;
                }

                input {
                    min-width: 100%;
                    min-height: 30px;
                    border: none;
                    outline: none;
                    border-bottom: 1px solid #dddddd;
                    background-color: #F2F8FD;
                    font-family: monospace;
                    font-size: 18px;
                    padding: 5px;
                    box-sizing: border-box;
                }
            }

            .add-button {
                text-align: center;
                margin-top: 40px;
                margin-bottom: 20px;

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
    }
</style>