<template>
    <div v-cloak>
        <div class="row">
            <div class="delivery-status">
                <span class="hr"></span>
                <figure class="status">
                    <span class="extra-block-first"></span>
                    <img :src="url+delivery_image_path+delivery_image[0]" alt="">
                </figure>
                <div class="status-text">
                    <h5>This is delivery Status </h5>
                    <h5>This is delivery Date </h5>
                </div>
            </div>
            <div class="delivery-status">
                <span class="hr"></span>
                <figure class="status">
                    <img :src="url+delivery_image_path+delivery_image[1]" alt="">
                </figure>
                <div class="status-text">
                    <h5>This is delivery Status </h5>
                    <h5>This is delivery Date </h5>
                </div>
            </div>
            <div class="delivery-status">
                <span class="hr"></span>
                <figure class="status">
                    <img :src="url+delivery_image_path+delivery_image[2]" alt="">
                </figure>
                <div class="status-text">
                    <h5>This is delivery Status </h5>
                    <h5>This is delivery Date </h5>
                </div>
            </div>
            <div class="delivery-status">
                <span class="hr"></span>
                <figure class="status">
                    <img :src="url+delivery_image_path+delivery_image[3]" alt="">
                </figure>
                <div class="status-text">
                    <h5>This is delivery Status </h5>
                    <h5>This is delivery Date </h5>
                </div>
            </div>
            <div class="delivery-status">
                <span class="hr"></span>
                <figure class="status">
                    <span class="extra-block-last"></span>
                    <img :src="url+delivery_image_path+delivery_image[4]" alt="">
                </figure>
                <div class="status-text">
                    <h5>This is delivery Status </h5>
                    <h5>This is delivery Date </h5>
                </div>
            </div>
        </div>        
    </div>
</template>

<script>
export default {
    name: "OrderTrack",
    data(){
        return {
            url: '',
            delivery_image_path: '/public/front/images/delivery_status/',
            delivery_image: [
                'bar_icon_active_1.png',
                'bar_icon_active_2.png',
                'bar_icon_active_3.png',
                'bar_icon_active_4.png',
                'bar_icon_active_5.png'
            ],
        }
    },
    methods: {

    },
    computed: {

    },
    mounted(){
        this.url = this.$store.state.front_url;
    }
}
</script>

<style scoped>

</style>
