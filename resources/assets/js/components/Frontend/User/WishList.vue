<template>
    <div>
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h4>My Wishlist</h4>
                    <h5>Total Wishlist: <span>{{ getWishedItem.length }}</span></h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 col-sm-4 col-6 product_box" v-for="(wishedItem, index) in getWishedItem">
                                <div class="my-2 order-b product_wrapper">
                                    <a class="del_btn"  @click="deleteWishList(wishedItem.id,wishedItem.product.id, index)"><i class="fa fa-times"></i></a>
                                    <a v-bind:data-img="baseUrl+'/'+wishedItem.product.image[0]" @click="addToCart(wishedItem.product, wishedItem.id)"  class="____middle_cart cartAnimationStart">Add To Cart</a>
                                    <a>
                                        <img class="img-fluid" v-bind:src="baseUrl+'/'+wishedItem.product.image[0]" alt="">
                                        <div class="viewed_content text-center pb-2">
                                            <div class="viewed_name text-truncate">
                                                <a href="#">{{ wishedItem.product.title }}</a>
                                            </div>
                                            <div class="viewed_price">
                                                {{ Math.round(wishedItem.product.purchase_price) }} TK<span>({{ Math.round(wishedItem.product.regular_price) }}Tk)</span>
                                            </div>
                                        </div>
                                    </a>
                                    <button class="btn btn-success _wish_cart" @click="productDetail(wishedItem.product.slug)">Details</button>
                                </div>
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
    name: "WishList",
    data(){
        return {
            wishedItems: [],
            baseUrl: ''
        }
    },
    methods: {
        deleteWishList: function(wishedId, id, index){
            axios.post(this.$store.state.front_url+'/delete-wish-list', {
                product_id: id
            })
            .then((response) => {
                if(response.data == 1){
                    this.$store.commit('deleteWishedItem', {
                        wishedItemId: wishedId
                    });                    
                }
            });
        },
        addToCart: function(product, wishedId){
            // send to server for save item to session cart and push to vuex
            axios.post(this.$store.state.front_url+'/add-to-cart-form-wishlist', {
                product_id: product.id,
                product_name: product.title,
                product_price: product.regular_price,
                product_discount: product.discount,
                // product_color: product.color_id,
                // product_size: product.size_id,
                product_image: product.image[0],
            })
            .then((response) => {
                toastr.success("Item has been added");
                this.$store.state.cartButton = true;
                // commit for push to vuex
                this.$store.commit('setCart', {
                    cartItems: response.data.cart,
                    cartCount: response.data.count
                });

                this.$store.commit('setTotal', {
                    total: response.data.total
                });

                // this.$store.commit('deleteWishedItem', {
                //     wishedItemId: wishedId
                // });
            })
            .catch((exception) => {
               console.log(exception);
            });
        },
        productDetail:function($slug){
            window.location.href = window.location.origin+'/product/'+$slug;
        }
    },
    mounted(){
        this.url = this.$store.state.front_url;
        this.baseUrl = window.location.origin;
        console.log(this.getWishedItem);
    },
    computed: {
        getWishedItem: function(){
            return this.$store.getters.getWishListItems;
        }
    }
}
</script>

<style scoped>
    .product_wrapper{
        padding: 10px;
        width: 100%;
        height: 235px;
        transition: all 400ms linear 0s;
    }
    .product_wrapper>p{
        font-size: 11px;
    }
    .product_box{
       
    }
    .price{
        white-space: nowrap;
        background: gray;
    }
    .price p{
        padding: 2px 7px;
        background: #efe8e8;
    }
    .del_btn {
        position: absolute;
        right: -5px;
        top: -6px;
        cursor: pointer;
        z-index: 3;
        background: #ddd;
        border-radius: 50%;
        display: inline-block;
        height: 25px;
        width: 25px;
        line-height: 30px;
        text-align: center;
    }
    .del_btn i {
        color: red;
        font-size: 20px;
    }
    ._wish_cart {
        position: absolute !important;
        bottom: 0 !important;
        right: 0 !important;
        left: 0 !important;
        width: 100% !important;
        padding: 3px !important;
        z-index: 3;
    }
    .____middle_cart {
        display: block;
        width: 100%;
        background: rgba(0,0,0,0.5);
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        color: #fff !important;
        line-height: 32px;
        text-align: center;
        font-size: 23px;
        padding: 75px 30px;
        transition: all 400ms linear 0s;
        opacity: 0;
        pointer-events: none;
        cursor: pointer;
    }
    .product_wrapper:hover .____middle_cart {
        opacity: 1;
        pointer-events: auto;
    }
    @media screen and (max-width: 640px){
        .product_box{
            padding: 0;
        }
    }
</style>