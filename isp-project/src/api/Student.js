import Api from "../api/Api";

export default{
    register(form){
        return Api().post("/auth/student-register",form);
    },

    login(form){
        return Api().post("/auth/student-login", form);
    },

    logout() {
        return Api().post("/logout");
    },

    auth(){
        return Api().get("/student");
    }
};