import vue from 'vue';
import {routes} from "../../../../routes";

const state={
    categories:[],
    slider:[],
    settings:{}
};
const getters={
    getCategoryList(){
        return state.categories;
    },
    getSettings() {
        return state.settings;
    },
    getSliders() {
        return state.slider;
    }
};
const mutations={
    updateCategories(state,category){
        let cat=state.categories;
        state.categories=[];
        let index =cat.findIndex(c => c.id == category.id)
        if(index > -1){
            cat[index] = category
        }
        state.categories=cat;
    },
    addCategories(state,category){
        state.categories.push(category);
    },
    clearCategoryList(state){
        state.categories=[];
    },
    deleteCategory(state,categoryId){
        let categories=state.categories.filter(d=> d.id !=categoryId);
        state.categories=categories;
    },

    updateSettings(state,payload){
        state.settings={};
        state.settings=payload;
    },
    addSlider(state,slide){
        state.slider.push(slide);
    },
    updateSlider(state,slide){
        let sld=state.slider;
        state.slider=[];
        let index =sld.findIndex(s => s.id == slide.id)
        if(index > -1){
            sld[index] = slide
        }
        state.slider=sld;
    },
    deleteSlide(state,sliderId){
        let slider=state.slider.filter(d=> d.id != sliderId);
        state.slider=slider;
    },
    clearSlideList(state){
        state.slider=[];
    },
};
const actions={
    async getCategories({commit,state}){  //commit mutation çagırmak için
        commit("clearCategoryList");
        return await axios.get("/api/category")
               .then(res =>{
                   let data=res.data;
                   for(let key in data){
                       commit("addCategories",data[key]);
                   }
                });
    },
    async saveCategory({commit,dispatch} ,payload){
       await axios.post("/api/category", payload)
             .then(res => {
                 commit("addCategories",res.data.data);
                 Toast.fire({
                     icon: 'success',
                     title: 'Kayıt Başarılı...'
                 })
             }).catch(e=>{
               Toast.fire({
                   icon: 'error',
                   title: 'İşem Başarısız'
               })
             });

    },
    async updateCategory({commit,state} ,[payload,id]){
        await axios.put("http://127.0.0.1:8000/api/category/"+id, payload)
            .then(res => {
                commit("updateCategories",res.data.data);
                Toast.fire({
                    icon: 'success',
                    title: 'Kayıt Başarılı...'
                })
            }).catch(e=>{
                Toast.fire({
                    icon: 'error',
                    title: 'İşem Başarısız'
                })
            });
    },
    async deleteCategory({commit,state} ,payload){
        let isParent=state.categories.find(cat => cat.parent_id == payload);
        if (isParent){
            Swal.fire({
                icon: 'error',
                text: isParent.title+"'nin alt kategorilerini siliniz!",
            })
        }else{
            await axios.delete("/api/category/"+payload)
                 .then(res =>{
                     commit("deleteCategory",payload);
                     Toast.fire({
                         icon: 'success',
                         title: 'Kayıt Başarılı...'
                     })
                 })
                 .catch(e=>{
                     Toast.fire({
                         icon: 'error',
                         title: 'İşem Başarısız'
                     })
                 })
        }
    },
    async updateCategoryRank({commit},payload){
        await axios.post('/api/category/rankupdate',{'rank':payload[0],'id':payload[1]})
            .then(res => {

                // commit("updateCategories",res.data.data);
                Toast.fire({
                    icon: 'success',
                    title: 'Kayıt Başarılı...'
                })
            }).catch(e=>{
                Toast.fire({
                    icon: 'error',
                    title: 'İşem Başarısız'
                })
            });

    },
    async getSettings({commit}){
      await axios.get("/api/settings")
          .then(res => {
              commit("updateSettings",res.data[0]);
              // Toast.fire({
              //     icon: 'success',
              //     title: 'Kayıt Başarılı...'
              // })
          }).catch(e=>{
              Toast.fire({
                  icon: 'error',
                  title: 'İşem Başarısız'
              })
          });
    },
    async saveSettings({commit},payload){
        await axios.put("/api/settings/1",payload)
        .then(res => {
                commit("updateSettings",res.data.data);
                Toast.fire({
                    icon: 'success',
                    title: 'Kayıt Başarılı...'
                })
            }).catch(e=>{
                Toast.fire({
                    icon: 'error',
                    title: 'İşem Başarısız'
                })
            });
    },
    // start slider
    async updateSlideRank({commit},payload){
        await axios.post('/api/sliders/rankupdate',{'rank':payload[0],'id':payload[1]})
            .then(res => {

                // commit("updateCategories",res.data.data);
                Toast.fire({
                    icon: 'success',
                    title: 'Kayıt Başarılı...'
                })
            }).catch(e=>{
                Toast.fire({
                    icon: 'error',
                    title: 'İşem Başarısız'
                })
            });
    },
    async saveSlide({commit},payload){
        await axios.post('/api/sliders/',payload)
            .then(res => {
                commit("addSlider", res.data.data);
                Toast.fire({
                    icon: 'success',
                    title: 'Kayıt Başarılı...'
                })
            })
            .catch(e => {
                Toast.fire({
                    icon: 'error',
                    title: 'İşem Başarısız'
                })
            })
    },
    async getSlide({commit}){
        commit("clearSlideList");
        await axios.get('/api/sliders/')
            .then(res =>{
                let data=res.data;
                for(let key in data){
                    commit("addSlider",data[key]);
                }
            })
    },
    async deleteSlide({commit},payload) {
        await axios.delete('/api/sliders/' + payload.id,payload)
            .then(res => {
                commit("deleteSlide", payload.id);
                Toast.fire({
                    icon: 'success',
                    title: 'Kayıt Başarılı...'
                })
            })
            .catch(e => {
                Toast.fire({
                    icon: 'error',
                    title: 'İşem Başarısız'
                })
            })
    },
    async updateSlide({commit},[payload,id]){
        await axios.put("/api/sliders/"+id, payload)
            .then(res => {
                commit("updateSlider",res.data.data);
                Toast.fire({
                    icon: 'success',
                    title: 'Kayıt Başarılı...'
                })
            }).catch(e=>{
                Toast.fire({
                    icon: 'error',
                    title: 'İşem Başarısız'
                })
            });

    }
};
export default{
    state,
    getters,
    mutations,
    actions
}
