import {createApp} from 'vue'
import App from './App.vue'
import router from "./router/router";
import Vuex from "vuex"

Vuex.use(Vuex);

const store = new Vuex.Store(
    {
        state: {
            authenticated: 'no'
        },
        mutations: {
            setAuthentication(state,status){
                state.authenticated = status;
            }
        }
    }
)

const app = createApp(App);
app.use(router).mount('#app');
app.use(store).mount('#app');