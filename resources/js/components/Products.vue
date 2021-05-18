<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="myaccount-content">
                    <h3>Products</h3>

                    <div v-if="subscription.limit >= productCount">
                        <router-link :to="{ name: 'newProduct'}" class="sqr-btn btn-sm"><i class="fa fa-plus "> Add New Product</i></router-link>
                    </div>
                    <div v-else>
                        Product Limit Exceeded. Visit <a href="/pricing">Pricing</a> for more information.
                    </div>
                    <br>
                    <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>

                    <div class="account-details-form product-list-item">
                        <div class="table-responsive">
                            <div class="table-style">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="dataTable_length">
                                            <label> 
                                                <select  v-model="length" @change="resetPagination()" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="dataTable_filter" class="dataTables_filter float-right">
                                            <label><input class="form-control form-control-sm input" type="text" v-model="search" placeholder="Search..." @input="resetPagination()" style="width: 250px;"></label
                                        ></div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered w-100 text-nowrap">
                                <thead class="">
                                <tr>
                                    <th v-for="column in columns" :key="column.name" @click="sortBy(column.name)"
                                    :class="sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'"
                                    style="cursor:pointer;">
                                    {{column.label}}
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="product in paginatedProducts" :key="product.id">
                                        <td>{{product.productName}}</td>
                                        <td>Php {{formatPrice(product.productPrice) }}</td>
                                        <td>{{product.created_at | myDate}}</td>
                                        <td>
                                            <div class="product-list-content" style="margin-top:-20px">
                                                <div class="product-list-action-link">

                                                    <a href="#" @click="editModal(product)" data-toggle="modal" data-placement="top" title="Edit Product"><i class="fa fa-edit"></i></a>

                                                    <a href="#" @click="editCategory(product.id)" data-toggle="modal" data-placement="top" title="Edit Category"><i class="fa fa-th-list"></i></a>

                                                    <router-link :to="{ name: 'imageUpload', params: { id: product.id } }" > <span data-placement="top" title="Add Image"><i class="fa fa-file-image-o"></i></span> </router-link>

                                                    <a href="#"  data-placement="top" title="Delete" @click="deleteProduct(product.id)"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div>
                                <!-- PAGINATION-->
                                <div class="row mt-4 mb-3" v-if="!tableShow.showdata">
                                    <div class="col-md-5">
                                        <span class="page-stats">
                                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                                    Showing {{pagination.from}} to {{pagination.to}} of {{filteredProducts.length}}
                                                    <span v-if="`filteredProducts.length < pagination.total`"></span>
                                                </div>
                                            </span>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item">
                                                <a v-if="pagination.prevPageUrl" class="page-link" @click="--pagination.currentPage"> <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span> </a>
                                                <a class="page-link s" v-else disabled> <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span> </a>
                                            </li>
                                            <li class="page-item">
                                                <a v-if="pagination.nextPageUrl" class="page-link " @click="++pagination.currentPage"> <i class="fa fa-angle-right"></i><span class="sr-only">Next</span> </a>
                                                <a class="page-link " v-else disabled> <i class="fa fa-angle-right"></i><span class="sr-only">Next</span> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row mt-4 mb-3" v-else>
                                    <div class="col-md-5">
                                        <span class="page-stats">
                                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                                Showing {{pagination.from}} to {{pagination.to}} of {{filteredProducts.length}}
                                                <span v-if="`filteredProducts.length < pagination.total`"></span>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item">
                                                <a v-if="pagination.prevPage" class="page-link " @click="--pagination.currentPage"> <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span> </a>
                                                <a class="page-link " v-else disabled> <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span> </a>
                                            </li>
                                            <li class="page-item">
                                                <a v-if="pagination.nextPage" class="page-link " @click="++pagination.currentPage"> <i class="fa fa-angle-right"></i><span class="sr-only">Next</span> </a>
                                                <a class="page-link "  v-else disabled> <i class="fa fa-angle-right"></i><span class="sr-only">Next</span> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- END PAGINATION -->



                            </div>
                    
                           
                        </div>
                </div>
                <br>
                    <i class="fa fa-edit"></i> Edit Product <br>
                    <i class="fa fa-th-list"></i> Edit Categories<br>
                    <i class="fa fa-file-image-o"></i> Add / Edit Images<br>
                    <i class="fa fa-trash"></i> Delete Product 
            </div>
        </div>

</div><!-- End Container -->

<!-- Modal Product EDIT -->
    <div id="productEdit" class="modal bd-example-modal-lg" data-easein="whirlIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title">
                        Update Product
                    </h4>
                </div>
                <div class="modal-body">
                   <div class="account-details-form">
                        <form @submit.prevent="updateProduct()">
                            <div class="single-input-item">
                                <label for="full-name" class="required">Product Name</label>
                                <input v-model="form.productName" type="text" name="productName" :class="{ 'is-invalid': form.errors.has('productName') }" placeholder="Full Name"> <has-error :form="form" field="productName"></has-error>
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
                            <div class="profile-img-wrap">

                                <img :src="getFeaturedPhoto()" class="" alt="profile">
                                <div class="fileupload btn">
                                    <span class="btn-text">edit</span>
                                    <input class="upload" type="file" @change="updateFeaturedPhoto" name="photo">
                                </div>
                            </div>
                                </div>

                            <div class="single-input-item">
                                <label for="productDescription">Product Details</label>
                                <ckeditor :editor="editor" v-model="form.productDescription" :config="editorConfig" name="description"></ckeditor>
                                <has-error :form="form" field="productDescription"></has-error>
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
                            <br><br>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">
                                    Close
                                </button>
                                <button class="check-btn sqr-btn" type="submit">
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal Category Edit -->

<div id="categoryEdit" class="modal bd-example-modal-lg" data-easein="whirlIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title">
                        Update Product Categories
                    </h4>
                </div>
                <div class="modal-body">
                   <div class="account-details-form">

                   <!-- <div class="account-details-form"> -->
                        <form @submit.prevent="updateCategory(productId.product_id)">
                                <div class="single-input-item" id="accordion">
                                <div class="sidebar-widget mb-22">
                                    <label for="color">Categories: (Choose not more than 5)  <has-error :form="form" field="selectedCategory"></has-error></label>
                                    <div class="sidebar-widget-body">
                                        <div class="accordion" id="accordionExample">

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
                                                                        <input type="checkbox" class="custom-control-input" :id="cars.id" :value="cars.id"  v-model="form.selectedCategory">
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
                                                        <div class="card-header" id="headingTen">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                            Foods & Pets
                                                            </button>
                                                        </h2>
                                                        </div>
                                                        <div id="collapseTen" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
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
                                                                        <input type="checkbox" class="custom-control-input" :id="pet.id" :value="pet.id" v-model="form.selectedCategory">
                                                                        <label class="custom-control-label" :for="pet.id">{{pet.sub_category}}</label>
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

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">
                                    Close
                                </button>
                                <button class="check-btn sqr-btn" type="submit">
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

    export default {
        data(){
            let sortOrders = {};
            let columns = [
                {label: 'Product', name: 'productName' },
                {label: 'Price', name: 'productPrice' },
                {label: 'Date Added', name: 'created_at'},
            ];
            columns.forEach((column) => {
                sortOrders[column.name] = -1;
            });
            return {
                isLoading: false,
                fullPage: true,
                showModal: false,
                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the rich-text editor.
                },
                editmode: false,

                automotive: {},
                sports: {},
                fashions: {},
                homes :{},
                foods :{},
                pets: {},
                babies :{},
                healths :{},
                tvs :{},
                electronics :{},

                // products: {},
                newProduct: {},
                categories: {},
                productCount: '',
                userType:'',
                userSubscribe: '',
                subscription: '',
                productId: '',
                form: new Form({
                    id: '',
                    productName: '',
                    productBrand: '',
                    productPrice: '',
                    productDescription: '',
                    productColor: '',
                    productSize: '',
                    selectedCategory: [],
                    photo: '',
                }),
                products: [],
                columns: columns,
                sortKey: 'created_at',
                sortOrders: sortOrders,
                length: 10,
                search: '',
                tableShow: {
                    showdata: true,
                },
                pagination: {
                    currentPage: 1,
                    total: '',
                    nextPage: '',
                    prevPage: '',
                    from: '',
                    to: ''
                },
            }
        },
        components: {
            Loading
        },


        methods: {
            loadProducts() {
		
                axios.get('api/products/', {params: this.tableShow})
                .then(response => {
                    console.log('The data: ', response.data)
                    this.products = response.data;
                    this.pagination.total = this.products.length;
                })
                .catch(errors => {
                    console.log(errors);
                });

                axios.get("api/productCount").then(({ data }) => {
                    this.productCount = data.products_count;
                });

                axios.get("api/subscription").then(({ data }) => {
                    this.subscription = data.userSubs;

                });
            },

            getFeaturedPhoto(){
                let prefix = (this.form.photo.match(/\//) ? '' : '/images/featured/');
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
            updateCategory(id){
                $('#categoryEdit').modal('hide');
                this.isLoading = true;
                

                this.form.put('api/udpateCategory/'+id)

                .then(()=>{
                    this.isLoading = false;
                    
                    this.$toastr.s('Product Successfully Updated');
                })
                .catch(error=>{

                    this.isLoading = false;
                    if (error.response.status == 500){
                        this.$toastr.e(`Product Limit Exceeded. Please visit for more information`);
                    }else{
                        this.$toastr.e(`There were some problems with your input.`);
                    }
                })
            },
            updateProduct(id){
                $('#productEdit').modal('hide');
                this.isLoading = true;
                this.form.put('api/products/'+this.form.id)
                .then(() => {
                        
                        this.$toastr.s('Product Successfully Updated');
                        Fire.$emit('RefreshTable');
                        this.isLoading = false;

                })
                .catch(() => {
                    this.isLoading = false;
                    this.$toastr.e("Failed!", "There was something wrong", "warning");
                })
            },
            deleteProduct(id){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    this.isLoading = true;
                    if(result.value){
                        this.form.delete('api/products/'+id).then(()=>{
                            Fire.$emit('RefreshTable');
                            if (result.value) {
                                
                                this.isLoading = false;
                                this.$toastr.s(
                                'Deleted!',
                                'Your file has been deleted.',
                                )
                            }

                        }) .catch(()=>{
                            this.isLoading = false;
                            this.$toastr.e("Failed!", "There was something wrong", "warning");
                        })
                    }else{
                        this.isLoading = false;
                    }
                })
            },

            editModal(product){
                this.form.reset();
                $('#productEdit').modal('show');
                this.form.fill(product);
            },
            editCategory(id){
                this.form.reset();
                this.isLoading = true;
                // axios.get("api/productsCategory/"+id)
                // .then(response => this.categories = response.data);productId

                axios.get("api/productsCategory/"+id).then(({ data }) => {
                this.productId = data.productIdCategory;
                });
                // axios.get("api/productsCategory/"+id).then(( { data } ) => (this.categories = data.data));
                this.isLoading = false;
                $('#categoryEdit').modal('show');



            },
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace(',', '.')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            },
            paginate(array, length, pageNumber) {
                this.pagination.from = array.length ? ((pageNumber - 1) * length) + 1 : ' ';
                this.pagination.to = pageNumber * length > array.length ? array.length : pageNumber * length;
                this.pagination.prevPage = pageNumber > 1 ? pageNumber : '';
                this.pagination.nextPage = array.length > this.pagination.to ? pageNumber + 1 : '';
                return array.slice((pageNumber - 1) * length, pageNumber * length);
            },
            resetPagination() {
                this.pagination.currentPage = 1;
                this.pagination.prevPage = '';
                this.pagination.nextPage = '';
            },
            sortBy(key) {
                this.resetPagination();
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
            },
            getIndex(array, key, value) {
                return array.findIndex(i => i[key] == value)
            },

        },
            computed: {
            filteredProducts() {
                let products = this.products;
                if (this.search) {
                    products = products.filter((row) => {
                        return Object.keys(row).some((key) => {
                        return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                        })
                    });
                }
                let sortKey = this.sortKey;
                let order = this.sortOrders[sortKey] || 1;
                if (sortKey) {
                    products = products.slice().sort((a, b) => {
                        let index = this.getIndex(this.columns, 'name', sortKey);
                        a = String(a[sortKey]).toLowerCase();
                        b = String(b[sortKey]).toLowerCase();
                        if (this.columns[index].type && this.columns[index].type === 'date') {
                            return (a === b ? 0 : new Date(a).getTime() > new Date(b).getTime() ? 1 : -1) * order;
                        } else if (this.columns[index].type && this.columns[index].type === 'number') {
                            return (+a === +b ? 0 : +a > +b ? 1 : -1) * order;
                        } else {
                            return (a === b ? 0 : a > b ? 1 : -1) * order;
                        }
                    });
                }
                return products;
            },
            paginatedProducts() {
                return this.paginate(this.filteredProducts, this.length, this.pagination.currentPage);
            },
        },

        created(){

                this.loadProducts();
                Fire.$on('RefreshTable',() => {
                    this.loadProducts();
                });
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
