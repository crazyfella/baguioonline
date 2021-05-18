<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="myaccount-content">
                    <router-link to="products"  class="check-btn sqr-btn"><i class="fa fa-arrow-left"></i>Back to Products</router-link>
                    <br><br>
                    <h3>Product Images</h3>
                    Maximum Image Upload: 6 Images<br>
                    Maximum Image Size: 2.5MB<br><br>

                     <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>


                    <div class="account-details-form">

                        <div class="uploader"
                            @dragenter="OnDragEnter"
                            @dragleave="OnDragLeave"
                            @dragover.prevent
                            @drop="onDrop"
                            :class="{ dragging: isDragging }">
                            <has-error :form="form" field="images"></has-error>
                            <div class="upload-control" v-show="images.length">
                                <label for="file">Select a file</label>
                                <button @click="clearImages">Clear All</button>
                                <button @click="upload">Upload</button>
                            </div>


                            <div v-show="!images.length">
                                <i class="fa fa-cloud-upload"></i>
                                <p class="p_drag">Drag your images here</p>
                                <div>OR</div>
                                <div class="file-input">
                                    <label for="file">Select a file</label>
                                    <input type="file" id="file" @change="onInputChange" multiple name="imagesP">

                                </div>
                            </div>

                            <div class="images-preview" v-show="images.length">
                                <div class="img-wrapper" v-for="(image, index) in images" :key="index">
                                    <img :src="image" :alt="`Image Uplaoder ${index}`">
                                    <div class="details">
                                        <span class="name" v-text="files[index].name"></span>
                                        <span class="size" v-text="getFileSize(files[index].size)"></span>

                                    </div>
                                </div>
                            </div>
                        </div>

                    

                        <div class="row product-list-item">

                    <div class="col-lg-4 col-md-4 order-sm-3" v-for="img in imagesProducts" :key="img.id">
                        <div class="img-container img-full fix mb-30 mt-20 hot-deals-wrap">
                                <img :src="'/images/' + img.image" alt="">
                                <div class="product-list-content" >
                                    <div class="product-list-action-link">
                                        <a href="#"  data-toggle="tooltip" data-placement="top" title="Delete" @click="deleteImage(img.id)"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
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
import 'vue-loading-overlay/dist/vue-loading.css'

import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    data: () => ({
        isLoading: false,
        fullPage: true,
        isDragging: false,
        dragCount: 0,
        files: [],
        images: [],
        imagesProducts: {},
        form: new Form({
            id: '',
            images: ''
        })
    }),
    components: {
            Loading
        },
    methods: {

        OnDragEnter(e) {
            e.preventDefault();

            this.dragCount++;
            this.isDragging = true;
            return false;
        },
        OnDragLeave(e) {
            e.preventDefault();
            this.dragCount--;
            if (this.dragCount <= 0)
                this.isDragging = false;
        },
        onInputChange(e) {
            const files = e.target.files;
            Array.from(files).forEach(file => this.addImage(file));
        },
        onDrop(e) {
            e.preventDefault();
            e.stopPropagation();
            this.isDragging = false;
            const files = e.dataTransfer.files;
            Array.from(files).forEach(file => this.addImage(file));
        },
        addImage(file) {
            if (!file.type.match('image.*')) {
                this.$toastr.e(`${file.name} is not an image. Please try again`);
                return;
            }else if(file.size > 2500000){
                this.$toastr.e(`${file.name} image is too large. Please try again`);
                return;
            }

            this.files.push(file);
            const img = new Image(),
                reader = new FileReader();
            reader.onload = (e) => this.images.push(e.target.result);
            reader.readAsDataURL(file);


        },
        clearImages() {
            this.images = [];
            this.files = [];
        },
        getFileSize(size) {
            const fSExt = ['Bytes', 'KB', 'MB', 'GB'];
            let i = 0;

            while(size > 900) {
                size /= 1024;
                i++;
            }
            return `${(Math.round(size * 100) / 100)} ${fSExt[i]}`;
        },
        upload() {
            this.isLoading = true;

            const formData = new FormData();

            this.files.forEach(file => {
                formData.append('images[]', file, file.name);
            });
            var id = this.id = this.$route.params.id;
            axios.post('/api/images/'+id, formData)
                .then(response => {
                    // this.$toastr.s('All images uplaoded successfully');

                    this.$toastr.s(`Image uploaded successfully`);
                    this.images = [];
                    this.files = [];
                    Fire.$emit('RefreshTable');
                    this.isLoading = false;
                })
                .catch(()=>{
                    this.isLoading = false;
                    this.$toastr.e(`Image limit exceeded. Please clear all and try again.`);
                })


        },
        loadImages(){
            var id = this.id = this.$route.params.id;
            // this.isLoading = true;
            axios.get("api/imagesProducts/" + id)
                .then(( { data} ) => (this.imagesProducts = data.data) );

        },

        deleteImage(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if(result.value){
                    this.form.delete('api/imageUpload/'+id).then(()=>{
                         this.isLoading = false;
                        if (result.value) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        Fire.$emit('RefreshTable');
                    }
                    }) .catch(()=>{
                       Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again.',
                    })

                    this.isLoading = false;
                    })
                }
            })
        }
    },
    created(){
         var id = this.id = this.$route.params.id;
         if(id==null)
         {
             this.$router.push({ path : '/products' });
         }
         else{
            this.loadImages();
            Fire.$on('RefreshTable',() => {
                this.loadImages();
            });
         }

    }
}
</script>

<style lang="scss" scoped>
.uploader {
    width: 100%;
    background: #d8373e;
    color: #fff;
    padding: 40px 15px;
    text-align: center;
    border-radius: 10px;
    border: 3px dashed #fff;
    font-size: 20px;
    position: relative;
    &.dragging {
        background: #fff;
        color: #2196F3;
        border: 3px dashed #2196F3;
        .file-input label {
            background: #2196F3;
            color: #fff;
        }
    }
    i {
        font-size: 85px;
    }
    .file-input {
        width: 200px;
        margin: auto;
        height: 68px;
        position: relative;
        label,
        input {
            background: #fff;
            color: #2196F3;
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            padding: 10px;
            border-radius: 4px;
            margin-top: 7px;
            cursor: pointer;
        }
        input {
            opacity: 0;
            z-index: -2;
        }
    }
    .images-preview {
        display: flex;
        flex-wrap: wrap;
        margin-top: 20px;
        .img-wrapper {
            width: 160px;
            display: flex;
            flex-direction: column;
            margin: 10px;
            height: 150px;
            justify-content: space-between;
            background: #fff;
            box-shadow: 5px 5px 20px #3e3737;
            img {
                max-height: 105px;
            }
        }
        .details {
            font-size: 12px;
            background: #fff;
            color: #000;
            display: flex;
            flex-direction: column;
            align-items: self-start;
            padding: 3px 6px;
            .name {
                overflow: hidden;
                height: 18px;
            }
        }


    }
    .upload-control {
        position: absolute;
        width: 100%;
        background: #fff;
        top: 0;
        left: 0;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        padding: 10px;
        padding-bottom: 4px;
        text-align: right;
        button, label {
            background: #2196F3;
            border: 2px solid #03A9F4;
            border-radius: 3px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
        }
        label {
            padding: 2px 5px;
            margin-right: 10px;
        }
    }
    .p_drag{
        color: #FFF !important;
    }


}
</style>
