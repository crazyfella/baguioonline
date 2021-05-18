<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                   
                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                        <div class="myaccount-content">
                             <router-link to="/inbox"  class="check-btn sqr-btn"><i class="fa fa-arrow-left"></i>Back to Inbox</router-link>
                             <br><br>
                            <div v-for="message in messages" :key="message.id">
                               
                                <h3>{{message.subject}}</h3>
                                <div class="welcome"> 
                                   
                                    <b>Message:</b><div class="content" v-html="message.messages"></div>
                                </div>
                                <h3></h3>
                                <p><b>Sender:</b> {{message.name}}</p>
                                <p><b>Contact Number:</b> {{message.contact}}</p>
                            </div>
                            
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
                messages: {}
               
            }
        },
        methods: {

        },
         created(){
            var id = this.id = this.$route.params.id;
            axios.get("api/inbox/" + id)
                 .then(( { data} ) => (this.messages = data.data) )
                .catch(error=>{
                    if (error.response.status == 500){
                        this.$toastr.e(`Error: Please refresh page`);
                    }
                });
        },
        mounted() {

        }
    }
</script>
