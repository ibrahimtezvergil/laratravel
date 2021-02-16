<template>
    <div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center">Şifremi Unuttum!</div>
                    </div>
                    <form>
                        <div class="card-body col-md-6 ml-auto mr-auto">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email2" placeholder="Email Adresinizi Giriniz.">
                                <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-info col-md-12">Login</button>
                            </div>
                        </div>
                    </form>



                    <div class="card-footer col-md-6  ml-auto mr-auto">
                        <div class="text-center">
                            <router-link to="/" class="font-weight-bold text-white col-md-12 mb-3">Şimdi Giriş Yap</router-link>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    name: "Register"
}
</script>

<style scoped>

</style>
