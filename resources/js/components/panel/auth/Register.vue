<template>
    <div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center">Kayıt Ol </div>
                    </div>
                    <form @submit.prevent="singup">
                        <div class="card-body col-md-6 ml-auto mr-auto">
                            <div class="form-group">
                                <label>Ad Soyad</label>
                                <input type="text" class="form-control" v-model="form.name"  placeholder="İsim ve Soy İsminizi Giriniz" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" v-model="form.email" id="email2" placeholder="form.email" required>
                            </div>
                            <div class="form-group">
                                <label>Şifre</label>
                                <input type="password" class="form-control" v-model="form.password" placeholder="Şifre" required>
<!--                                <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-group">
                                <label >Şifre Tekrar</label>
                                <input type="password" class="form-control" v-model="form.password_confirmation"  placeholder="Password">
<!--                                <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info col-md-12">Login</button>
                            </div>
                        </div>
                    </form>



<!--                    <div class="card-footer col-md-6  ml-auto mr-auto">-->
<!--                        <button class="btn btn-info col-md-12 mb-3">Facebook</button>-->
<!--                        <button class="btn btn-white col-md-12">Google</button>-->

<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    name: "Register",
    data(){
        return{
            form:{
                name:null,
                email:null,
                password:null,
                confirm_password:null,
            },
            errors:{}
        }
    },
    methods:{
        singup(){
            this.$store.dispatch("singup",this.form).then(res=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Hoş Geldiniz..'
                })
                this.$router.push({name:'home'});
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
