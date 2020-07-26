<template>
    <div v-cloak>
        {{ totalWish.length }}
    </div>
</template>

<script>
    export default {
        name: "TotalWish",
        computed: {
            totalWish: function(){
                return this.$store.getters.getWishListItems;
            }
        }
    }
</script>

<style scoped>

</style>
