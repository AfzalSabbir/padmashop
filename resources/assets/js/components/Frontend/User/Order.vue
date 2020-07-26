<template>
    <div v-cloak>
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
                    <h5 class="mb-0">Total Order: <span>{{ orders.length }}</span></h5>
                    <i v-if="orders.length == 0" class="fas fa-spinner fa-pulse fa-3x fa-fw position-absolute r-0 t-3"></i>
                </div>
                <div class="card-body row">
                   <!--  <div class="col-md-12" v-for="order in orders">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Order ID: <span>{{ '#'+generetID(order.id) }}</span> (<span>{{ order.order_items.length }}</span> items) | Total Amount: TK. <span>{{ order.total_price }}</span></h4>
                            </div>        
                            <div class="col-md-4">
                                <button class="btn btn-success float-right" role="button" v-if="order.is_paid == 0" @click="gotoPayment(order.id)">Pay This Order</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <ul class="list-group">
                                    <li>
                                        <a @click="linking(order.id, order.order_status, '0')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'pending')"><i class="fas fa-hourglass-half"></i> Pending</a>
                                    </li>
                                    <li>
                                        <a @click="linking(order.id, order.order_status, '1')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'received')"><i class="fas fa-handshake" ></i> Received</a>
                                    </li>
                                    <li>
                                        <a @click="linking(order.id, order.order_status, '2')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'processing')"><i class="fa fa-spinner" ></i> Procesing</a>
                                    </li>
                                    <li>
                                        <a @click="linking(order.id, order.order_status, '3')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'on_the_way')"><i class="fa fa-motorcycle" ></i> On the Way</a>
                                    </li>
                                    <li>
                                        <a @click="linking(order.id, order.order_status, '4')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'delivered')"><i class="fa fa-check" ></i> Delivered</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-9">
                                <div class="form-row">
                                    <div class="col-md-2" v-for="item in order.order_items">
                                        <a @click="linking_2(item.product.slug)">
                                            <div class="my-2 py-1 px-2 or_pro_style" v-bind:class="checkStatus_2(item.order_status)" :title="item.product.title">
                                                <h4 style="line-height: 42px; height: 42px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ item.product.title }}</h4>
                                                <p>{{ item.price }} Tk</p>
                                                <p><span class="float-left"><i v-bind:class="checkStatus_icon(item.order_status)"></i></span>{{ item.quantity }} {{ item.product.unit.title }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"><hr class="hr"></div>
                        </div>
                    </div> -->
                    
                    
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="50">SL</th>
                                    <th>Order ID</th>
                                    <th>Items</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th width="160">Payment</th>
                                    <th width="10%">Action</th>
                                </tr>
                                <tr v-for="(order, index) in orders">
                                    <td>{{ index+1 }}</td>
                                    <td>{{ '#'+generetID(order.id) }}</td>
                                    <td>{{ order.order_items.length }}</td>
                                    <td>{{ order.total_price }} TK</td>
                                    <td style="width: 170px;text-align: center;">
                                        <ul class="list-group">
                                            <li>
                                                <a v-if="order.order_status == 0" @click="linking(order.id, order.order_status, '0')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'pending')"><i class="fas fa-hourglass-half"></i> Pending</a>
                                            </li>
                                            <li>
                                                <a v-if="order.order_status == 1" @click="linking(order.id, order.order_status, '1')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'received')"><i class="fas fa-handshake" ></i> Received</a>
                                            </li>
                                            <li>
                                                <a v-if="order.order_status == 2" @click="linking(order.id, order.order_status, '2')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'processing')"><i class="fa fa-spinner" ></i> Procesing</a>
                                            </li>
                                            <li>
                                                <a v-if="order.order_status == 3" @click="linking(order.id, order.order_status, '3')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'on_the_way')"><i class="fa fa-motorcycle" ></i> On the Way</a>
                                            </li>
                                            <li>
                                                <a v-if="order.order_status == 4" @click="linking(order.id, order.order_status, '4')" class="text-white list-group-item br-0 bo-b-0" v-bind:class="checkStatus(order.order_status, 'delivered')"><i class="fa fa-check" ></i> Delivered</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning" role="button" v-if="order.is_paid == 0" @click="gotoPayment(order.id)" style="font-size: 14px;">Pay This Order</button>
                                        <p v-if="order.is_paid != 0" class="text-success">Payment Complate</p>
                                    </td>
                                    <td>
                                        <button class="btn" @click="product_delails(order.id)" style="background: #337ab7;color:#fff">Details</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Order",
    props: {
        auth: {
            type: Object,
            required: true
        }
    },
    data(){
        return {
            orders: [],
            status: '',
            url: ''
        }
    },
    methods: {
        checkStatus: function(orderStatus, status_word){
            var class_status = '';
            if(orderStatus == 0 && status_word == 'pending'){
                class_status = "bg-secondary border-secondary text-white cursor-pointer";
            }
            else if(orderStatus == 1 && status_word == 'received'){
                class_status = "bg-info border-info text-white cursor-pointer";
            }
            else if(orderStatus == 2 && status_word == 'processing'){
                class_status = "bg-warning border-warning text-white cursor-pointer";
            }
            else if(orderStatus == 3 && status_word == 'on_the_way'){
                class_status = "bg-primary border-primary text-white cursor-pointer";
            }
            else if(orderStatus == 4 && status_word == 'delivered'){
                class_status = "bg-success border-success text-white cursor-pointer";
            } else {
                class_status = "text-secondary cursor-default";
            }

            return class_status;
        },
        generetID: function(order_id){

            var link = '0'+order_id;
            link = link.substring(1);
            
            if(link.length < 2){
                link = "00000"+link;
            }
            else if(link.length < 3){
                link = "0000"+link;
            }
            else if(link.length < 4){
                link = "000"+link;
            }
            else if(link.length < 5){
                link = "00"+link;
            }
            else if(link.length < 6){
                link = "0"+link;
            } else {
                link = link;
            }

            return link;
        },
        linking: function(order_id, order_state, own_state){
            var link = '';
            if(order_state == 0 && own_state == '0'){
                link = window.location.href = this.url+"/order/detail/"+order_id;
            }
            else if(order_state == 1 && own_state == '1'){
                link = window.location.href = this.url+"/order/detail/"+order_id;
            }
            else if(order_state == 2 && own_state == '2'){
                link = window.location.href = this.url+"/order/detail/"+order_id;
            }
            else if(order_state == 3 && own_state == '3'){
                link = window.location.href = this.url+"/order/detail/"+order_id;
            }
            else if(order_state == 4 && own_state == '4'){
                link = window.location.href = this.url+"/order/detail/"+order_id;
            } else {
                link = "#";
            }

            return link;
        },
        product_delails:function(order_id){
            return window.location.href = this.url+"/order/detail/"+order_id;
        },
        checkStatus_2: function(orderStatus){
            var class_status = '';
            if(orderStatus == 0){
                class_status = "bg-secondary border-secondary text-white cursor-pointer";
            }
            else if(orderStatus == 1){
                class_status = "bg-info border-info text-white cursor-pointer";
            }
            else if(orderStatus == 2){
                class_status = "bg-warning border-warning text-white cursor-pointer";
            }
            else if(orderStatus == 3){
                class_status = "bg-primary border-primary text-white cursor-pointer";
            }
            else if(orderStatus == 4){
                class_status = "bg-success border-success text-white cursor-pointer";
            } else {
                class_status = "text-secondary cursor-default";
            }

            return class_status;
        },
        checkStatus_icon: function(orderStatus){
            var class_status = '';
            if(orderStatus == 0){
                class_status = "fas fa-hourglass-half";
            }
            else if(orderStatus == 1){
                class_status = "fas fa-handshake";
            }
            else if(orderStatus == 2){
                class_status = "fa fa-spinner";
            }
            else if(orderStatus == 3){
                class_status = "fa fa-motorcycle";
            }
            else if(orderStatus == 4){
                class_status = "fa fa-check";
            } else {
                class_status = "fas fa-hourglass-half";
            }

            return class_status;
        },
        linking_2: function(product_slug){
            var link = '';
            if(product_slug){
                link = window.location.href = this.url+"/product/"+product_slug;
            }else {
                link = "#";
            }

            return link;
        },
        gotoPayment: function(orderId){
            window.location.href = this.url+"/order/"+orderId;
        }
    },
    computed: {

    },
    mounted(){
        this.url = this.$store.state.front_url;

        axios.get(this.url+'/user/get-my-order/'+this.auth.id)
        .then((response) => {
            this.orders = response.data;
        })
        .catch((exception) => {
            console.log(exception)
        });
    }
}
</script>

<style scoped>

</style>
