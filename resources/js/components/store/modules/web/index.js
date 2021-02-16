import vue from 'vue';
import {routes} from "../../../../routes";

const state={
    slides:[],
    hotelBlogs:[],
    activityBlogs:[],
    tourBlogs:[],
    villaBlogs:[],
    bungalowBlogs:[],
    travelBlogs:[],
};
const getters={
    getHomeSlides() {
        return state.slides;
    },
    getHotelBlogs() {
        return state.hotelBlogs;
    },
    getActivityBlogs() {
        return state.activityBlogs;
    },
    getTourBlogs() {
        return state.tourBlogs;
    },
    getVillaBlogs() {
        return state.villaBlogs;
    },
    getBungalowBlogs() {
        return state.bungalowBlogs;
    },
    getTravelBlogs() {
        return state.travelBlogs;
    }
};
const mutations={
    addSlider(state,payload){
        state.slides=payload;
    },
    addHotelBlogs(state,payload){
        state.hotelBlogs=payload;
    },
    addTourBlogs(state,payload){
        state.tourBlogs=payload;
    },
    addActivityBlogs(state,payload){
        state.activityBlogs=payload;
    },
    addVillaBlogs(state,payload){
        state.villaBlogs=payload;
    },
    addBungalowBlogs(state,payload){
        state.bungalowBlogs=payload;
    },
    addTravelBlogs(state,payload){
        state.travelBlogs=payload;
    },

};
const actions={
    async getIndexData({commit}){
            await axios.get('/api/web/index')
                .then(res =>{
                    console.log(res.data);

                    commit("addSlider",res.data.slides);
                    commit("addTourBlogs",res.data.tur);
                    commit("addHotelBlogs",res.data.otel);
                    commit("addActivityBlogs",res.data.dogaaktiviteleri);
                    commit("addVillaBlogs",res.data.villatatilevleri);
                    commit("addBungalowBlogs",res.data.bungalovdagevleri);
                    commit("addTravelBlogs",res.data.seyahatkamprotalari);
                }).catch(e=>{
                    console.log(e.response)
                })
        },

};
export default{
    state,
    getters,
    mutations,
    actions
}
