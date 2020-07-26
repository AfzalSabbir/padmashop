<template>
    <div>
        <div class="nothing">
            <div v-for="(cart, i, sl) in cartItems">
                <div class="cart-item" >
                    <span @click="deleteFromCart(cart.rowId)"><i class="fas fa-times cross-btn"></i></span>
                    <div class="count_e_r">
                        <a class="ang_le" @click="increment(cart.qty, i, sl)"><i class="fa fa-chevron-up"></i></a>
                        <!-- <input class="count_in_" type="number" name="" v-model="cart.qty" @input="updateQty(cart.qty, i, sl)"> -->
                        <input class="count_in_" type="text" name="" v-model="cart.qty" @input="updateQty(cart.qty, i, sl)">
                        <a class="ang_le" @click="decrement(cart.qty, i, sl)"><i class="fa fa-chevron-down"></i></a>
                    </div>
                    <div class="cart-photo">
                        <img class="img-thumbnail __myimg" :src="url+'/'+cart.options.image" alt="index">
                    </div>
                    <div class="cart-name">
                        <a>{{ cart.name }} <br><span>{{ cart.qty }} x {{ parseFloat(cart.price).toFixed(2) }} TK</span></a>
                    </div>
                </div>
            </div>

            <div class="check-btn" v-if="getCartCount > 0">
                <button class="cursor" @click="gotoCart"><span class="btn-p-1">Check Out</span><span class="btn-p-2">$ {{ totalAmount }}</span></button>
            </div>

            <div class="text-center" v-else>
                <h4>You have nothing in your cart</h4>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Cart",
        props: {
          url: {
              type: String,
              required: true
          }
        },
        data(){
            return {
                image           : [],
                myCarts         :[],
                min_quantity    : 1
            }
        },
        methods: {
            increment:function(qty, index, sl){
                if(qty > 0){
                    axios.post(this.$store.state.front_url + '/update_cart_qty', {
                        rowId: index,
                        qty: +qty+1
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
            decrement:function(qty, index, sl){
                this.myCarts = this.$store.state.myCarts;
                for(const rowId in this.myCarts){
                    if(rowId == index){
                        this.min_quantity = this.myCarts[rowId].options.min_quantity;   
                    }
                }
                if(qty > this.min_quantity){
                    axios.post(this.$store.state.front_url + '/update_cart_qty', {
                        rowId   : index,
                        qty     : +qty-1
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
                    toastr.warning("Minimum Sale Quantity "+this.min_quantity);
                }
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
            updateQty: function (qty, index, sl) {
                if(qty > 0){
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
            gotoCart: function(){
                window.location.href = this.$store.state.front_url+'/cart/item/varification';
            }
        },
        computed: {
            cartItems: function(){
                return this.$store.getters.getAllCartItems;
            },
            getCartCount: function(){
                return this.$store.getters.getCartCount;
            },
            totalAmount:function(){
                return this.$store.state.total;
            }
        }
    }
</script>

<style scoped>
.cursor{
    cursor: pointer;
    border: 0;
}
.btn-p-1 {
    width: 60%;
    float: left;
    color: #fff;
    background: #FF9805 !important;
    padding: 8px 6px;
}
.btn-p-2 {
    width: 40%;
    float: right;
    color: #fff;
    background: #FF5A01 !important;
    padding: 8px 6px;
}
.count_in_ {
    width: 100%;
    border: none;
    background: #eff6fa;
    text-align: center;
}
.count_in_:focus {
    border: none;
    outline: 0;
}
.ang_le {
    width: 100%;
    text-align: center;
    cursor: pointer;
}
</style>
