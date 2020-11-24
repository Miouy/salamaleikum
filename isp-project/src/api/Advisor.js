import Api from "./Api";
import Csrf from "./Csrf";

export default {
    async login(form){
        await Csrf.getCookie();

        return Api.post("/auth/advisor-login", form);
    },

    async logout() {
        await Csrf.getCookie();

        return Api.post("/logout");
    }
}