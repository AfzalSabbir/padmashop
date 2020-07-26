<template>
    
</template>

<script>
    export default {
        name: "IncrementCount",
        props: {
            product_id: {
                type: Number,
                required: true
            }
        },
        mounted(){
            axios.post(this.$store.state.front_url+'/increment_hit_count', {
                id: this.product_id
            })
            .then((response) => {

            })
            .catch((exception) => {
                console.log(exception);
            });
        }
    }
</script>

<style scoped>

</style>
