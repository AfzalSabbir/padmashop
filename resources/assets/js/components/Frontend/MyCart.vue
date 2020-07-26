<template>
    <div class="table-responsive">
        <table class="table table-bordered __tb_le">
            <thead>
                <tr>
                    <th width="w-5">SL</th>
                    <th width="w-5">Photo</th>
                    <th class="w-36">Name</th>
                    <!-- <th class="w-10">Color</th> -->
                    <!-- <th class="w-10">Size</th> -->
                    <th class="w-7">QTY</th>
                    <th class="w-10">Price</th>
                    <th class="w-10">Total</th>
                    <th class="w-5">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(cart, index, sl) in cartItems">
                    <td>{{ sl + 1 }}</td>
                    <td>
                        <img class="productImage" :src="cart.options.image" alt="">
                    </td>
                    <td>
                        {{ cart.name }}
                    </td>
                    <!-- <td>
                        <span class="" v-for="(color, color_index) in cart.options.colors">
                         <input type="radio" @change="changeColor(index, color)" :value="color.id + '_' + color_index" :checked="color.id == cart.options.selected_color.id">
                         {{ ' '+color.title+'&nbsp; ' }} <br/>
                        </span>
                    </td>
                    <td>
                        <span class="" v-for="(size, size_index) in cart.options.sizes">
                        <input type="radio" @change="changeSize(index, size)" :value="size.id + '_' + size_index" :checked="size.id == cart.options.selected_size.id">
                             {{ ' '+size.title+'&nbsp; ' }} <br/>
                         </span>
                    </td>  -->
             <td>
                <div class="__mthr__">
                    <a href="#" @click="plusQty(cart.qty, index, sl)" class="__top_"><i class="fa fa-angle-up"></i></a>
                        <input type="text" v-model="cart.qty" min="1" @input="updateQty(cart.qty, index, sl)" class="__in_put">
                    <a href="#" @click="nimusQty(cart.qty, index, sl)" class="__bottom_"><i class="fa fa-angle-down"></i></a>
                </div>
            </td>
            <td>
                {{ parseFloat(cart.price).toFixed(2) }}
            </td>
            <td>
                {{ parseFloat(cart.qty * cart.price).toFixed(2) }}
            </td>
            <td>
                <button role="button" class="__b_s_t" @click="deleteFromCart(cart.rowId)"><i class="fas fa-trash"></i></button>
            </td>
        </tr>

    </tbody>
</table>

<div class="order_total">
    <div class="order_total_content text-md-right">
        <div class="order_total_title"><strong>Order Total:</strong></div>
        <div class="order_total_amount">{{ fixedTotal(getTotal) }} TK</div>
    </div>
</div>

<div class="cart_buttons">
    <button @click="checkOut" role="button" class="btn btn-success btn-lg" v-if="checkout">Submit</button>
    <button role="button" class="btn btn-secondary disabled btn-lg" disabled v-else>Submit</button>
</div>

<div class="loader_wrapper" v-if="loader">
    <span class="loader_"></span>
</div>

</div>

</template>

<script>
export default {
    name: "MyCart",
    data() {
        return {
            qty: 0,
            price: 0,
            sub_total: 0,
            color: [],
            sizes: [],
            checkout: true,
            loader: false,
            myCarts:[],
            min_quantity : 1, 
        }
    },
    methods: {
        plusQty:function(qty, index, sl){
            if(qty > 0){
                this.loader=true;
                this.checkout = true;

                axios.post(this.$store.state.front_url + '/update_cart_qty', {
                    rowId: index,
                    qty: +qty+1,
                })
                .then((response) => {
                    this.$store.commit('setCart', {
                        cartItems: response.data.cart,
                        cartCount: response.data.count
                    });

                    this.$store.commit('setTotal', {
                        total: response.data.total
                    });
                    this.loader = false;
                })
                .catch((exception) => {
                    console.log(exception);
                });
            }
        },
        nimusQty:function(qty, index, sl){
            this.myCarts = this.$store.state.myCarts;
            for(const rowId in this.myCarts){
                if(rowId == index){
                    this.min_quantity = this.myCarts[rowId].options.min_quantity;   
                }
            }
            if(qty > this.min_quantity){
                this.loader=true;
                this.checkout = true;

                axios.post(this.$store.state.front_url + '/update_cart_qty', {
                    rowId: index,
                    qty: +qty-1,
                })
                .then((response) => {
                    this.$store.commit('setCart', {
                        cartItems: response.data.cart,
                        cartCount: response.data.count
                    });

                    this.$store.commit('setTotal', {
                        total: response.data.total
                    });
                    this.loader = false;
                })
                .catch((exception) => {
                    console.log(exception);
                });
            }
            else{
                toastr.warning("Minimum Sale Quantity "+this.min_quantity);
            }
        },
        updateQty: function (qty, index, sl) {
            if(qty > 0){
                this.loader=true;
                this.checkout = true;

                axios.post(this.$store.state.front_url + '/update_cart_qty', {
                    rowId: index,
                    qty: qty
                })
                .then((response) => {
                    this.$store.commit('setCart', {
                        cartItems: response.data.cart,
                        cartCount: response.data.count
                    });

                    this.$store.commit('setTotal', {
                        total: response.data.total
                    });
                    this.loader = false;
                })
                .catch((exception) => {
                    console.log(exception);
                });
            }
            else{
                this.checkout = false;
            }
        },
        changeColor: function (rowId, color) {
            axios.post(this.$store.state.front_url + '/update-color', {
                color: color,
                rowId: rowId
            })
            .then((response) => {
                this.$store.commit('setCart', {
                    cartItems: response.data.cart,
                    cartCount: response.data.count
                });

                this.$store.commit('setTotal', {
                    total: response.data.total
                });
            })
            .catch((exception) => {
                console.log(exception);
            });
        },
        changeSize: function (rowId, size) {
            axios.post(this.$store.state.front_url + '/update-size', {
                size: size,
                rowId: rowId
            })
            .then((response) => {
                console.log(response.data);
                this.$store.commit('setCart', {
                    cartItems: response.data.cart,
                    cartCount: response.data.count
                });

                this.$store.commit('setTotal', {
                    total: response.data.total
                });
            })
            .catch((exception) => {
                console.log(exception);
            });
        },
        deleteFromCart: function(cartRowId){
            axios.post(this.$store.state.front_url+'/delete-from-cart', {
                rowId: cartRowId
            })
            .then((response) => {
                if(response.data.length <= 0){
                    this.showButton = false;
                }
                this.$store.commit('setCart', {
                    cartItems: response.data.cart,
                    cartCount: response.data.count
                });

                this.$store.commit('setTotal', {
                    total: response.data.total
                });
            })
            .catch((exception) => {
                console.log(exception);
            });
        },
        fixedTotal: function(total){
            var value = ""+total+"";
            total = value.split(',').join('');
            total = Number(total);
            return parseFloat(total).toFixed(2);
        },
        checkOut: function () {
            window.location.href = this.$store.state.front_url+"/cart/item/varification";
        }
    },
    mounted() {

    },
    computed: {
        cartItems: function () {
            return this.$store.getters.getAllCartItems;
        },
        getTotal: function () {
            return this.$store.getters.getTotal;
        }
    }
}
</script>

<style scoped>
.productImage {
    width: 40px;
    height: 40px;
}

.w-36{
    width: 36%;
}

.w-25 {
    width: 25%;
}

.w-15 {
    width: 15%;
}

.w-10{
    width: 10%;
}

.w-7 {
    width: 7%;
}

.w-5{
    width: 5%;
}

.cursor{
    cursor: pointer;
}
@media (max-width: 768px){
    .__tb_le tr th, .__tb_le tr td {
        vertical-align: middle;
        font-size: 10px;
        padding: 0px 3px;
    }
}
.__mthr__ {
    position: relative;
}
.__bottom_, .__top_ {
    width: 100%;
    text-align: center;
    display: inline-block;
}
.__b_s_t {
    border: 0;
    color: red;
    font-size: 15px;
    background: #fff;
    text-align: center;
    width: 100%;
}
.__in_put {
    width: 100%;
    text-align: center;
    border: 0;
}
.loader_wrapper{
  background: #0005;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 100;
}
.loader_{
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 3px solid #000;
  border-right-color: #0003;
  display: inline-block;
  animation-name: loader_;
  animation-timing-function: linear;
  animation-duration: 0.6s;
  animation-fill-mode: both;
  animation-iteration-count: infinite;
}
@keyframes loader_{
  0%{transform: rotate(0deg)}
  100%{transform: rotate(360deg)}
}
</style>
