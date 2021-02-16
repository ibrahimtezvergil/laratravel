<template>
  <div>
      <!-- ============================ Page Title Start================================== -->
      <div class="image-cover page-title" style="background:url(/front/assets/img/banner-1.jpg) no-repeat;" data-overlay="6">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12">
                      <div class="faq-search">
                          <form>
                              <input name="search" class="form-control" placeholder="Size Nasıl Yardımcı Olabiliriz?">
                              <button type="submit"> <i class="ti-search theme-cl"></i> </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- ============================ Page Title End ================================== -->

      <!-- ================= Articles start ========================= -->
      <section>
          <div class="container">

              <div class="row">
                  <div class="col-lg-12 col-md-12">
                      <div class="sec-heading center">
                          <p>Recent Articles</p>
                          <h2>Featured Blog & News</h2>
                      </div>
                  </div>
              </div>

              <div class="row">

                  <!-- Single Blog -->
                  <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                      <article class="post-grid-layout">
                          <router-link :to="{name:'front-detailblog'}">
                              <div class="post-article-header">
                                  <img src="\front\assets\img\c-1.jpg" class="img-fluid mx-auto" alt="">
                                  <span class="post-article-cat">Sport & Football</span>
                              </div>
                          </router-link>
                          <div class="post-article box-inner">
                              <div class="post-grid-caption-header">
                                  <h4 class="entry-title"><router-link :to="{name:'front-detailblog'}">Whay Work with Bookly</router-link></h4>
                                  <div class="post-short-des">
                                      simply dummy text of the printing and typesetting industry.
                                  </div>
                              </div>
                          </div>
                          <div class="post-article-footer">
                              <div class="post-author">

                                  By <img src="front\assets\img\user-2.jpg" class="img-fluid" alt="">
                                  <a href="#">
                                      Admam Kushar
                                  </a>
                              </div>
                              <span><i class="ti-eye"></i>320</span>
                          </div>
                      </article>
                  </div>


              </div>

          </div>
      </section>
      <!-- ========================= End Articles Section ============================ -->


  </div>
</template>

<script>
export default {
    data(){
        return{
            title:"GezHaydi",
        }
    },
    created() {
        document.title="Blog"
    }
}
</script>

<style scoped>

</style>
