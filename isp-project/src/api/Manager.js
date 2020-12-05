import Api from "./Api";

export default {
    login(form){

        return Api().post("/auth/manager-login", form);
    },

    logout() {
        return Api().post("/logout");
    }
}