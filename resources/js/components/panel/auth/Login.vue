<template>
    <div>

    <div class="row ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title text-center">Giriş Yap</div>
                </div>
                <div class="card-body col-md-6 ml-auto mr-auto">
                    <form class="user" @submit.prevent="login">
                        <div class="form-group">
                            <input type="email" class="form-control" v-model="form.email" id="email2" placeholder="Email Adresiniz.">
<!--                            <small id="emailHelp2" v-if="errors:email" class="form-text text-danger">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" v-model="form.password" id="password"  placeholder="Şifreniz">
<!--                            <small id="emailHelp2" class="form-text text-danger" v-if="erros.password">{{errors.pas}}</small>-->
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">Beni Hatırla!</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info col-md-12">Login</button>
                        </div>
                    </form>
                </div>


                <div class="card-footer col-md-6  ml-auto mr-auto">

                    <div class="text-center">
                        <router-link to="/register" class="font-weight-bold text-white col-md-12 mb-3">Kayıt Ol</router-link>

                    </div>
                    <div class="text-center">
                        <router-link to="/forget" class=" col-md-12 text-white">Şifremi Unuttum</router-link>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return{
            form:{
                email:null,
                password:null
            },
            errors:{}
        }
    },
    methods:{
        login(){
            this.$store.dispatch("login",this.form).then(res=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Hoş Geldiniz..'
                })
                this.$router.push({name:'register'});

            })
            .catch(e=>{
                Toast.fire({
                    icon: 'warning',
                    title: 'Giris Bilgilerinizi Kontrol Ediniz'
                })
            })

        }
    },
    created(){
        if (User.loggedIn()){
            this.$router.push({name:'home'});
        }
    }
}
</script>

<style scoped>

</style>
