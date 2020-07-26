<template>
    <div>
        <table class="table">
            <tr>
                <td>Subtotal</td>
                <td class="text-right">{{ total_price }} TK</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td class="text-right">{{ getShippingCost }} TK</td>
            </tr>
            <tr>
                <td>Total</td>
                <td class="text-right">{{ getTotal }} Tk</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        name: "OrderInfo",
        props: {
            total_price: {
                type: Number,
                required: true
            },
            shipping_cost: {
                type: Number,
                required: true
            }
        },
        mounted(){
            this.$store.commit('setShippingCost', {
                shipping_cost: this.shipping_cost
            });

            this.$store.commit('setTotalInCheckout', {
                total: this.total_price + this.shipping_cost
            });
        },
        computed: {
            getTotal: function(){
                return this.$store.getters.getCheckoutTotal;
            },
            getShippingCost: function(){
                return this.$store.getters.getShippingCost;
            }
        }
    }
</script>

<style scoped>

</style>
