import Vue from 'vue'
import VueRouter from 'vue-router'
import SpecialtiesTable from "../components/specialties_manager/SpecialtiesTable";
import AddSpecialty from "../components/specialties_manager/AddSpecialty";
import EditSpecialty from "../components/specialties_manager/EditSpecialty";

const routes = [
    { path: '/specialties/all', component: SpecialtiesTable },
    { path: '/specialties/add', component: AddSpecialty },
    { path: '/specialties/1/edit', component: EditSpecialty },
]

Vue.use(VueRouter);

let router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes,
})

export default router;