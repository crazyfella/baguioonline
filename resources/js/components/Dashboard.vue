<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Dashboard</h3>
                            <div class="welcome">
                                <p>Hello, <strong>{{details.name}}</strong> (If Not <strong>{{details.name}}!</strong> Please Logout)</p>
                            </div><br>
                            <p class="mb-3">From your account dashboard. you can easily check & add or delete your recent products, manage your account details and edit your password.</p>

                             <div class="welcome mb-3"><p><strong>For new user</strong> Please update your <b><router-link to="/accountDetails">Account Details</router-link></b> before adding products.</p></div>



                             <a :href="'store/' + details.slug_shop" class="check-btn sqr-btn mb-3">View Store</a>

                          <div class="fb-share-button" :data-href="'https://baguioonline.com/store/'+details.slug_shop" data-layout="button" data-size="large"><a target="_blank" :href="'https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fbaguioonline.com%2Fstore%2F'+details.slug_shop+'&amp;src=sdkpreparse'" class="btn btn-social btn-facebook"><span class="fa fa-facebook"></span> Share your store</a></div>

                           
                           
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                details: '',
                form: new Form({
                    fullname: '',
                    displayName: '',
                    email: '',
                    password: '',
                })
            }
        },
        methods: {

        },
         created(){

            axios.get("api/dashboard").then(({ data }) => {
                    this.details = data.userDashboard;
                });
        },
        mounted() {

        }
    }
</script>
