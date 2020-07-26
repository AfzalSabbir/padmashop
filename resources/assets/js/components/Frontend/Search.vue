<template>
    <div>
        <div class="header_search_form clearfix">
            <input type="text" v-model="search_query" class="header_search_input" :placeholder="search_place" id="man_placeholder_animation">
            <select v-model="category" class="category">
                <option value="">--Select Category--</option>
                <option v-for="category in categories" :value="category.slug">{{ category.title_en }} ({{ category.count_product }})</option>
            </select>
            <div class="custom_dropdown d-none">
                <div class="custom_dropdown_list">
                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                    <i class=""></i>
                    <ul class="custom_list clc">
                        
                    </ul>
                </div>
            </div>
            <button role="button" class="header_search_button trans_300" value="Submit" @click="getProducts"><img :src="this.url+'/'+image" alt=""></button>
            <div class="search-option" id="search-option-id" v-if="search_query">
                <ul>
                    <li v-for="product in products" class="py-3 px-4 cursor-pointer search_item_" @click="gotoProduct(product.slug)">{{ product.title }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Search',
    props: [
        'search_place', 'url'
    ],
    data(){
        return {
            image: 'public/front/images/search.png',
            search_query: '',
            products: [], 
            categories:[],
            category:''
        }
    },
    methods: {
        getProducts: function(){
            axios.post(this.url+'/search-product', {
                search_query: this.search_query
            })
            .then((response) => {
                this.products = [];
                this.products = response.data;
            })
            .catch((exception) => {
                console.log(exception);
            });
        },
        gotoProduct: function(slug){
            window.location.href = this.url+"/product/"+slug;
        }
    },
    mounted() {
        axios.get(this.url+'/all/categories')
        .then((response)=>{
            this.categories = response.data;
        })
        .catch((err)=>{
            console.log(err);
        });
    },
    watch: {
        search_query: function(){
            axios.post(this.url+'/search-product', {
                search_query: this.search_query
            })
            .then((response) => {
                this.products = [];
                this.products = response.data;
            })
            .catch((exception) => {
                console.log(exception);
            });

        }, 
        category:function(){
            window.location.href = this.url+'/shop?category='+this.category;
        }
    }
}
</script>

<style scoped>
.header_search_input{
    height: initial;
    /*line-height: 40px;*/
    position: relative;
}
.category{
    position: absolute;
    right: 7%;
    padding: 14px 15px;
    border: 2px solid #eee;
    color: #888;
} 
.category li{
    display: block;
    line-height: 28px;
} 
@media screen and (max-width: 768px){
    .category{
        display: none;
    }    
}
</style>
