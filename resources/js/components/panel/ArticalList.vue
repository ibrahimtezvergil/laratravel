<template>
    <div class="page-inner">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title pull-left">Blog Yazılarım</h4>
                        <router-link :to="{name:'article-form'}" class="btn btn-info pull-right text-white"><i class="fa fa-plus mr-2"></i>Yeni</router-link>
                    </div>
                    <div class="card-body">

                        <div  class="table-responsive">

                            <table id="basic-datatables"  class="display table table-striped table-hover text-center" >
                                <thead >
                                <tr>
                                    <th>Görsel</th>
                                    <th>Başlık</th>
                                    <th>Beğeni</th>
                                    <th>Tıklanma Sayisi</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr v-for="data in getArticles" :key="data.id">
                                    <td><img style="width:100px;margin:5px;" :src="'/upload/article/'+data.id+'/'+data.coverImg"></td>
                                    <td>{{data.title}}</td>
                                    <td>{{data.id}}</td>
                                    <td>61</td>
                                    <td>
                                        <router-link :to="{name:'article-edit-form', params:{id:data.id,slug:data.slug}}" ><i class="fas fa-edit fa-2x"></i></router-link>
                                        <a class="ml-3" href="javascript:void(0);"  @click="deleteArticle(data)"><i class="fas fa-trash-alt fa-2x"></i></a>
                                        <a class="ml-3" href="javascript:void(0);"  @click="uploadMultiImage(data.title,data.id)" ><i class="fas  fa-images fa-2x"></i></a>



                                    </td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg " id="modalupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h3 class="modal-title " id="exampleModalLabel">Modal title</h3>
                                    <button type="button" @click="closeModal"  class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class=" col-md-12">
                                        <vue-dropzone class="dropzone" ref="myVueDropzone" id="dropzone"
                                                      v-on:vdropzone-sending="sendingEvent"
                                                      v-on:vdropzone-complete="dropzoneResponse"
                                                      v-on:vdropzone-queue-complete="vqueueComplete"

                                                      :options="dropzoneOptions" :useCustomSlot=true>
                                            <div class="dropzone-custom-content">
                                                <h3 class="dropzone-custom-title">İçerik yüklemek için sürükleyip bırakın!</h3>
                                                <div class="subtitle">... veya bilgisayarınızdan bir dosya seçmek için tıklayın.</div>
                                            </div>
                                        </vue-dropzone>
                                    </div >
                                    <hr>
                                    <div class="row col-md-12 ">
                                        <h4 class="m-auto">Yüklenen Resimler</h4>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-4" v-for="data in articleMultiImages"  style="width:400px;
                                            height:200px;">
                                            <a class="btn btn-danger btn-sm coverImgRemove" @click="ImgRemove(data.image,data.id)">X</a>

                                            <img class="multi-image" :src="'/upload/article/'+data.data_id+'/multi/'+data.image" style="width:100%;
                                            height:200px;
                                             object-fit:contain;">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" @click="uploadMultiImageSubmit()" class="btn btn-primary">Yükle</button>

                                    <button type="button" class="btn btn-danger" @click="closeModal" data-dismiss="modal">Kapat</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>
</template>

<script>
import {mapGetters} from "vuex";
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
    components: {
        vueDropzone: vue2Dropzone
    },
    data(){
        return{
            articleList:[],
            articleMultiImages:[],
            selectedItem:null,

            dropzoneOptions: {
                url: 'http://127.0.0.1:8000/api/article/fileupload/${id}',
                thumbnailWidth: 150,
                resizeWidth: 400,
                resizeHeight: 400,
                maxFilesize: 0.5,
                acceptedFiles: ".png,.jpg,.jpeg",
                addRemoveLinks: true,
                autoProcessQueue:false,
                parallelUploads:2,
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                },
            },
        }
    },
    methods:{
        deleteArticle(article){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$store.dispatch("deleteArticle",article);

                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        },
        uploadMultiImage(title,id){
            this.$refs.myVueDropzone.removeAllFiles();
            this.selectedItem=id;
            this.$refs.myVueDropzone.setOption('url','http://127.0.0.1:8000/api/article/fileupload/'+id);
            document.getElementById("exampleModalLabel").innerHTML = title +" İçin İçerik Resimleri Yükle.";
            axios.get("/api/article/getmultiimage/"+id)
                .then(res=>{
                    this.articleMultiImages=res.data.data;
                    $('#modalupload').modal('show');
                })

        },
        dropzoneResponse(){
            setTimeout(()=>{
                this.$refs.myVueDropzone.getRejectedFiles().forEach(e => this.$refs.myVueDropzone.removeFile(e))
            },3000)
        },
        vqueueComplete(file,res){
            this.$refs.myVueDropzone.removeAllFiles();
            },
        uploadMultiImageSubmit(){
            this.$refs.myVueDropzone.processQueue();
            setTimeout(()=>{
                this.$refs.myVueDropzone.removeAllFiles();
                axios.get("/api/article/getmultiimage/"+this.selectedItem)
                    .then(res=>{
                        this.articleMultiImages=[];
                        this.articleMultiImages=res.data.data;
                    })

            },1000)


        },
        sendingEvent(file, xhr, formData) {
            formData.append("name", this.name);
        },
        ImgRemove(name,id){
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bunu geri alamayacaksınız!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil',
                cancelButtonText:'İptal',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("/api/article/removeimg",{'deleteImg':name,'type':'multi','imageid':id,'dataid':this.selectedItem})
                        .then(res=>{
                            let articles=this.articleMultiImages.filter(d=> d.image !=name);
                            this.articleMultiImages=articles;
                            Swal.fire(
                                'Silindi!',
                                'Dosyanız silindi.',
                                'success'
                            )
                            // this.articleImg=null;
                        })


                }
            })


        },
        closeModal(){
            $('#modalupload').modal('hide')
        }

    },
    created() {
       this.$store.dispatch("getArticles");
    },
    mounted() {
    },
    computed:{
        ...mapGetters(["getArticles"]),
    },




}

</script>

<style scoped>
.dropzone{
    background-color: #fff !important;
}
.multi-image{
    width: 100%;
    height: 80%;
}
.coverImgRemove{
    width: 50px;
    position: absolute;
    z-index:1;
    top: 5%;
    right: 0px;
}
</style>
