<template>
    <div>
        <div class="nothing" v-for="(wishItem, index) in getWishlists">
            {{ setShowTrue() }}
            <div class="cart-item cursor-pointer" @click="gotoProduct(wishItem.product.slug)">
                <!-- <i class="fa fa-trash cross-btn pointer" @click="deleteWishList(wishItem.id, index)"></i> -->
                <div class="cart-photo" style="padding: 3px;">
                    <img class="" height="55" :src="url+'/'+get_image(wishItem.product.image)" alt="">
                </div>
                <div class="cart-name">
                    <a>{{ wishItem.product.title }} - {{ parseFloat(getPrice(wishItem.product.regular_price, wishItem.product.discount)).toFixed(2)+' TK' }} <br><span>Added <small>{{ wishItem.created_at }}</small></span></a>
                </div>
            </div>

            <hr class="hr">
        </div>

        <h3 v-if="!showButton" class="text-danger tex-center">Nothing To Show</h3>
    </div>
</template>

<script>
export default {
    name: "WishList",
    props: {
      url: {
          type: String,
          required: true
      }
    },
    data(){
        return {
            showButton: false
        }
    },
    methods: {
        setShowTrue: function(){
            this.showButton = true;
            return null;
        },
        get_image: function(images){
            return images[0];
        },
        getPrice: function(regular_price, discount){
            return regular_price - (regular_price * discount / 100);
        },
        deleteWishList: function(wishedId, index){
            axios.post(this.$store.state.front_url+'/delete-wish-list', {
                id: wishedId
            })
            .then((response) => {
                this.$store.commit('deleteWishedItem', {
                    wishedItemId: wishedId,
                    index: index
                });
            });
        },
        gotoProduct: function(slug){
            window.location.href = this.url+"/product/"+slug;
        }
    },
    mounted(){
        axios.get(this.$store.state.front_url+'/get-wish-list')
        .then((response) => {
            this.$store.commit('setAllWishListItems', {
                wishLists: response.data
            });
        })
        .catch((exception) => {
            console.log(exception);
        });
    },
    computed: {
        getWishlists: function(){
            return this.$store.getters.getWishListItems;
        }
    }
}
</script>

<style scoped>
.hr{
    margin-top: 0.5rem; 
    margin-bottom: 0.5rem;
}
.pointer{
    cursor: pointer;
}
</style>
