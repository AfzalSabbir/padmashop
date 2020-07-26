import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        auth_id: '',
        my_url: "",
        product_images: [],
        front_url: "",
        myCarts: [],
        cartCount: 0,
        wishLists: [],
        total: 0,
        checkout_total: '',
        shipping_cost: '',
        cartButton: false,
    },
    getters: {
        product_image: function(state){
            return state.product_images;
        },
        getFrontUrl: function(state){
            return state.front_url;
        },
        getAllCartItems: function(state){
            return state.myCarts;
        },
        getWishListItems(state){
            return state.wishLists;
        },
        getTotal: function(state){
            return state.total;
        },
        getCheckoutTotal: function(state){
            return state.checkout_total;
        },
        getShippingCost: function(state){
            return state.shipping_cost;
        },
        getCartCount: function(state){
            return state.cartCount;
        }
    },
    mutations: {
        setAuth: function(state, auth_id){
            state.auth_id = auth_id;
        },
        setUrl: function(state, payload){
            state.my_url = payload.our_domain;
        },
        setProductImage: function(state, payload){
            state.product_images = payload.images;
        },
        removeProductImage: function(state, payload){
            state.product_images.splice(payload.index, 1);
        },
        setFrontUrl: function(state, payload){
            state.front_url = payload.front_url;
        },
        setAllCarts: function(state, payload){
            state.myCarts = payload.cartItems;
        },
        setCart: function (state, payload) {
            state.myCarts = [];
            state.myCarts = payload.cartItems;
            state.cartCount = payload.cartCount;
        },
        setAllWishListItems: function(state, payload){
            state.wishLists = payload.wishLists;
        },
        setWishListItem: function(state, payload){
            state.wishLists.push(payload.wishList);
        },
        deleteWishedItem: function(state, payload){
            var index = state.wishLists.map(function (item) {
                return item.id;
            }).indexOf(payload.wishedItemId);

            state.wishLists.splice(index, 1);
        },
        setTotal: function(state, payload){
            state.total = payload.total;
        },
        setTotalInCheckout: function(state, payload){
            state.checkout_total = payload.total;
        },
        setShippingCost: function(state, payload){
            state.shipping_cost = payload.shipping_cost;
        },
        setAuthData: function(state, payload){
            state.front_auth = payload.auth;
        }
    }
});
