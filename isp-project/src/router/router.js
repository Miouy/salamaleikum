import { createWebHistory, createRouter } from "vue-router";
import SpecialtiesTable from "../components/specialties_manager/SpecialtiesTable";
import AddSpecialty from "../components/specialties_manager/AddSpecialty";
import EditSpecialty from "../components/specialties_manager/EditSpecialty";
import GroupsTable from "../components/groups_manager/GroupsTable";
import AddGroup from "../components/groups_manager/AddGroup";
import EditGroup from "../components/groups_manager/EditGroup";
import Specialties from "../views/Specialties";
import Groups from "../views/Groups";

const routes = [
    // Specialties
    {
        path: '/specialties',
        name: 'Specialties',
        component: Specialties,
    },
    {
        path: '/specialties/all',
        name: 'SpecialtiesTable',
        component: SpecialtiesTable,
    },
    {
        path: '/specialties/add',
        name: 'AddSpecialty',
        component: AddSpecialty,
    },
    {
        path: '/specialties/:specialtyId/edit',
        name: 'EditSpecialty',
        component: EditSpecialty,
    },
    //Groups
    {
        path: '/groups',
        name: 'Groups',
        component: Groups,
    },
    {
        path: '/groups/all',
        name: 'GroupsTable',
        component: GroupsTable,
    },
    {
        path: '/groups/add',
        name: 'AddGroup',
        component: AddGroup,
    },
    {
        path: '/groups/:groupId/edit',
        name: 'EditGroup',
        component: EditGroup,
    },
]

let router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;