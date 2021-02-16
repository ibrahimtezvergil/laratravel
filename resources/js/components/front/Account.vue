<template>
    <div>

        <!-- ============================ Page Title Start================================== -->
        <div class="image-cover page-title" style="background:url(front/assets/img/banner.jpg) no-repeat;" data-overlay="6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <h2 class="ipt-title">Hello, Shaurya</h2>
                        <span class="ipn-subtitle text-light">Edit & View Your Profile</span>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================ Page Title End ================================== -->

        <!-- ============================ Dashboard Start ================================== -->
        <section class="gray">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="dashboard-navbar">

                            <div class="d-user-avater">
                                <img src="front\assets\img\user-2.jpg" class="img-fluid avater" alt="">
                                <h4>Adam Harshvardhan</h4>
                                <span>Canada USA</span>
                            </div>

                            <div class="d-navigation">
                                <ul>
                                    <li class="active"><router-link :to="{name:'front-mydashboard'}"><i class="ti-dashboard"></i>Genel Bilgiler</router-link></li>
                                    <li><router-link :to="{name:'front-profileform'}"><i class="ti-user"></i>Profilim</router-link></li>
                                    <li><router-link :to="{name:'front-bookings'}"><i class="ti-layers"></i>Rezervasyonlarım</router-link></li>
                                    <li><router-link :to="{name:'front-likes'}"><i class="ti-heart"></i>Beğendiklerim</router-link></li>
                                    <li><router-link :to="{name:'front-passwordchange'}"><i class="ti-unlock"></i>Şifre Değiştir</router-link></li>
                                    <li><a href="#"><i class="ti-power-off"></i>Çıkış Yap</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <router-view name="account-view"></router-view>
                    </div>

                </div>
            </div>
        </section>
        <!-- ============================ Dashboard End ================================== -->

    </div>
</template>

<script>
export default {
    name: "Account"
}
</script>

<style scoped>

</style>
