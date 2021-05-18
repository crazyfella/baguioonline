<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="myaccount-content">

                    <h3>Products</h3>

                    <div class="account-details-form" v-for="product in products" :key="product.id">

                            <form @submit.prevent="createProduct()">
                                <div class="single-input-item">
                                    <label for="full-name" class="required">Product Name</label>
                                    <input :value="product.productName"  type="text" name="productName" :class="{ 'is-invalid': form.errors.has('productName') }" placeholder="Full Name"> <has-error :form="form" field="productName"></has-error>
                                </div>

                                <div class="single-input-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="email" class="required">Price</label>
                                            <vue-numeric currency="Php" separator="," name="productPrice" v-bind:precision="2" :value="product.productPrice" :class="{ 'is-invalid': form.errors.has('productPrice') }"></vue-numeric>
                                            <has-error :form="form" field="productPrice"></has-error>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="brandName" >Brand Name</label>
                                            <input type="text" :value="product.productBrand" id="brandName" placeholder="Brand Name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="address">Product Details</label>
                                    <ckeditor :editor="editor" :value="product.productDescription" :config="editorConfig" name="description"></ckeditor>
                                    <has-error :form="form" field="address"></has-error>
                                </div>

                                <div class="single-input-item">
                                    <label for="">Information</label><br>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="color">Color:</label>
                                            <input type="text" :value="product.productColor" id="color" placeholder="Color" />
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="size">Size: </label>
                                            <input type="text" :value="product.productSize" id="size" placeholder="Size" />
                                        </div>
                                    </div>
                                </div>

                                 <div class="single-input-item" id="accordion">
                                    <div class="sidebar-widget mb-22">
                                        <label for="color">Categories:</label>
                                        <div class="sidebar-widget-body">

                                             <div class="sidebar-widget-body">
                                                <div class="accordion" id="accordionExample">


                                                    <!-- <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                            Automative & Motorcycles
                                                             {{product.productCategory}}
                                                            </button>
                                                        </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <div class="row">


                                                                <div v-for="cars in automotive" :key="cars.id" class="col-md-6">
                                                                    <div class="custom-control custom-checkbox">

                                                                        <input v-if="product.subCategory == cars.id" type="checkbox" class="custom-control-input" checked>

                                                                        <input v-else type="checkbox" class="custom-control-input" >
                                                                        <label class="custom-control-label" :for="cars.id">{{cars.sub_category}}</label>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div> -->

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

                                                                <div class="custom-control custom-checkbox">
                                                                        <input v-if="product.productCategory[0] == cars.id" type="checkbox" class="custom-control-input" checked>
                                                                        <input v-else-if="product.productCategory[1] == cars.id" type="checkbox" class="custom-control-input" checked>
                                                                        <input v-else-if="product.productCategory[2] == cars.id" type="checkbox" class="custom-control-input" checked>
                                                                        <input v-else-if="product.productCategory[3] == cars.id" type="checkbox" class="custom-control-input" checked>
                                                                        <input v-else-if="product.productCategory[4] == cars.id" type="checkbox" class="custom-control-input" checked>


                                                                        <input v-else type="checkbox" class="custom-control-input" :id="cars.id" :value="cars.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="cars.id">{{cars.sub_category}}</label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

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
                                                                            <input type="checkbox" class="custom-control-input" :id="sport.id" :value="sport.id" v-model="form.selectedCategory">
                                                                            <label class="custom-control-label" :for="sport.id">{{sport.sub_category}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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
                                                                        <input type="checkbox" class="custom-control-input" :id="fashion.id" :value="fashion.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="fashion.id">{{fashion.sub_category}}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

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
                                                                        <input type="checkbox" class="custom-control-input" :id="home.id" :value="home.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="home.id">{{home.sub_category}}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-header" id="headingFive">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                            Foods & Pets
                                                            </button>
                                                        </h2>
                                                        </div>
                                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div v-for="food in foods" :key="food.id" class="col-md-6">
                                                                    <div class="custom-control custom-checkbox mb-14">
                                                                        <input type="checkbox" class="custom-control-input" :id="food.id" :value="food.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="food.id">{{food.sub_category}}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

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
                                                                        <input type="checkbox" class="custom-control-input" :id="baby.id" :value="baby.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="baby.id">{{baby.sub_category}}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

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
                                                                        <input type="checkbox" class="custom-control-input" :id="health.id" :value="health.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="health.id">{{health.sub_category}}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

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
                                                                        <input type="checkbox" class="custom-control-input" :id="tv.id" :value="tv.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="tv.id">{{tv.sub_category}}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

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
                                                                        <input type="checkbox" class="custom-control-input" :id="electronic.id" :value="electronic.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="electronic.id">{{electronic.sub_category}}</label>
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
    export default {
        data(){


            return {


                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the rich-text editor.
                },

                categories: {},
                automotive: {},
                sports: {},
                fashions: {},
                homes :{},
                foods :{},
                babies :{},
                healths :{},
                tvs :{},
                electronics :{},
                products:{},
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
                })
            }
        },
         components: {
            category
        },
        methods: {

            createProduct(){
                this.$Progress.start();
                var id = this.id = this.$route.params.id;
                this.form.put('api/products/'+id)

                .then(()=>{

                    Toast.fire({
                        icon: 'success',
                        title: 'Product Successfully Added'
                    })

                })
                .catch(()=>{
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again.',
                    })
                })

                this.$Progress.finish()
            },

            loadProduct()
            {
                var id = this.id = this.$route.params.id;
                // axios.get("api/products/"+id)
                // .then(response => this.products = response.data);


                axios.get("api/products/"+id)
                .then(({ data }) => (this.form.fill(data)));

            },
            loadCategories()
            {
                axios.get("api/automotive").then(( { data } ) => (this.automotive = data.data));
                axios.get("api/sports").then(( { data } ) => (this.sports = data.data));
                axios.get("api/fashion").then(( { data } ) => (this.fashions = data.data));
                axios.get("api/home").then(( { data } ) => (this.homes = data.data));
                axios.get("api/foods").then(( { data } ) => (this.foods = data.data));
                axios.get("api/babies").then(( { data } ) => (this.babies = data.data));
                axios.get("api/healths").then(( { data } ) => (this.healths = data.data));
                axios.get("api/tvs").then(( { data } ) => (this.tvs = data.data));
                axios.get("api/electronics").then(( { data } ) => (this.electronics = data.data));
            }

        },
        created(){
                this.loadProduct();
                this.loadCategories();

        }
    }
</script>
