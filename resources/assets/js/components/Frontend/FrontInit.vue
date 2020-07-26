<template>
    <div>

    </div>
</template>

<script>
    export default {
        name: "FrontInit",
        props: {
            front_url: {
                type: String,
                required: true
            },
            auth: {
                type: Object,
                required: false
            }
        },
        mounted(){
            // set url to vuex state
            this.$store.commit('setFrontUrl', {
                front_url: this.front_url
            });


            this.$store.commit('setAuthData', {
                auth: this.auth
            });

            // get all cart content from server and initialize to vuex state through mutation
            axios.get(this.$store.state.front_url+'/get-cart')
            .then((response) => {
                // commit for initialization of cart content
                this.$store.commit('setAllCarts', {
                    cartItems: response.data.cart
                });

                this.$store.commit('setTotal', {
                    total: response.data.total
                });
            })
            .catch((exception) => {
                console.log(exception);
            });
        }
    }
</script>

<style scoped>

</style>
