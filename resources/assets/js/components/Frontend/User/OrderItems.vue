<template>	
    <div class="card w-100">
        <div class="card-header">
            <h4>All Items <small style="color: #ffc107;">{{ message }}</small> <span class="ditted float-right">Total Item: {{ +order.total_quantity }}</span></h4>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
	            <table class="table mb-0 table-bordered">
	                <tr>
	                    <th>SL</th>
	                    <th>Title</th>
	                    <th>Qty</th>
	                    <th>Price</th>
	                    <th>Total</th>
	                    <th>Action</th>
	                </tr>
	                <tr v-for="(item, key) in order.order_items">
	                    <td>{{ key+1 }}</td>
	                    <td style="font-size: 11px;">{{ item.product.title }}</td>
	                    <td class="text-center">{{ +item.quantity }}</td>
	                    <td>{{ +item.price }}</td>
	                    <td>{{ item.quantity*item.price }}</td>
	                    <td class="d-flex justify-content-center">
	                        <a href="#" class="btn btn-sm btn-success" v-if="item.is_return != 1" @click="ProductReturn(item.id)">Return</a>
	                        <a href="#" class="btn btn-sm btn-warning" v-else>Processing</a>
	                    </td>
	                </tr>
	                <tr>
	                	<td colspan="4" style="text-align: right;">Total</td>
	                	<td colspan="2" style="text-align: left;">{{ +order.total_price }} TK</td>
	                </tr>
	            </table>
        	</div>
        </div>
        <div class="loader" v-if="loader">
        	<div class="loader_caption">
        		Looding...
        	</div>
        </div>
    </div>
</template>
<script>
	export default {
		name: "OrderItems",
		props:{
			order_id:{
				type: Number,
				required: true,
			}
		},
		data(){
			return {
				url:'',
				order: [],
				loader: false,
				message: '',
			}
		},
		mounted(){
			this.url = this.$store.state.front_url;
			/*
			* ============================
			* Get All Items from Orders
			* ==========================
			*/
			axios.get(this.url+"/user/order/items/"+this.order_id)
			.then((response)=>{
				this.order = response.data; 
			})
			.catch((exception)=>{
				console.log(exception);
			});
		},
		methods:{
			ProductReturn:function(item_id){
				let confirmation = confirm("Are your sure return this item ?");
				/*
				* ============================
				* Return item of order
				* ==========================
				*/
				if(confirmation){
					this.loader = true;
					axios.get(this.url+"/user/order/items/return/"+item_id)
					.then((response)=>{

						if(response.data == "error"){
							this.message = "Return is not available on this items...";
						}else{
							this.order = response.data;
						}
						this.loader = false;
					})
					.catch((exception)=>{
						console.log(exception);
					});
				}
			}
		},
		computed:{

		},
	}
</script>

<style scoped>
	.loader{
		position: fixed;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100vh;
	    background: rgba(0,0,0,0.5);
	    z-index: 9999;
	}
	.loader_caption[data-v-2ba33a90] {
	    position: relative;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	    width: fit-content;
	    font-size: 27px;
	    color: #fff;
	}
</style>