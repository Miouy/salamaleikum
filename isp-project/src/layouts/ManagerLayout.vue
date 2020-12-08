<template>
    <div class="wrapper">
        <header class="header">
            <div class="navigation">
                <i class="fas fa-bars" @click="sidebar"></i>
                <h3 class="logo">Individual Study Plan</h3>
            </div>
            <div class="profile">
                <h3>Alikhan Ryskhan</h3>
            </div>
        </header>
        <aside v-if="!sidebar_hidden" class="sidebar">
            <div class="bar-links">
                <div>
                    <router-link class="link" to="/manager/specialties">Specialties</router-link>
                </div>
                <div>
                    <router-link class="link" to="/manager/groups">Groups</router-link>
                </div>
                <div>
                    <router-link class="link" to="/manager/disciplines">Disciplines</router-link>
                </div>
                <div>
                    <router-link class="link" to="/manager/advisors">Advisors</router-link>
                </div>
                <div>
                    <router-link class="link" to="/manager/students">Students</router-link>
                </div>
            </div>
        </aside>
        <div class="main">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ManagerLayout",
        data(){
            return {
                "sidebar_hidden" : true,
            }
        },
        methods: {
            sidebar(){
                this.sidebar_hidden = !this.sidebar_hidden;
            }
        }
    }
</script>

<style lang="scss" scoped>

    .wrapper {
        position: relative;

        .header {
            display: flex;
            justify-content: space-between;
            padding: 5px;
            background-color: #009879;
            color: #ffffff;

            .navigation {
                display: flex;
                justify-content: space-around;
                align-items: center;
                min-width: 300px;
            }
        }

        .sidebar {
            position: absolute;
            background-color: #009879;

            .bar-links {
                padding: 20px;

                div {
                    margin-bottom: 20px;
                }

                .link {
                    color: #ffffff;
                    text-decoration: none;
                }
            }
        }

        .main {
            padding: 15px;
        }
    }

</style>