<template>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="myaccount-content">
                    <h3>Inbox</h3>
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
                                <tr v-for="list in paginatedInboxes" :key="list.id">
                                    
                                    <th v-if="list.status == 0">{{list.name}}</th>
                                    <td v-else>{{list.name}}</td>
                                    
                                    <th v-if="list.status == 0">{{list.subject}}</th>
                                    <td v-else>{{list.subject}}</td>

                                    <th v-if="list.status == 0">{{list.created_at | myDate}}</th>
                                    <td v-else>{{list.created_at | myDate}}</td>
                                    
                                    <td>
                                        <div class="product-list-content" style="margin-top:-20px">
                                            <div class="product-list-action-link">

                                                <!-- <a href="#" @click="viewMessage(list)" data-toggle="modal" data-placement="top" title="View Message"><i class="fa fa-eye"></i></a> -->

                                                <router-link :to="{ name: 'readMessage', params: { id: list.id } }" > <span data-placement="top" title="Read Message"><i class="fa fa-eye"></i></span> </router-link>

                                                <a href="#"  data-placement="top" title="Delete" @click="deleteMessage(list.id)"><i class="fa fa-trash"></i></a>

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
                                                Showing {{pagination.from}} to {{pagination.to}} of {{filteredInboxes.length}}
                                                <span v-if="`filteredInboxes.length < pagination.total`"></span>
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
                                            Showing {{pagination.from}} to {{pagination.to}} of {{filteredInboxes.length}}
                                            <span v-if="`filteredInboxes.length < pagination.total`"></span>
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
            </div>
        </div>
    </div>
 


    </div>
</template>

<script>
    export default {
        data(){
              let sortOrders = {};
            let columns = [
                {label: 'Name', name: 'name' },
                {label: 'Subject', name: 'subject' },
                {label: 'Date Added', name: 'created_at'},
            ];
            columns.forEach((column) => {
                sortOrders[column.name] = -1;
            });
            return{
                messages: {},
                form:new Form({
                    id: '',
                    userId: '',
                    name: '',
                    subject: '',
                    messages: '',
                    contact: '',
                    productName: '',
                    productPrice: ''
                }),
            inboxes: [],
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
        methods: {
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace(',', '.')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            },
            loadMessage() {

                axios.get('api/inbox/', {params: this.tableShow})
                .then(response => {
                    console.log('The data: ', response.data)
                    this.inboxes = response.data;
                    this.pagination.total = this.inboxes.length;
                })
                .catch(errors => {
                    console.log(errors);
                });

            },
            
          
            deleteMessage(id){

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
                        this.form.delete('api/inbox/'+id).then(()=>{
                            if (result.value) {
                                this.isLoading = false;
                                this.$toastr.s(
                                'Your message has been deleted.',
                                )
                                Fire.$emit('RefreshTable');
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
            filteredInboxes() {
                let inboxes = this.inboxes;
                if (this.search) {
                    inboxes = inboxes.filter((row) => {
                        return Object.keys(row).some((key) => {
                        return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                        })
                    });
                }
                let sortKey = this.sortKey;
                let order = this.sortOrders[sortKey] || 1;
                if (sortKey) {
                    inboxes = inboxes.slice().sort((a, b) => {
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
                return inboxes;
            },
            paginatedInboxes() {
                return this.paginate(this.filteredInboxes, this.length, this.pagination.currentPage);
            },
        },
        created(){
            this.loadMessage();
            Fire.$on('RefreshTable',() => {
                this.loadMessage();
            });
        }
    }
</script>
