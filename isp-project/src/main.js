import {createApp} from 'vue'
import App from './App.vue'
import router from "./router/router";

const app = createApp(App);
app.use(router).mount('#app');
/*
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

 */