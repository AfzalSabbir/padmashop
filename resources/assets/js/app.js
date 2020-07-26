
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('product-image-delete', require('./components/Backend/Product/RemoveImage.vue').default);
Vue.component('init', require('./components/Backend/Init.vue').default);
Vue.component('front-init', require('./components/Frontend/FrontInit.vue').default);
Vue.component('add-to-cart', require('./components/Frontend/AddToCart.vue').default);
Vue.component('cart', require('./components/Frontend/Cart.vue').default);
Vue.component('my-cart', require('./components/Frontend/MyCart.vue').default);
Vue.component('add-to-wish-list', require('./components/Frontend/AddToWishList.vue').default);
Vue.component('add-to-wish-list-single', require('./components/Frontend/AddToWishListSingle.vue').default);
Vue.component('wish-list', require('./components/Frontend/WishList.vue').default);
Vue.component('advertisement', require('./components/Frontend/Advertise.vue').default);
Vue.component('user-panel', require('./components/Frontend/User/Parent.vue').default);
Vue.component('total-wish', require('./components/Frontend/TotalWish.vue').default);
Vue.component('cart-count', require('./components/Frontend/CartCount.vue').default);
Vue.component('cart-total', require('./components/Frontend/CartTotal.vue').default);
Vue.component('increment-count', require('./components/Frontend/IncrementCount.vue').default);
Vue.component('payment', require('./components/Frontend/User/Payment.vue').default);
Vue.component('payment-submit', require('./components/Frontend/User/PaymentSubmit.vue').default);
Vue.component('register', require('./components/Frontend/User/Register.vue').default);
Vue.component('order-info', require('./components/Frontend/User/OrderInfo.vue').default);
Vue.component('password', require('./components/Frontend/User/Password.vue').default);
Vue.component('search', require('./components/Frontend/Search.vue').default);
Vue.component('contact', require('./components/Frontend/Contact.vue').default);

Vue.component('user-login', require('./components/Frontend/User/Login.vue').default);
Vue.component('user-order-items', require('./components/Frontend/User/OrderItems.vue').default);
/*
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('product-image-delete', require('./components/Backend/Product/RemoveImage.vue'));
Vue.component('init', require('./components/Backend/Init.vue'));


Vue.component('front-init', require('./components/Frontend/FrontInit.vue'));
Vue.component('add-to-cart', require('./components/Frontend/AddToCart.vue'));
Vue.component('cart', require('./components/Frontend/Cart.vue'));
Vue.component('my-cart', require('./components/Frontend/MyCart.vue'));
Vue.component('add-to-wish-list', require('./components/Frontend/AddToWishList.vue'));
Vue.component('wish-list', require('./components/Frontend/WishList.vue'));
Vue.component('advertisement', require('./components/Frontend/Advertise.vue'));
Vue.component('user-panel', require('./components/Frontend/User/Parent.vue'));
Vue.component('total-wish', require('./components/Frontend/TotalWish.vue'));
Vue.component('cart-count', require('./components/Frontend/CartCount.vue'));
Vue.component('cart-total', require('./components/Frontend/CartTotal.vue'));
Vue.component('increment-count', require('./components/Frontend/IncrementCount.vue'));
Vue.component('payment', require('./components/Frontend/User/Payment.vue'));
Vue.component('register', require('./components/Frontend/User/Register.vue'));
Vue.component('order-info', require('./components/Frontend/User/OrderInfo.vue'));
Vue.component('password', require('./components/Frontend/User/Password.vue'));
Vue.component('search', require('./components/Frontend/Search.vue'));
Vue.component('contact', require('./components/Frontend/Contact.vue'));*/


import { store } from './store';
import { custom } from './custom';

const app = new Vue({
    el: '#app',
    store,
    custom,
    data:{
        cartSectionStyle: '',
        layout_2: '',

    },
    mounted(){
         
    },
    computed:{
    	cartBtn:function(){ 
    		if(this.$store.state.cartButton == true){
    			this.isLoaded = this.$custom.isCart(true);
                this.layout_2='show-cart';
    		}else{
    			this.isLoaded = this.$custom.isCart(false);
                this.layout_2='';
    		}
    		return this.$store.state.cartButton;
    	},
    },
    methods:{
    	cart:function(){
            if(window.innerWidth > 768){
                if(this.$store.state.cartButton == true){
                    this.$store.state.cartButton = false;
                }else{
                    this.$store.state.cartButton = true;
                }
            }
            else{
                window.location.href = window.origin+"/cart";
            }
        },
    }
});
