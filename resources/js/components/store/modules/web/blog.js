import vue from 'vue';
import {routes} from "../../../../routes";

const state={
    blogs:[],
};
const getters={

};
const mutations={

    clearBlogList(state){
        state.blogs=[];
    },
};
const actions={
    async getWebBlog({commit}){
            commit("clearBlogList");
            await axios.get('/api/web/dwa/')
                .then(res =>{
                    // let data=res.data;
                    // for(let key in data){
                    //     commit("addSlider",data[key]);
                    // }
                })
        },

};
export default{
    state,
    getters,
    mutations,
    actions
}
