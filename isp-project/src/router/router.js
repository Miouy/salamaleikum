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
import AdvisorsTable from "../components/courses_manager/CoursesTable";
import AddAdvisor from "../components/courses_manager/AddCourse";
import EditAdvisor from "../components/courses_manager/EditCourse";
import Students from "../views/Students";
import StudentsTable from "../components/students_manager/StudentsTable";
import SemesterISP from '../components/student/SemesterISP'
import EnrollDisciplines from '../components/enroll_disciplines/EnrollDisciplines'
import EditStudent from "../components/students_manager/EditStudent";
import StudentLogin from "../components/auth/StudentLogin";
import StudentRegister from "../components/auth/StudentRegister";
import ManagerLogin from "../components/auth/ManagerLogin";
import AdvisorLogin from "../components/auth/AdvisorLogin";
import ManagerLayout from "../layouts/ManagerLayout";
import AuthLayout from "../layouts/AuthLayout";
import Courses from "../views/Courses";
import CoursesTable from "../components/courses_manager/CoursesTable";
import AddCourse from "../components/courses_manager/AddCourse";
import EditCourse from "../components/courses_manager/EditCourse";
import Semesters from "../views/Semesters";
import SemestersTable from "../components/semesters_manager/SemestersTable";
import AddSemester from "../components/semesters_manager/AddSemester";
import EditSemester from "../components/semesters_manager/EditSemester";

const routes = [
    {
        path: '/manager',
        name: 'Manager',
        component: ManagerLayout,
        meta: {auth: 'manager'},
        children: [
            // Specialties
            {
                path: 'specialties',
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
            {
                path: 'courses',
                name: 'Courses',
                component: Courses,
                children: [
                    {
                        path: '',
                        component: CoursesTable,
                    },
                    {
                        path: 'add',
                        component: AddCourse,
                    },
                    {
                        path: ':courseId/edit',
                        name: 'EditCourse',
                        component: EditCourse,
                    }
                ]
            },
            {
                path: 'semesters',
                name: 'Semesters',
                component: Semesters,
                children: [
                    {
                        path: '',
                        component: SemestersTable,
                    },
                    {
                        path: 'add',
                        component: AddSemester,
                    },
                    {
                        path: ':semesterId/edit',
                        name: 'EditSemester',
                        component: EditSemester,
                    }
                ]
            },
            //Groups
            {
                path: 'groups',
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
                path: 'disciplines',
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
                path: 'advisors',
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
                path: 'students',
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
            }
        ]
    },
    //Authorization
    {
        path: '/auth',
        name: 'Authorization',
        component: AuthLayout,
        children: [
            {
                name: 'StudentLogin',
                path: 'student-login',
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
            },
            {
                path: 'advisor-login',
                name: 'AdvisorLogin',
                component: AdvisorLogin,
            }
        ]
    },
    //SemesterISP
    {
        path: '/isp',
        name: 'ISP',
        meta:{auth:'student'},
        component: SemesterISP,
    },
    //EnrollDisciolines
    {
        path: '/enroll',
        name: 'EnrollDisciplines',
        component: EnrollDisciplines,
    }
]

let router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;