<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="myaccount-content">

                    <h3>Products</h3>

                      <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>

                    <div class="account-details-form">

                            <form @submit.prevent="createProduct()">
                                <div class="single-input-item ">
                                    <label for="full-name" class="required">Product Name(maximum: 20 characters)</label>
                                    <div class="input-group">
                                        <input v-model="form.productName" type="text" name="productName" :class="{ 'is-invalid': form.errors.has('productName') }" placeholder="Full Name" :maxlength="max" class="form-control"> 

                                    <div class="input-group-prepend" >
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><div v-text="(max - form.productName.length)"></div></span>
                                    </div>
                                    </div>
                                    

                                    <has-error :form="form" field="productName"></has-error>
                                </div>

                                <div class="single-input-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="email" class="required">Price</label>
                                            <vue-numeric currency="Php" separator="," name="productPrice" v-bind:precision="2" v-model="form.productPrice" :class="{ 'is-invalid': form.errors.has('productPrice') }"></vue-numeric>
                                            <has-error :form="form" field="productPrice"></has-error>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="brandName" >Brand Name</label>
                                            <input type="text" v-model="form.productBrand" id="brandName" placeholder="Brand Name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="address">Featured Image</label>
                                    <div class="profile-img-wrap">

                                        <img :src="getFeaturedPhoto()" class="" alt="product">
                                        <div class="fileupload btn">
                                            <span class="btn-text">add image</span>
                                            <input class="upload" type="file" @change="updateFeaturedPhoto" name="photo">
                                        </div>
                                    </div>
                                    <has-error :form="form" field="photo"></has-error>
                                </div>

                                <div class="single-input-item">
                                    <label for="address">Product Details</label>
                                    <ckeditor :editor="editor" v-model="form.productDescription" :config="editorConfig" name="description"></ckeditor>
                                    <has-error :form="form" field="address"></has-error>
                                </div>

                                <div class="single-input-item">
                                    <label for="">Information</label><br>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="color">Color:</label>
                                            <input type="text" v-model="form.productColor" id="color" placeholder="Color" />
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="size">Size: </label>
                                            <input type="text" v-model="form.productSize" id="size" placeholder="Size" />
                                        </div>
                                    </div>
                                </div>

                                 <div class="single-input-item" id="accordion">
                                    <div class="sidebar-widget mb-22">
                                        <label for="color">Categories: (Choose 5)  <has-error :form="form" field="selectedCategory"></has-error></label>
                                        <div class="sidebar-widget-body">

                                             <div class="sidebar-widget-body">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                    Automative & Motorcycles
                                                                    </button>
                                                                </h2>
                                                                </div>

                                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div v-for="cars in automotive" :key="cars.id" class="col-md-6">
                                                                            <div class="custom-control custom-checkbox mb-14">
                                                                                <input type="checkbox" class="custom-control-input" :id="cars.id" :value="cars.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }" >
                                                                                <label class="custom-control-label" :for="cars.id">{{cars.sub_category}}</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Sports and Lifestyle
                                                                    </button>
                                                                </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div v-for="sport in sports" :key="sport.id" class="col-md-6">
                                                                                <div class="custom-control custom-checkbox mb-14">
                                                                                    <input type="checkbox" class="custom-control-input" :id="sport.id" :value="sport.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                                    <label class="custom-control-label" :for="sport.id">{{sport.sub_category}}</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>





                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                Fashions
                                                                </button>
                                                            </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div v-for="fashion in fashions" :key="fashion.id" class="col-md-6">
                                                                        <div class="custom-control custom-checkbox mb-14">
                                                                            <input type="checkbox" class="custom-control-input" :id="fashion.id" :value="fashion.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                            <label class="custom-control-label" :for="fashion.id">{{fashion.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-header" id="headingFour">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                Home and Living
                                                                </button>
                                                            </h2>
                                                            </div>
                                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div v-for="home in homes" :key="home.id" class="col-md-6">
                                                                        <div class="custom-control custom-checkbox mb-14">
                                                                            <input type="checkbox" class="custom-control-input" :id="home.id" :value="home.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                            <label class="custom-control-label" :for="home.id">{{home.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-header" id="headingTen">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                                Foods & Groceries
                                                                </button>
                                                            </h2>
                                                            </div>
                                                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div v-for="food in foods" :key="food.id" class="col-md-6">
                                                                        <div class="custom-control custom-checkbox mb-14">
                                                                            <input type="checkbox" class="custom-control-input" :id="food.id" :value="food.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                            <label class="custom-control-label" :for="food.id">{{food.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                Pets & Accessories
                                                                </button>
                                                            </h2>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div v-for="pet in pets" :key="pet.id" class="col-md-6">
                                                                        <div class="custom-control custom-checkbox mb-14">
                                                                            <input type="checkbox" class="custom-control-input" :id="pet.id" :value="pet.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                            <label class="custom-control-label" :for="pet.id">{{pet.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-header" id="headingSix">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                Babies & Toys
                                                                </button>
                                                            </h2>
                                                            </div>
                                                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div v-for="baby in babies" :key="baby.id" class="col-md-6">
                                                                        <div class="custom-control custom-checkbox mb-14">
                                                                            <input type="checkbox" class="custom-control-input" :id="baby.id" :value="baby.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                            <label class="custom-control-label" :for="baby.id">{{baby.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-header" id="headingSeveb">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                Health & Beauty
                                                                </button>
                                                            </h2>
                                                            </div>
                                                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeveb" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div v-for="health in healths" :key="health.id" class="col-md-6">
                                                                        <div class="custom-control custom-checkbox mb-14">
                                                                            <input type="checkbox" class="custom-control-input" :id="health.id" :value="health.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                            <label class="custom-control-label" :for="health.id">{{health.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-header" id="headingEight">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                TV & Home Appliances
                                                                </button>
                                                            </h2>
                                                            </div>
                                                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div v-for="tv in tvs" :key="tv.id" class="col-md-6">
                                                                        <div class="custom-control custom-checkbox mb-14">
                                                                            <input type="checkbox" class="custom-control-input" :id="tv.id" :value="tv.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                            <label class="custom-control-label" :for="tv.id">{{tv.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-header" id="headingNine">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                                Electronic Devices
                                                                </button>
                                                            </h2>
                                                            </div>
                                                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div v-for="electronic in electronics" :key="electronic.id" class="col-md-6">
                                                                        <div class="custom-control custom-checkbox mb-14">
                                                                            <input type="checkbox" class="custom-control-input" :id="electronic.id" :value="electronic.id" v-model="form.selectedCategory" :class="{ 'is-invalid': form.errors.has('selectedCategory') }">
                                                                            <label class="custom-control-label" :for="electronic.id">{{electronic.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </div><!-- end row categories-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="single-input-item ">
                                    <button  type="submit" class="check-btn sqr-btn" >Create</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import category from './Categories.vue';

    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    export default {
        data(){

            return {
                isLoading: false,
                fullPage: true,
                editor: ClassicEditor,
                editorConfig: {

                },
                categories: {},
                automotive: {},
                sports: {},
                fashions: {},
                homes :{},
                foods :{},
                pets :{},
                babies :{},
                healths :{},
                tvs :{},
                electronics :{},
                products:{},
                max: 20,
                text: '',
                form: new Form({
                    id: '',
                    productName: '',
                    productBrand: '',
                    productPrice: '',
                    productDescription: '',
                    productColor: '',
                    productSize: '',
                    category: '',
                    sub_category: '',
                    selectedCategory: [],
                    photo: '',
                })
            }
        },
         components: {
            category,
            Loading
        },
        methods: {

           getFeaturedPhoto(){
                let prefix = (this.form.photo.match(/\//) ? '' : '/images/featured/add-image.png');
                return prefix + this.form.photo;

            },

            updateFeaturedPhoto(e){ // CHANGE IMAGE PROFILE

                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 2111775){
                    reader.onloadend = (file) => {
                    this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                     this.$toastr.e(`Image is too large. Please try again`);
                }
            },
            createProduct(){
                this.isLoading = true;

                this.form.post('api/products')

                .then((response)=>{

                    Toast.fire({
                        icon: 'success',
                        title: 'Product Successfully Added. Add Images to your products'
                    })

                    if(response.status === 200) {
                        this.$router.push({ path : '/products' });

                        }

                   
                    this.isLoading = false;

                })
                .catch(error=>{

                    this.isLoading = false;
                    if (error.response.status == 500){
                        this.$toastr.e(`Product Limit Exceeded. Visit pricing page to upgrade your subscription`);
                    }else{
                        this.$toastr.e(`There were some problems with your input. Please check required fields.`);
                    }
                })


            },

            loadCategories()
            {
                   axios.get("api/categories").then(( { data } ) => (this.categories = data.data));
            }

        },
        created(){

              axios.get("api/automotive").then(( { data } ) => (this.automotive = data.data));
              axios.get("api/sports").then(( { data } ) => (this.sports = data.data));
              axios.get("api/fashion").then(( { data } ) => (this.fashions = data.data));
              axios.get("api/home").then(( { data } ) => (this.homes = data.data));
              axios.get("api/foods").then(( { data } ) => (this.foods = data.data));
              axios.get("api/pets").then(( { data } ) => (this.pets = data.data));
              axios.get("api/babies").then(( { data } ) => (this.babies = data.data));
              axios.get("api/healths").then(( { data } ) => (this.healths = data.data));
              axios.get("api/tvs").then(( { data } ) => (this.tvs = data.data));
              axios.get("api/electronics").then(( { data } ) => (this.electronics = data.data));
        }
    }
</script>
