<template>
	<button @click="addToWish(product)" class="myBtn active bg-secondary" v-if="product_find == 'not'">
		<i class="fas fa-heart"></i>&nbsp; Wish
	</button>
	<button @click="deleteFromWish(product)" class="myBtn" v-else>
		<i class="fas fa-heart"></i>&nbsp; Wished
	</button>
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
			axios.post(this.$store.state.front_url+'/add-to-wish-list', {
				product: product,
				product_id: product.id
			})
			.then((response) => {
				// console.log(response.data);
				toastr.success("Item added to Wishlist");
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
				// console.log(response.data);
				toastr.error("Item remove form Wishlist");
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
