import Api from "./Api";

export default {
    login(form){
        return Api().post("/auth/advisor-login", form);
    },

    logout() {
        return Api().post("/logout");
    },

    auth(){
        return Api().get("/advisor");
    }
}