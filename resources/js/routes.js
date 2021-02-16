import User from "./Helpers/User";
const defaultURL="http://127.0.0.1:8000/";
let login=require('./components/panel/auth/Login').default;
let register=require('./components/panel/auth/Register').default;
let forget=require('./components/panel/auth/ForgetPassword').default;
let logout=require('./components/panel/auth/Logout').default;


let articlelist=require('./components/panel/ArticalList').default;
let articleform=require('./components/panel/ArticleForm').default;
let settings=require('./components/panel/Settings').default;




let frontindex=require('./components/front/Index').default;

let listpage=require('./components/front/ListPage').default;
let detailpage=require('./components/front/DetailPage').default;
let detailblog=require('./components/front/DetailBlog').default;
let bloglist=require('./components/front/BlogList').default;
let account=require('./components/front/Account').default;
let dashboard=require('./components/front/MyDashboard').default;
let profileform=require('./components/front/MyProfileForm').default;
let bookings=require('./components/front/MyBooking').default;
let likes=require('./components/front/MyLikes').default;
let passwordchange=require('./components/front/PasswordChange').default;
let categories=require('./components/front/Categories').default;

let home=require('./components/panel/Home').default;

export const routes=[
    // {path:'/panelim/login',component:login,name:'/'},
    // {path:'/panelim/register',component:register,name:'register'},
    // {path:'/panelim/forget',component:forget,name:'forget'},
    // {path:'/panelim/logout',component:logout,name:'logout'},

    {path:'/',components: {"front-view":frontindex},name:'front-index'},
    {path:'/detay',components: {"front-view":detailpage},name:'front-detail'},
    {path:'/detay-blog',components: {"front-view":detailblog},name:'front-detailblog'},

    {path:'/account',components: {"front-view":account},name:'front-account',children:[

            {path:'/dashboard',components: {"account-view":dashboard},name:'front-mydashboard'},
            {path:'/profile',components: {"account-view":profileform},name:'front-profileform'},
            {path:'/my-booking',components: {"account-view":bookings},name:'front-bookings'},
            {path:'/password-change',components: {"account-view":passwordchange},name:'front-passwordchange'},
            {path:'/likes',components: {"account-view":likes},name:'front-likes'},

        ]},



    {path:'/:slug',components: {"front-view":listpage},name:'list'},
    // {path:'/:slug',components: {"front-view":listpage},name:'front-hotels'},
    // {path:'/:slug',components: {"front-view":listpage},name:'front-activities'},
    // {path:'/kategori/blogs',components: {"front-view":bloglist},name:'front-blogs'},


    {path:'/panelim',components: {"panel-view":home},name:'panel-home',beforeEnter(to,from,next){
            if (User.hasToken()){
                next();
            }else{
                window.location.href=defaultURL;
            }
        }},
    {path:'/panelim/yazilarim',components: {"panel-view":articlelist},name:'my-articals',beforeEnter(to,from,next){
            if (User.hasToken()){
                 next();
            }else{
                window.location.href=defaultURL;
            }
        }},
    {path:'/panelim/yeni-yazi',components: {"panel-view":articleform},name:'article-form',beforeEnter(to,from,next){
            if (User.hasToken()){
                next();
            }else{
                window.location.href=defaultURL;
            }
        }},
    {path:'/panelim/yazi-duzenle/:id/:slug',components: {"panel-view":articleform},name:'article-edit-form',beforeEnter(to,from,next){
            if (User.hasToken()){
                next();
            }else{
                window.location.href=defaultURL;
            }
        }},
    {path:'/panelim/ayarlar',components: {"panel-view":settings},name:'settings',beforeEnter(to,from,next){
            if (User.hasToken()){
                next();
            }else{
                window.location.href=defaultURL;
            }
        }},

]
