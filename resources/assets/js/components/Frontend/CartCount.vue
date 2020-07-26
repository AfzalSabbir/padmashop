<template>
    <div>
        {{ totalCart }}
    </div>
</template>

<script>
export default {
    name: "CartCount",
    props: {
        url: {
            type: String,
        }
    },
    computed: {
        totalCart: function(){
            axios.get(this.url+'/get-cart')
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
            
            return this.$store.getters.getCartCount;
        }
    },
    methods:{
        
    }
}
</script>

<style scoped>

</style>
