<template>
    <div>
        <div class="topbar-head">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="topbar-wrap">

                            <div class="topbar-left">
                                <ul class="tp-list">

                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                </ul>
                                <ul class="tp-list ml-2 nbr">
                                    <li><a href="#">support@gezhaydi.com</a></li>
                                </ul>
                            </div>

                            <div class="topbar-right">
                                <ul class="tp-list">
                                    <li><a href="#">Organizatör Başvuru Formu</a></li>
                                </ul class="tp-list">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header header-light">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="#">
                            <img src="assets\img\logo.png" class="logo" alt="">
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">
                            <li  class="active"><router-link :to="{name:'front-index'}">Anasayfa</router-link></li>

                            <li v-for="category in getCategoryList"><router-link :to="{name:'list',params:{slug: category.slug}}">{{category.title}}</router-link></li>
<!--                            <li><router-link :to="{name:'front-hotels'}">Otel</router-link></li>-->
<!--                            <li><router-link :to="{name:'front-blogs'}">Blog</router-link></li>-->
<!--                            <li><router-link :to="{name:'front-activities'}">Ekstreme & Doğa Sporları</router-link></li>-->
                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">

                            <li v-if="!loginControl"><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fas fa-user-circle text-info mr-1"></i>Giriş Yap</a></li>
                            <li v-if="!loginControl"><a href="#" data-toggle="modal" data-target="#signup-modal"><i class="fas fa-arrow-alt-circle-right text-warning mr-1"></i>Kayıt Ol</a></li>
                            <li v-if="loginControl"><a href="JavaScript:Void(0);"><i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                                <ul class="nav-dropdown nav-submenu " style="display:block !important;">
                                    <li><router-link :to="{name:'front-mydashboard'}">Proflim</router-link></li>
                                    <li><router-link :to="{name:'front-likes'}">Beğendiklerim</router-link></li>
                                    <li><router-link :to="{name:'front-bookings'}">Rezervasyonlarım</router-link></li>
                                    <li><a href="/panelim">Panelim</a></li>
<!--                                    <li><router-link :to="{name:'panel-home'}">Panelim</router-link></li>-->
                                    <li><a href="javascript:void (0)" @click="logout">Çıkış Yap</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Log In Modal -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Giriş Yap</h5>
                        <span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
                    </div>
                    <div class="modal-body icon-form">
                        <div class="login-form">
                            <form class="user" @submit.prevent="login()">

                                <div class="form-group">
                                    <label>Email Adresiniz</label>
                                    <div class="input-with-icon">
<!--                                        blur kullan-->
                                        <input @input="$v.formLogin.email.$touch()"
                                               v-model="formLogin.email"
                                               type="text"
                                               class="form-control is-valid"
                                               :class="{ 'border border-danger' : $v.formLogin.email.$error}"
                                               placeholder="Email Adresiniz">
                                        <i class="ti-user"></i>
                                        <small v-if="!$v.formLogin.email.required" class="form-text text-danger">Bu Alan Zorunludur!</small>
                                        <small v-if="!$v.formLogin.email.email" class="form-text text-danger">Geçerli  E-posta Adresi Giriniz! </small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Şifreniz</label>
                                    <div class="input-with-icon">
                                        <input type="password" v-model="formLogin.password" class="form-control" placeholder="*******">
                                        <i class="ti-unlock"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width pop-login">Giriş Yap</button>
                                </div>

                            </form>
                        </div>
                        <div class="modal-divider"><span> || </span></div>
                        <div class="social-login mb-3">
                            <ul>
                                <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                                <li><a href="#" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <p class="mt-3"><a href="javascript:void(0)" @click="forgetPassword" class="link">Şifreni mi Unuttun?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Sign Up Modal -->
        <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Kayıt Ol</h5>
                        <span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
                    </div>
                    <div class="modal-body icon-form">
                        <div class="login-form">
                            <form class="user" @submit.prevent="singup()">

                                <div class="form-group">
                                    <label>Ad Soyad</label>
                                    <div class="input-with-icon">
                                        <input v-model="formSingup.name" type="text" class="form-control" placeholder="Full Name">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email </label>
                                    <div class="input-with-icon">
                                        <input v-model="formSingup.email" type="email" class="form-control" placeholder="Email">
                                        <i class="ti-email"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Şifre</label>
                                    <div class="input-with-icon">
                                        <input @input="$v.formSingup.password.$touch()" v-model="formSingup.password" type="password" class="form-control" placeholder="*******">
                                        <i class="ti-unlock"></i>
                                    </div>
                                    <small v-if="!$v.formSingup.password.required" class="form-text text-danger">Bu Alan Zorunludur!</small>
                                    <small v-if="!$v.formSingup.password.minLength" class="form-text text-danger">Şifreniz En Az {{$v.formSingup.password.$params.minLength.min}} Karekterden Oluşmalıdır!</small>
                                </div>

                                <div class="form-group">
                                    <label>Şifre Tekrar</label>
                                    <div class="input-with-icon">
                                        <i class="ti-unlock"></i>
                                        <input @input="$v.formSingup.password_confirmation.$touch()" v-model="formSingup.password_confirmation" type="password" class="form-control" placeholder="*******">
                                    </div>
                                    <small v-if="!$v.formSingup.password_confirmation.required" class="form-text text-danger">Bu Alan Zorunludur!</small>
                                    <small v-if="!$v.formSingup.password_confirmation.sameAs" class="form-text text-danger">Şifrleriniz Uyuşmuyor!</small>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width pop-login">Kayıt Ol</button>
                                </div>

                            </form>
                        </div>
                        <div class="modal-divider"><span>||</span></div>
                        <div class="social-login mb-3">
                            <ul>
                                <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                                <li><a href="#" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <p class="mt-3">Hesabın zaten varmı? <a href="javascript:void(0)" @click="goToLogin" class="link">Giriş Yap</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <div class="modal fade" id="forgetpassword-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Şifremi Unututm</h5>
                        <span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
                    </div>
                    <div class="modal-body icon-form">
                        <div class="login-form">
                            <form>

                                <div class="form-group">
                                    <label>Email Adresiniz</label>
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Username">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-divider"><span>  </span></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {required,email,minLength,sameAs} from "vuelidate/lib/validators"
import AppStorage from "../../Helpers/AppStorage";
import {mapGetters} from "vuex";
import article from "../store/modules/panel/article";
export default {
    name: "Header",
    data(){
        return{
            aaa:"",
            formLogin:{
                email:null,
                password:null
            },
            formSingup:{
                name:null,
                email:null,
                password:null,
                password_confirmation:null,
            }
        }
    },
    methods:{
        login(){
            console.log(this.formLogin)
            axios.post("/api/auth/login",this.formLogin)
                .then(res => {
                    User.responseAfterLogin(res);
                    // commit("setToken",User.loggedIn());
                    Toast.fire({
                        icon: 'success',
                        title: 'Hoş Geldiniz..'
                    })
                    // $('#login-modal').modal('hide')
                    location.reload();
                })
                .catch(e=>{
                    console.log(e);
                })
        },
        singup(){
            console.log(this.formSingup)
            axios.post("/api/auth/singup",this.formSingup)
                .then(res => {
                    User.responseAfterLogin(res);
                    Toast.fire({
                        icon: 'success',
                        title: 'Hoş Geldiniz..'
                    })
                    location.reload();

                })
        },
        logout(){
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            // Toast.fire({
            //     icon:'success',
            //     title:'Çıkış İşlemi Başarılı'
            // })
            location.reload();
        },
        forgetPassword(){
            $('#login-modal').modal('hide')
            $('#forgetpassword-modal').modal('show')
        },
        goToLogin(){
            $('#signup-modal').modal('hide');
            $('#login-modal').modal('show');
        }
    },
    created() {
        this.$store.dispatch("getIndexData");
        this.$store.dispatch("getCategories");
        // this.$store.dispatch("getArticles");


    },

    computed:{
        ...mapGetters(["getCategoryList"]),

        loginControl(){
            return User.hasToken();
        }

    },
    beforeCreate(){
        axios.post("/api/auth/me")
            .then(res => {
                console.log(res);
                //
                // // User.responseAfterLogin(res);
                // // // commit("setToken",User.loggedIn());
                // // Toast.fire({
                // //     icon: 'success',
                // //     title: 'Hoş Geldiniz..'
                // // })
                // // // $('#login-modal').modal('hide')
                // // location.reload();
            })
            .catch(e=>{
                AppStorage.clear();
                console.log(e.response.data);

            })
    },
    validations:{
        formLogin:{
            email:{
                required,
                email,
            }
        },
        formSingup:{
            password:{
                required,
                minLength:minLength(6)
            },
            password_confirmation:{
                required,
                minLength:minLength(6),
                sameAs:sameAs('password')
            }
        }
    }
}
</script>

<style scoped>

</style>
