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
                    <router-link class="link" to="/enroll">Enroll</router-link>
                </div>
            </div>
        </aside>
        <div class="main">
            <router-view></router-view>
        </div>
    </div>
</template>