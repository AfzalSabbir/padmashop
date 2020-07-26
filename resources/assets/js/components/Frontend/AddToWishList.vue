<template>
	<div class="wishlist-btn">
		<a @click="addToWish(product)" class="fav-button" v-if="product_find == 'not'">
			<i style="color: #fff;font-size: 20px;" class="fas fa-heart"></i>
		</a>
		<a @click="deleteFromWish(product)" class="fav-button active" v-else>
			<i  style="color: red;font-size: 20px;" class="fas fa-heart"></i>
		</a>
	</div>
	<!-- <div class="wishlist-btn"><i title="Add to wishlist." class="fas fa-heart"></i></div> -->
</template>

<script>
export default {
	name: "AddToWishList",
	props: {
		style_wish: {
			type: Number,
			required: true
		},
		product: {
			type: Object,
			required: true
		},
		url: {
			type: String,
			required: true
		},
		find: {
			type: String,
			required: true
		}
	},
	data(){
		return {
			front_url: '',
			product_find: 'not'
		}
	},
	methods: {
		addToWish: function(product){
			//console.log('okay');
			axios.post(this.$store.state.front_url+'/add-to-wish-list', {
				product: product,
				product_id: product.id
			})
			.then((response) => {
				this.product_find = 'find';
                response.data.product.image = JSON.parse(response.data.product.image);
				this.$store.commit('setWishListItem', {
					wishList: response.data
				});
			})
			.catch((e) => {
				console.log(e);
			});
		},
		deleteFromWish: function(product){
			axios.post(this.$store.state.front_url+'/delete-wish-list', {
				product: product,
				product_id: product.id
			})
			.then((response) => {
				this.product_find = 'not';
				this.$store.commit('deleteWishedItem', {
					wishedId:product.id
				});
			})
			.catch((e) => {
				console.log(e);
			});
		}
	},
	mounted(){
		this.front_url = this.$store.state.front_url;
		this.product_find = this.find;
	},
	computed: {

	}
}
</script>

<style scoped>

</style>
