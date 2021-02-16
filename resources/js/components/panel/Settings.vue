<template>
    <div class="page-inner">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ayarlar</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="pills-categories-tab-nobd" data-toggle="pill" href="#pills-categories-nobd" role="tab" aria-controls="pills-categories-nobd" aria-selected="true">Kategoriler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-users-tab-nobd" data-toggle="pill" href="#pills-users-nobd" role="tab" aria-controls="pills-users-nobd" aria-selected="true">Kullanıcılar</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active " @click="getSettings" id="pills-settings-tab-nobd" data-toggle="pill" href="#pills-settings-nobd" role="tab" aria-controls="pills-settings-nobd" aria-selected="true">Genel Ayarlar</a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link " id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd" aria-selected="true">İletişim</a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link " id="pills-images-tab-nobd" data-toggle="pill" href="#pills-images-nobd" role="tab" aria-controls="pills-images-nobd" aria-selected="true">Site Görselleri</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-slider-list-tab-nobd" data-toggle="pill" href="#pills-slider-list-nobd" role="tab" aria-controls="pills-slider-list-nobd" aria-selected="true">Slider Listesi</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " id="pills-message-tab-nobd" data-toggle="pill" href="#pills-message-nobd" role="tab" aria-controls="pills-message-nobd" aria-selected="true">Popup Mesaj</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-xml-tab-nobd" data-toggle="pill" href="#pills-xml-nobd" role="tab" aria-controls="pills-xml-nobd" aria-selected="false">XML</a>
                    </li>
                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                    <div class="tab-pane fade  " id="pills-categories-nobd" role="tabpanel" aria-labelledby="pills-categories-tab-nobd">
                        <hr>
                        <div class="row col-12 col-md-12">
                            <button class="btn btn-sm btn-primary ml-auto" @click="showModal('categoryForm')"><i class="fas fa-plus mr-2"></i>Yeni Kategori</button>
                        </div>
                        <div  class="table-responsive">

                            <table id="basic-datatables"  class="display table table-striped table-hover text-center" >
                                <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Kategori Başlıgı</th>
                                    <th>Kategori Alt Başlıgı</th>
                                    <th>Alt Kategori</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <tr v-for="(category , i) in getCategoryList" :key="category.id">
<!--                                            <td class="table-sort"><i class="fas fa-sort fa-2x"></i></td>-->
                                            <td >
                                                <select v-if="category.parent_id == 0" class="form-control form-control-sm" @change="updateCatRank($event,category.id)" id="smallSelect">
                                                    <option v-for="(item , r) in getCategoryList"    :selected="r+1==category.rank ? 'selected' :'' "   :value="r+1">{{r+1}}</option>
                                                </select>
                                            </td>
                                            <td>{{category.title}}</td>
                                            <td>{{category.sub_title}}</td>
                                            <td >{{getCategory(category.parent_id)}}</td>
                                            <td>
                                                <a class="ml-3" href="javascript:void(0);"  @click="showModal('categoryForm',category)"><i class="fas fa-edit fa-2x"></i></a>
                                                <a class="ml-3" href="javascript:void(0);"  @click="categoryDelete(category.id)"><i class="fas fa-trash-alt fa-2x"></i></a>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-users-nobd" role="tabpanel" aria-labelledby="pills-users-tab-nobd">
                        <hr>
                        <div  class="table-responsive">

                            <table id="basic-datatables"  class="display table table-striped table-hover text-center" >
                                <thead >
                                <tr>
                                    <th></th>

                                    <th>Kategori Başlıgı</th>
                                    <th>Alt Kategori</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr >
                                    <td class="table-sort"><i class="fas fa-sort fa-2x"></i></td>
                                    <td>gdr</td>
                                    <td>drg</td>
                                    <td>61</td>
                                    <td>
                                        <router-link :to="{}" ><i class="fas fa-edit fa-2x"></i></router-link>
                                        <a class="ml-3" href="javascript:void(0);"  @click=""><i class="fas fa-trash-alt fa-2x"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="pills-settings-nobd" role="tabpanel" aria-labelledby="pills-settings-tab-nobd">
                        <hr>
                        <form @submit.prevent="settingsSubmit()">
                            <div class="form-group col-md-6 ">
                                <label class="text-black">Site Başlığı</label>
                                <input type="text" v-model="settingsForm.title" class="form-control">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="text-black">Site Açıklaması</label>
                                <input type="text" v-model="settingsForm.description" class="form-control">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="text-black">Site Anahtar Kelimeleri</label>
                                <input type="text" v-model="settingsForm.keywords" class="form-control">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="text-black">Site Sahibi</label>
                                <input type="text" v-model="settingsForm.author" class="form-control">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="text-black">Arama Moturu Tarama Aralığı(Gün) </label>
                                <input type="number" v-model="settingsForm.revisitAfter" class="form-control">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="text-black">Dil </label>
                                <select class="form-control" v-model="settingsForm.language">
                                    <option value="Turkish"  >Türkçe</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="form-check-label ml-4">
                                    <input class="form-check-input " v-model="settingsForm.robots" type="checkbox" value="">
                                    <span class="form-check-sign">Arama Motorlarının Taramasına İzin Ver</span>
                                </label>
                            </div>
                            <div class="form-group col-md-2 ">
                                <button type="submit" class="btn btn-info form-control">Kaydet</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                        <hr>
                        <form>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Başlığı</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Alt Başlık</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Alt Kategori</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-2 ">
                                <button type="submit" class="btn btn-info w-md form-control">Kaydet</button>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="pills-images-nobd" role="tabpanel" aria-labelledby="pills-images-tab-nobd">
                        <hr>
                        <form>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Başlığı</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Alt Başlık</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Alt Kategori</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-2 ">
                                <button type="submit" class="btn btn-info w-md form-control">Kaydet</button>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade show active" id="pills-slider-list-nobd" role="tabpanel" aria-labelledby="pills-slider-list-tab-nobd">
                        <hr>
                        <div class="container mb-5 col-md-12">
                            <div class="row">
                                <h3 class="text-white">Anasayfa Slider Listesi</h3>
                                <button class="btn btn-sm btn-primary ml-2"  @click="showSlideModal('slideForm',{'id':0})"><i class="fas fa-plus mr-2"></i>Yeni Slider</button>

                                <div  class="table-responsive">

                                    <table id="basic-datatables"  class="display table table-striped table-hover text-center" >
                                        <thead>
                                        <tr >
                                            <th>

                                            </th>
                                            <th>Görsel</th>
                                            <th>Slider Başlık</th>
                                            <th>URL</th>
                                            <th>İşlem</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="slide in getSliders" v-if="slide.catId==0">
                                            <td class="rank-select">
                                                <select  class="form-control " @change="updateSlideRank($event,slide.id)" id="smallSelect">
                                                    <option v-for="(item , r) in getSliders.filter(data => data.catId==0)"    :selected="r+1==slide.rank ? 'selected' :'' "   :value="r+1">{{r+1}}</option>
                                                </select>
                                            </td>
                                            <td><img style="width:100px;margin:5px;" :src="'/upload/slider/'+slide.catId+'/'+slide.image"></td>
                                            <td>{{slide.title}}</td>
                                            <td>{{slide.url}}</td>
                                            <td>
                                                <a class="ml-3" href="javascript:void(0);" @click="showSlideModal('slideForm',slide)" ><i class="fas fa-edit fa-2x"></i></a>
                                                <a class="ml-3" href="javascript:void(0);" @click="slideDelete(slide)" ><i class="fas fa-trash-alt fa-2x"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div v-for="category in getCategoryList" class="container mb-5 col-md-12">
                            <div class="row">
                                <h3 class="text-white">{{category.title}} Slider Listesi</h3>
                                <button class="btn btn-sm btn-primary ml-2"  @click="showSlideModal('slideForm',{'id':category.id})"><i class="fas fa-plus mr-2"></i>Yeni Slider</button>

                                <div  class="table-responsive">
                                    <table id="basic-datatables"  class="display table table-striped table-hover text-center" >
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Görsel</th>
                                            <th>Slide Başlık</th>
                                            <th>Url</th>
                                            <th>İşlem</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr v-for="slide in getSliders" v-if="slide.catId==category.id" >
                                            <td  class="rank-select">
                                                <select  class="form-control w-100 " @change="updateSlideRank($event,slide.id)" id="smallSelect">
                                                    <option v-for="(item , r) in getSliders.filter(data => data.catId==category.id)"    :selected="r+1==slide.rank ? 'selected' :'' "   :value="r+1">{{r+1}}</option>
                                                </select>
                                            </td>

                                            <td><img style="width:100px;margin:5px;" :src="'/upload/slider/'+slide.catId+'/'+slide.image"></td>
                                            <td>{{slide.title}}</td>
                                            <td>{{slide.url}}</td>
                                            <td>
                                                <a class="ml-3" href="javascript:void(0);" @click="showSlideModal('slideForm',slide)"><i class="fas fa-edit fa-2x"></i></a>
                                                <a class="ml-3" href="javascript:void(0);"  @click="categoryDelete(category.id)"><i class="fas fa-trash-alt fa-2x"></i></a>
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="tab-pane fade" id="pills-message-nobd" role="tabpanel" aria-labelledby="pills-message-tab-nobd">
                        <hr>
                        <form>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Başlığı</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Alt Başlık</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label class="text-black">Alt Kategori</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-2 ">
                                <button type="submit" class="btn btn-info w-md form-control">Kaydet</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-xml-nobd" role="tabpanel" aria-labelledby="pills-xml-tab-nobd">
                        <p> xml</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg " id="slideForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h3 class="modal-title " id="exampleModalLabel">Yeni Slide Ekle</h3>
                        <button type="button" @click="closeSlideModal('slideForm')"  class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class=" col-md-12">
                            <form @submit.prevent="slideSubmit">
                                <div class="form-group col-md-12 ">
                                    <label class="text-black">Başlığı</label>
                                    <input v-model="slideForm.title" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label class="text-black">URL</label>
                                    <input v-model="slideForm.url" type="text" class="form-control">
                                </div>
                                <div v-if="!editId" class="form-group col-md-12 ">
                                    <label class="text-black">Görsel</label>
                                    <input  type="file"  @change="onImageChange" name="image" class="form-input form-control" >
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"   class="btn btn-primary">Kaydet</button>
                                    <button type="button" class="btn btn-danger" @click="closeSlideModal('slideForm')" data-dismiss="modal">Kapat</button>
                                </div>
                            </form>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg " id="categoryForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h3 class="modal-title " id="exampleModalLabel">Yeni Kategori Ekle</h3>
                        <button type="button" @click="closeModal('categoryForm')"  class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class=" col-md-12">
                            <form @submit.prevent="categorySubmit">
                                <div class="form-group col-md-12 ">
                                    <label class="text-black">Başlığı</label>
                                    <input v-model="categoryForm.title" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label class="text-black">Alt Başlık</label>
                                    <input v-model="categoryForm.sub_title" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label class="text-black">Alt Kategori</label>
                                    <select class="form-control form-control" v-model="categoryForm.parent_id">
                                        <option value="0">Üst Categori</option>
                                        <option v-for="cat in getCategoryList" :selected="cat.id === categoryForm.parent_id ? 'selected' : ''"    :value="cat.id" >
                                            {{ cat.title }}
                                        </option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"   class="btn btn-primary">Kaydet</button>
                                    <button type="button" class="btn btn-danger" @click="closeModal('categoryForm')" data-dismiss="modal">Kapat</button>
                                </div>
                            </form>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>


import {mapGetters} from "vuex";

export default {
    name: "Settings",

    data(){
        return{
            fileExtensionControl:false,
            fileSizeControl:false,
            selectRank:"",
            categoryList:[],
            editId:'',
            modelType:'',
            categoryForm:{
                title:'',
                sub_title:'',
                parent_id:''
            },
            settingsForm:{
                id:'',
                title:'',
                keywords:'',
                description:'',
                author:'',
                revisitAfter:'',
                language:'',
                robots:'',
            },
            slideForm:{
                title:'',
                image:'',
                url:'',
                catId:'',
            }
        }
    },
    methods:{
        closeModal(modalname){
            this.nameModal=modalname;
            $('#'+modalname).modal('hide');
        },
        showModal(modalname,category){
            this.modelType=modalname;
            if (category){
                this.editId=category.id;
                this.categoryForm.title=category.title;
                this.categoryForm.sub_title=category.sub_title;
                this.categoryForm.parent_id=category.parent_id;
                document.getElementById("exampleModalLabel").innerHTML = category.title +" Kategorisini Düzenliyorsun";
            }
            else{
                this.editId="";
                this.categoryForm.title="";
                this.categoryForm.sub_title="";
                this.categoryForm.parent_id="";

            }
            $('#'+modalname).modal('show')
        },
        closeSlideModal(modalname){
            this.nameModal=modalname;
            $('#'+modalname).modal('hide');
        },
        showSlideModal(modalname,slide){
            this.modelType=modalname;
            this.slideForm.catId=slide.id;
            this.editId="";
            if (slide.title){
                    this.editId=slide.id;
                    this.slideForm.title=slide.title;
                    this.slideForm.url=slide.url;
            }else{
                this.editId="";
                this.slideForm.title="";
                this.slideForm.url="";
                this.slideForm.image="";

            }
            document.getElementById("exampleModalLabel").innerHTML ="Slider İşlemleri";
            $('#'+modalname).modal('show')
        },
        categorySubmit(){
            if (this.editId){
                this.$store.dispatch("updateCategory",[this.categoryForm,this.editId]);
                $('#'+this.modelType).modal('hide');
            }else{
                this.$store.dispatch("saveCategory",this.categoryForm);
                $('#'+this.modelType).modal('hide');
            }
        },
        categoryDelete(id){
            this.$store.dispatch("deleteCategory",id);

        },
        settingsSubmit(){
            this.$store.dispatch("saveSettings",this.settingsForm);
        },
        getSettings(){
            this.settingsForm=this.$store.getters.getSettings;
            // this.settingsForm.title=set.title;
            // this.settingsForm.description=set.description;
            // this.settingsForm.keywords=set.keywords;
            // this.settingsForm.author=set.author;
            // this.settingsForm.revisitAfter=set.revisitAfter;
            // this.settingsForm.language=set.language;
            // this.settingsForm.robots=set.robots;
        },
        updateCatRank(e,id){
            this.$store.dispatch("updateCategoryRank",[e.target.value,id]);
        },
        getCategory (id) {
            if(id !=0){
                this.categoryList=this.$store.getters.getCategoryList;
                let parentCat=this.categoryList.find(cat => cat.id == id);
                return parentCat.title;
            }
        },
        onImageChange(e){
            let fileReader=new FileReader();
            fileReader.readAsDataURL(e.target.files[0]);
            if(e.target.files[0].size >24000){
                this.fileSizeControl=true;
            }
            if(e.target.files[0].type == "image/jpeg" || e.target.files[0].type == "image/png" || e.target.files[0].type == "image/jpg" ){
                this.fileExtensionControl=true;
            }
            fileReader.onload=(e)=>{
                this.slideForm.image=e.target.result;
            }
        },
        slideSubmit(){
            if (this.editId){
                this.$store.dispatch("updateSlide",[this.slideForm,this.editId]);
                $('#'+this.modelType).modal('hide');
            }else{
                this.$store.dispatch("saveSlide",this.slideForm);
                $('#'+this.modelType).modal('hide');
            }
        },
        slideDelete(slide){
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
                    this.$store.dispatch("deleteSlide",slide);
                }
            })
        },
        updateSlideRank(e,id){
            this.$store.dispatch("updateSlideRank",[e.target.value,id]);
        }
    },
    created(){

    },
    computed:{
        ...mapGetters(["getCategoryList","getSliders"]),
    }
}
</script>
<style scoped>
.table-sort:hover{
    color: #fff;
    background-color:#6861ce;
}
.table th{
    color: white;
    text-decoration: underline;
}
.table td{
    color: white;
}
.rank-select{
    width: 125px;
}
</style>
