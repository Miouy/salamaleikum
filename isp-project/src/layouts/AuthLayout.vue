<template>
    <div class="auth-bg">
        <h1 class="auth-title">Authorization</h1>
        <div class="tab-group">
            <div class="tab"><router-link class="rl" to="/auth/student-login">Student Login</router-link></div>
            <div class="tab"><router-link class="rl" to="/auth/register">Register</router-link></div>
            <div class="tab"><router-link class="rl" to="/auth/manager-login">Manager Login</router-link></div>
            <div class="tab"><router-link class="rl" to="/auth/advisor-login">Advisor Login</router-link></div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Authorization"
    }
</script>

<style lang="scss" scoped>

    $main: #1ab188;
    $main-light: lighten($main,5%);
    $main-dark: darken($main,5%);

    $gray-light: #a0b3b0;

    .auth-title {
        text-align: center;
        font-family: monospace;
        margin-bottom: 50px;
    }

    .tab-group{
        padding:0;
        margin:0 0 40px 0;
        display: flex;
        max-width:680px;
        margin-left: auto;
        margin-right: auto;
        .tab .rl {
            text-decoration:none;
            width: auto;
            background:rgba(19, 35, 47, 0.9);
            color:$gray-light;
            font-size:20px;
            padding: 20px;
            text-align:center;
            cursor:pointer;
            transition:.5s ease;
            &:hover {
                background:$main-dark;
                color:#ffffff;
            }
            
        }
        .tab{
            &:first-child .rl{
                border-radius:4px 0 0 4px;
            }
            &:last-child .rl{
                border-radius:0 4px 4px 0;
            }

            .router-link-active{
                background: rgba(26, 177, 136, 0.9);
            }

            .router-link-exact-active{
                background: darken($main,5%);;
                color: white;
            }
        }
        
    }
</style>