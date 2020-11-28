import Api from "../api/Api";

export default{
    register(form){
        return Api.post("/register",form);
    }
};