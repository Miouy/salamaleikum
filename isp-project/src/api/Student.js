import Api from "../api/Api";
import Csrf from "../api/Csrf"

export default{
    async register(form){
        await Csrf.getCookie();

        return Api.post("/auth/student-register",form);
    },

    async login(form){
        await Csrf.getCookie();

        return Api.post("/auth/student-login", form);
    },

    async logout() {
        await Csrf.getCookie();

        return Api.post("/logout");
    }
};