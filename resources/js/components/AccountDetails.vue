<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="myaccount-content">
                    <h3>Account Details</h3>
                    <div class="account-details-form">

                        <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>

                        <form @submit.prevent="UpdateUser">

                        <div class="single-input-item">
                            <div class="row">
                                    <div class="col-lg-3">
                                        <div class="profile-img-wrap">
                                            <div class="text-center"><img :src="getProfilePhoto()" class="" alt="profile"></div>
                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input class="upload" type="file" @change="updateProfile" name="photo_user">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        

                                        <div class="col-lg-12 mb-2">
                                            <label for="full-name" class="required">Full Name</label>
                                            <input v-model="form.name" type="text" name="name" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Full Name"> <has-error :form="form" field="fullName"></has-error>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="display-name"   class="required">Display / Shop Name</label>
                                            <input type="text" v-model="form.shop_name" id="display-name" placeholder="Shop Name" />
                                            <has-error :form="form" field="shop_name"></has-error>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <label for="full-name" class="required">Cover Photo (optional: Go with 1200 x 630)</label>
                                            

                                            
                                            <div class="cover-img-wrap">
                                                <div class="text-center"><img :src="getCoverPhoto()" class="" alt="profile"></div>
                                                <div class="fileupload btn">
                                                    <span class="btn-text">edit</span>
                                                    <input class="upload" type="file" @change="updateCover" name="cover_user">
                                                </div>

                                                <div v-if="coverPhoto!='no-image.jpg'">
                                                    <div class="deleteCover btn">
                                                        <span class="btn-text">remove</span>
                                                        <input class="delete" type="button" @click="deleteCover">
                                                    </div>
                                                </div>
                                                

                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>

                            <div class="single-input-item">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="email" class="required">Email Address</label>
                                        <input type="email" v-model="form.email" id="email" placeholder="Email Address" />
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="contact">Contact Number</label>
                                        <input type="text" v-model="form.contact" id="contact" placeholder="Contact Number" />
                                        <has-error :form="form" field="contact"></has-error>
                                    </div>
                                </div>

                            </div>


                            <div class="single-input-item">
                                <label for="address">Address / Store Location</label>
                                <ckeditor :editor="editor" v-model="form.address" name="description"></ckeditor>
                                <has-error :form="form" field="address"></has-error>
                            </div>

                            <div class="single-input-item welcome">
                                <label for="subscription">Subscription</label>
                                <div v-if="form.subscription=='1'">
                                        <strong>Free Subscription.</strong>
                                        <strong><a href="/pricing" class="logout"> Click here to upgrade</a></strong>
                                </div>

                                <div v-if="form.subscription=='2'">
                                        <strong>Basic Subscription.</strong>
                                        <strong><a href="/pricing" class="logout"> Click here to upgrade</a></strong>
                                </div>

                                <div v-else-if="form.subscription=='3'">
                                        <strong>Standard Subscription.</strong>
                                        <strong><a href="/pricing" class="logout"> Click here to upgrade</a></strong>
                                </div>

                                <div v-else-if="form.subscription=='4'">
                                        <strong>Premium Subscription.</strong>
                                        <!-- <strong><a href="#" class="logout"> Click here to upgrade</a></strong> -->
                                </div>



                            </div>

                            <fieldset>
                                <legend>Social Media</legend>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single-input-item">
                                            <label for="new-pwd" >Website</label>
                                            <input type="text" v-model="form.website" placeholder="Website Link"  />
                                            <has-error :form="form" field="website"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="new-pwd" >Facebook</label>
                                            <input type="text" v-model="form.facebook" placeholder="Facebook Link"  />
                                            <has-error :form="form" field="facebook"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="confirm-pwd" >Instagram</label>
                                            <input type="text" v-model="form.instagram" placeholder="Instagram Link" />
                                            <has-error :form="form" field="instagram"></has-error>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <hr>

                            <fieldset>
                                <legend>Password change</legend>
                                <div class="single-input-item">
                                    <label for="current-pwd" class="required">Current Password</label>
                                    <input v-model="form.current_password" type="password" name="current_password"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('current_password') }">
                                    <has-error :form="form" field="current_password"></has-error>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="new-pwd" class="required">New Password</label>
                                            <input type="password" v-model="form.new_password" placeholder="New Password" name="new_password" />
                                            <has-error :form="form" field="new_password"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <label for="confirm-pwd" class="required">Confirm Password</label>
                                            <input type="password" v-model="form.new_confirm_password" placeholder="Confirm Password" />
                                            <has-error :form="form" field="new_confirm_password"></has-error>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="single-input-item">
                                <button class="check-btn sqr-btn " type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {

        data(){
            return {
                editor: ClassicEditor,
                isLoading: false,
                fullPage: true,
                coverPhoto: '',
                form: new Form({
                    id: '',
                    name: '',
                    shop_name: '',
                    contact: '',
                    email: '',
                    address:'',
                    current_password: '',
                    new_password: '',
                    new_confirm_password: '',
                    photo_user    : '',
                    subscription: '',
                    facebook: '',
                    instagram: '',
                    website: '',
                    cover_user: '',
                })
            }
        },
        components: {
            Loading
        },
        methods: {
            loadProfile(){
                this.isLoading = true;
                axios.get("api/profile")
                    .then(
                    ({ data }) => (this.form.fill(data)),
                    this.isLoading = false
                );

                 axios.get("api/cover_user").then(({ data }) => {
                    this.coverPhoto = data.userCover;
                });
            },
            deleteCover(){
                Swal.fire({
                title: 'Are you sure you want to remove the cover?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    this.isLoading = true;
                    if(result.value){
                        this.form.post('api/coverPhoto').then(()=>{
                             this.isLoading = false;
                            if (result.value) {
                                
                                this.$toastr.s(
                                'Deleted!',
                                'Cover Image has been deleted.',
                                )
                                Fire.$emit('Refresh');
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
             getCoverPhoto(){
                let prefix = (this.form.cover_user.match(/\//) ? '' : '/images/cover/');
                return prefix + this.form.cover_user;
            },

            updateCover(e){ // CHANGE COVER PHOTO PROFILE

                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 2111775){
                    reader.onloadend = (file) => {
                    this.form.cover_user = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                     this.$toastr.e(`Image is too large. Please try again`);
                }
            },
            getProfilePhoto(){
                let prefix = (this.form.photo_user.match(/\//) ? '' : '/images/profile/');
                return prefix + this.form.photo_user;
            },

            updateProfile(e){ // CHANGE IMAGE PROFILE

                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['size'] < 2111775){
                    reader.onloadend = (file) => {
                    this.form.photo_user = reader.result;
                    }
                    reader.readAsDataURL(file);
                }else{
                     this.$toastr.e(`Image is too large. Please try again`);
                }
            },

            UpdateUser(){
                this.isLoading = true;
                if(this.form.new_password==this.form.new_confirm_password){
                    this.form.put('api/user/'+this.form.id)
                    .then(() => {
                    this.isLoading = false;
                     Toast.fire({
                        icon: 'success',
                        title: 'Account Successfully Updated'
                    })
                    window.location.reload();

                    })
                    .catch(() => {
                        this.isLoading = false;
                        this.$toastr.e("Failed!", "Something went wrong. Please try again.", "warning");
                    })
                }else{
                    this.isLoading = false;
                    this.$toastr.e(`The password confirmation does not match. Please try again.`);
                    this.form.new_password="";
                    this.form.new_confirm_password="";
                }

            }
        },
        created(){
            this.loadProfile();
             Fire.$on('Refresh',() => {
                    this.loadProfile();
                });
        },
        mounted() {

        }
    }
</script>
