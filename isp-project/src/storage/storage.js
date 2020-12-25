import { createStore } from 'vuex'

const store = createStore({
    state () {
      return {
        authenticated: 'no'
      }
    },
    mutations: {
        setAuthentication(state,status){
            state.authenticated = status;
        }
    }
  })

  export default store;
