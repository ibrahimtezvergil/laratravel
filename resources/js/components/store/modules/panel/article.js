import vue from 'vue';
import {routes} from "../../../../routes";

const state={
    articles:[],
    article:[]

};

const getters={

    getArticles(){
        return state.articles;
    },

};
const mutations={
    updateArticleList(state,payload){
        state.articles=payload;
    },
    clearArticleList(state){
        state.articles=[];
    },
    deleteArticle(state,articleId){

        let articles=state.articles.filter(d=> d.id !=articleId);
        state.articles=articles;
    },



};
const actions={
    async getArticles({commit,state}){  //commit mutation çagırmak için
                commit("clearArticleList");
           return await axios.get("/api/article")
                .then( res  => {
                    console.log(res.data)
                        commit("updateArticleList",res.data);
                }).catch(e =>{
                   console.log(e.response.data);
               })
    },
     saveArticle({commit,dispatch} ,payload){
        axios.post("http://127.0.0.1:8000/api/article", payload)
             .then(res => {
                 console.log(res.data);
                         Toast.fire({
                             icon: 'success',
                             title: 'Kayıt Başarılı...'
                         })
             }).catch(e=>{
        });

    },
    async deleteArticle({commit} ,payload){
        axios.delete("http://127.0.0.1:8000/api/article/"+payload.id)
            .then(res =>{
                commit("deleteArticle",payload.id);
            })
            .catch(e=>{
                console.log(e);
            })

    },
    async updateArticle({commit} ,[payload,id]){

        axios.put("http://127.0.0.1:8000/api/article/"+id, payload)
            .then(res => {
                console.log(res.data);
                // Toast.fire({
                //     icon: 'success',
                //     title: 'Kayıt Başarılı...'
                // })
                // commit("clearArticleList");
                // dispatch("getArticles");
            });
    },



};

export default{
    state,
    getters,
    mutations,
    actions
}
