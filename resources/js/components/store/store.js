import Vue from "vue"
import Vuex from "vuex";
import article from "./modules/panel/article";
import settings from "./modules/panel/settings";
import auth from "./modules/auth";
import webIndex from "./modules/web/index";
import blog from "./modules/web/blog";
Vue.use(Vuex);
export const store=new Vuex.Store({

    modules:{
        article,
        settings,
        auth,
        blog,
        webIndex
    },

});
