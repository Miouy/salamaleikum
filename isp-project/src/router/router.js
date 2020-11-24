import { createWebHistory, createRouter } from "vue-router";
import SpecialtiesTable from "../components/specialties_manager/SpecialtiesTable";
import AddSpecialty from "../components/specialties_manager/AddSpecialty";
import EditSpecialty from "../components/specialties_manager/EditSpecialty";
import GroupsTable from "../components/groups_manager/GroupsTable";
import AddGroup from "../components/groups_manager/AddGroup";
import EditGroup from "../components/groups_manager/EditGroup";
import Specialties from "../views/Specialties";
import Groups from "../views/Groups";
import Disciplines from "../views/Disciplines";
import DisciplinesTable from "../components/disciplines_manager/DisciplinesTable";
import AddDiscipline from "../components/disciplines_manager/AddDiscipline";
import EditDiscipline from "../components/disciplines_manager/EditDiscipline";
import Advisors from "../views/Advisors";
import AdvisorsTable from "../components/advisors_manager/AdvisorsTable";
import AddAdvisor from "../components/advisors_manager/AddAdvisor";
import EditAdvisor from "../components/advisors_manager/EditAdvisor";
import Students from "../views/Students";
import StudentsTable from "../components/students_manager/StudentsTable";
import SemesterISP from '../components/student/SemesterISP'
import EnrollDisciolines from '../components/enroll_disciplines/EnrollDisciplines'
import EditStudent from "../components/students_manager/EditStudent";
import Authorization from "../views/Authorization";
import StudentLogin from "../components/auth/StudentLogin";
import StudentRegister from "../components/auth/StudentRegister";
import ManagerLogin from "../components/auth/ManagerLogin";

const routes = [
    // Specialties
    {
        path: '/specialties',
        name: 'Specialties',
        component: Specialties,
        children: [
            {
                path: '',
                component: SpecialtiesTable,
            },
            {
                path: 'add',
                component: AddSpecialty,
            },
            {
                path: ':specialtyId/edit',
                name: 'EditSpecialty',
                component: EditSpecialty,
            }
        ]
    },
    //Groups
    {
        path: '/groups',
        name: 'Groups',
        component: Groups,
        children: [
            {
                path: '',
                component: GroupsTable,
            },
            {
                path: 'add',
                component: AddGroup,
            },
            {
                path: ':groupId/edit',
                name: 'EditGroup',
                component: EditGroup,
            }
        ]
    },
    //Disciplines
    {
        path: '/disciplines',
        name: 'Disciplines',
        component: Disciplines,
        children: [
            {
                path: '',
                component: DisciplinesTable,
            },
            {
                path: 'add',
                component: AddDiscipline,
            },
            {
                path: ':disciplineId/edit',
                name: 'EditDiscipline',
                component: EditDiscipline,
            }
        ]
    },
    //Advisors
    {
        path: '/advisors',
        name: 'Advisors',
        component: Advisors,
        children: [
            {
                path: '',
                component: AdvisorsTable,
            },
            {
                path: 'add',
                component: AddAdvisor,
            },
            {
                path: ':advisorId/edit',
                name: 'EditAdvisor',
                component: EditAdvisor,
            }
        ]
    },
    //Students
    {
        path: '/students',
        name: 'Students',
        component: Students,
        children: [
            {
                path: '',
                component: StudentsTable,
            },
            {
                path: ':studentId/edit',
                name: 'EditStudent',
                component: EditStudent,
            }
        ]
    },
    //Authorization
    {
        path: '/auth',
        name: 'Authorization',
        component: Authorization,
        children: [
            {
                name: 'StudentLogin',
                path: '',
                component: StudentLogin,
            },
            {
                path: 'register',
                name: 'StudentRegister',
                component: StudentRegister,
            },
            {
                path: 'manager-login',
                name: 'ManagerLogin',
                component: ManagerLogin,
            }
        ]
    },
    //SemesterISP
    {
        path: '/isp',
        name: 'ISP',
        component: SemesterISP,
    },
    //EnrollDisciolines
    {
        path: '/enroll',
        name: 'EnrollDisciolines',
        component: EnrollDisciolines,
    }
]

let router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;