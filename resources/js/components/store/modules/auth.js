import vue from 'vue';
import {routes} from "../../../routes";

const state={
    token:"",
    user:"",
};

const getters={
    getToken(state){
        return state.token !== "";
    },
    getUser(state){
        return state.token !== "";
    }

};
const mutations={
    setToken(state,token){
        state.token=token;
    },
    clearToken(state){
        state.token="";
    },
    setUser(state,user){
        state.user=user;
    },
    clearUser(state){
        state.user="";
    }


};
const actions={

    // async initAuth({commit,dispatch}){
    //     let token=localStorage.getItem("token");
    //     let user=localStorage.getItem("user");
    //     if (token && user){
    //         commit("setToken",token);
    //         commit("setUser",user);
    //     }else{
    //         commit("clearToken");
    //         commit("clearUser");
    //     }
    // },
     async login({commit},payload){  //commit mutation çagırmak için
        return axios.post("/api/auth/login",payload)
            .then(res => {
                User.responseAfterLogin(res);
                // commit("setToken",User.loggedIn());
            })
            // .catch(e=>{
            //     // console.log(e.response.data);
            // })
    },
     async singup({commit} ,payload){

         axios.post("/api/auth/singup",payload)
            .then(res => {
                User.responseAfterLogin(res);
                // commit("setToken",User.loggedIn());
            })


    },
    //
    // //şifre degişitrme yapılacak
    // async passwordChange({commit,dispatch,state} ,payload){
    //     console.log(typeof payload.id)
    //     axios.delete("http://127.0.0.1:8000/api/article/"+payload.id)
    //         .then(res =>{
    //             console.log(res)
    //             commit("deleteArticle",payload.id);;
    //         })
    //         .catch(e=>{
    //             console.log(e);
    //         })
    //
    // },
    // logout({commit,dispatch,state}){
    //     commit("clearToken");
    //     commit("userToken");
    //     localStorage.removeItem("token");
    //     localStorage.removeItem("user");
    // }

};

export default{
    state,
    getters,
    mutations,
    actions
}
