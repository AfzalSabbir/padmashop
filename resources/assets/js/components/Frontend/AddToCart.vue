<template>
    <div style="position: static;">
        <div class="cart-button">
            <div>
                <!-- <button class="btn btn-success btn-sm float-right mt-1 cursor-pointer w-100" @click="product_details(product)"><i class="fa fa-fw fa-shopping-cart"></i> Product Details </button> -->
                <!-- <button class="cartAnimationStart product_cart_button"><i class="fa fa-fw fa-shopping-cart"></i> Buy Now</button>
                <button class="btn btn-success cr-button cartAnimationStart" title="Add to cart."><i class="fa fa-fw fa-shopping-cart"></i> Buy Now</button> -->
            <a v-bind:data-img="JSON.parse(product.image)[0]" class="btn btn-success btn-sm float-right mt-1 cursor-pointer w-100 text-center" style="text-transform: uppercase;color: #fff;" @click="product_details(product)" v-if="hover_product == 0"> <span class="p-details">Product Details</span></a>
            <a v-bind:data-img="JSON.parse(product.image)[0]" class="product_cart_button" @click="product_details(product)" v-if="hover_product == 1"> <span class="p-details">Product Details</span></a>
            <a v-bind:data-img="JSON.parse(product.image)[0]" class="btn btn-success cr-button cartAnimationStart" style="color: #fff;"  @click="addToCart(product)" v-if="hover_product == 2">Add To Cart</a>

            </div>
        </div>
        <div style="position: static;"> 
            <a v-bind:data-img="JSON.parse(product.image)[0]" class="____middle_cart___ text-center" style="text-transform: uppercase;" @click="product_details(product)" v-if="hover_product == 2">  <span class="p-details">Product Details</span></a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AddToCart",
        props: {
            hover_product: {
                type: Number,
                required: true
            },
            product: {
                type: Object,
                required: true
            }
        },
        data(){
            return {

            }
        },
        methods: {
            addToCart: function(product){
                let myCarts = this.$store.state.myCarts;
                let add     = true;

                for(const rowId in myCarts)
                {
                    if(myCarts[rowId].id == product.id){

                        axios.post(this.$store.state.front_url + '/update_cart_qty', {
                            rowId   : rowId,
                            qty     : +(myCarts[rowId].qty)+1
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
                        add = false;
                    }
                }
                if(add){
                    axios.post(this.$store.state.front_url+'/add-to-cart', {
                        product_id      : product.id,
                        product_name    : product.title,
                        product_price   : product.regular_price,
                        product_discount: product.discount,
                        min_quantity    : product.min_sale_quantity,
                        // product_color: product.color_id,
                        // product_size : product.size_id,
                        product_image   : JSON.parse(product.image)[0],
                    })
                    .then((response) => {
                        toastr.success("Item has been added");
                        if(window.innerWidth > 768){
                            this.$store.state.cartButton = true;
                        }else{
                           this.$store.state.cartButton = false;  
                        }
                        // commit for push to vuex
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
                }
            },
            product_details:function(product){
                window.location.href=window.location.origin+'/product/'+product.slug;
            }
        },
        computed: {

        }
    }
</script>

<style scoped>

</style>
