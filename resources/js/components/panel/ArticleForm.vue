<template>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title pull-left">Yeni Yazı</h4>
-                    </div>
                    <div class="card-body">
                        <form @submit.prevent="onSubmit"  enctype="multipart/form-data">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        <label>Kapak Görseli</label>
                                        <div  v-if="articleImg==null" class="form-group col-md-12 ">
                                            <input  @input="$v.form.coverImg.$touch()" type="file" @change="onImageChange" name="coverImg" class="form-input form-control" >
                                            <small v-if="!$v.form.coverImg.required" class="form-text text-danger">Bu Alan Zorunludur!</small>
                                            <small v-if="!$v.form.coverImg.imageRule" class="form-text text-danger">Dosya Uzantısı PNG,JPG,JPEG Olmalıdır!</small>
                                        </div>
                                        <div class="form-group col-md-12" v-if="articleImg!=null">
                                            <img class="coverImg" :src="'/upload/article/'+this.$route.params.id+'/'+articleImg">
                                            <a class="btn btn-danger coverImgRemove" @click="coverImgRemove(articleImg)">X</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 ">
                                            <label>Başlığı</label>
                                            <input @input="$v.form.title.$touch()" v-model="form.title" type="text" class="form-control">
                                            <small v-if="!$v.form.title.maxLength" class="form-text text-danger">En Fazla 255 Karekter Uzunluğunda Olmalıdır!</small>
                                            <small v-if="!$v.form.title.required" class="form-text text-danger">Bu Alan Zorunludur!</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 ">
                                            <label>Kategori</label>
                                            <select class="form-control form-control" v-model="form.pageId">
                                                <option>Kategori Seçiniz</option>
                                                <option v-for="cat in getCategoryList" :selected="cat.id === form.pageId ? 'selected' : ''"    :value="cat.id" >
                                                    {{ cat.title }}
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label >Etiketler</label>
                                            <input  @input="$v.form.tags.$touch()" class="form-control" type="text" placeholder="Add tags separated by ," v-model="tag" @keyup="handleTyping">
                                            <div class="tags row col-md-12">
                                                <div class="tag" v-for="(_tag, index) in form.tags" :key="index" @click="removeTag(index)">{{ _tag }}</div>
                                            </div>
<!--                                            <input  v-model="form.tag" type="text" class="form-control" >-->
                                            <small class="form-text text-info">Kullanmak İstediginiz Etiketler Virgülle Ayırarak Yazınız!</small>
<!--                                            <small v-if="!$v.form.tag.maxLength" class="form-text text-danger">En Fazla 255 Karekter Uzunluğunda Olmalıdır!</small>-->
                                            <small  v-if="!$v.form.tags.required" class="form-text text-danger">Bu Alan Zorunludur!</small>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label >Açıklama</label>
                                    <vue-editor v-model="form.content"></vue-editor>
                                    <small  v-if="!$v.form.content.required" class="form-text text-danger">Bu Alan Zorunludur!</small>
<!--                                    <textarea v-model="form.content" type="text" class="form-control"></textarea>-->
                                </div>
                            </div>
                            <div class="row form-group">
                                <button type="submit" class="btn btn-primary w-md ">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {required,maxLength,minLength,helpers } from "vuelidate/lib/validators"
    import {mapGetters} from "vuex";
    // const imageExtension = helpers.regex('imagetype', /\.(gif|jpeg|jpg|png)$/);
    // const imageSize = helpers.regex('imagesize', /\.(gif|jpeg|jpg|png)$/);
    export default {
    data(){
        return{
            tag: '',
            form:{
                title:"",
                content:"",
                tags:[],
                coverImg:"",
                category:"",
                pageId:""
            },
            articleImg:null,
            fileSizeControl:false,
            fileExtensionControl:false,
        }
    },
    methods:{
        onSubmit(){
            if(this.$route.params.id){
                let dataId=this.$route.params.id
                this.$store.dispatch("updateArticle",[this.form,dataId]);
                this.$router.push({name:'my-articals'});
            }else{
                this.$store.dispatch("saveArticle",this.form);
                this.$router.push({name:'my-articals'});
            }
        },
        onImageChange(e) {
            let fileReader=new FileReader();
            fileReader.readAsDataURL(e.target.files[0]);
            if(e.target.files[0].size >24000){
                this.fileSizeControl=true;
            }
            if(e.target.files[0].type == "image/jpeg" || e.target.files[0].type == "image/png" || e.target.files[0].type == "image/jpg" ){
                this.fileExtensionControl=true;
            }
            fileReader.onload=(e)=>{
                this.form.coverImg=e.target.result;
            }
        },
        coverImgRemove(name){
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
                    axios.post("/api/article/removeimg/",{'deleteImg':name,'dataid':this.$route.params.id})
                        .then(res=>{
                            console.log(res.data);
                            Swal.fire(
                                'Silindi!',
                                'Dosyanız silindi.',
                                'success'
                            )
                            this.articleImg=null;
                        })
                }
            })
        },
        addTag(tag) {
            this.form.tags.push(tag);
        },
        removeTag(index) {
            this.form.tags.splice(index, 1);
        },
        tagExists(tag) {
            return this.form.tags.indexOf(tag) !== -1;
        },
        handleTyping(e) {
            if ( e.keyCode === 188 ) {
                let tag = this.tag.replace(/,/g, '');
                if ( !this.tagExists(tag) ) {
                    this.addTag(tag);
                    this.tag = '';
                }
            }
        }
    },
    created(){
        if(this.$route.params.id){
            axios.get("/api/article/"+this.$route.params.id)
                .then( res  => {
                    this.form.title=res.data.title;
                    this.form.tags=res.data.tags.split(",");
                    this.form.content=res.data.content;
                    this.articleImg=res.data.coverImg;
                    this.form.pageId=res.data.pageId;
                });
        }
    },
    computed:{
        ...mapGetters(["getCategoryList"]),
    },
    mounted() {
    },
    validations:{
        form:{
            title:{
                required,
                maxLength:maxLength(255),
            },
            content:{
                required
            },
            tags:{
                required,
                minLength:minLength(3),
                maxLength:maxLength(16),
            },
            coverImg:{
                required,
                // imageExtension,
                // imageSize
            }
        }

    }
}
</script>
<style scoped>
.dropzone{
    background-color: #fff !important;
}
.coverImg{
    width: 100%;
    height: 80%;
}
.coverImgRemove{
    position: absolute;
    z-index:1;
    top: 0px;
    right: 0px;
}
.tags .tag {
    position: relative;
    display: inline-block;
    margin: 0 10px 10px 0;
    padding: 8px 30px 8px 12px;
    color: #fff;
    background: #0064b7;
    border-radius: 5px;
    cursor: pointer;
}
.tags .tag:after {
    position: absolute;
    right: 8px;
    color: #b4252d;
    content: "\00d7";
}


</style>
