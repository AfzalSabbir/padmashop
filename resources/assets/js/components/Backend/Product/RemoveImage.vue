<template>
    <div>
        <div class="row">
            <div class="col-md-3" v-for="(image, index) in allImages">
                <figure style="position: relative;">
                    <p class="btn btn-danger btn-sm del_i" @click="deleteImage(image, index)"><i class="fa fa-trash"></i></p>
                    <img :src="image_url+'/'+image" alt="" class="img img-thumbnail">
                </figure>
            </div>
        </div>
    </div>
</template>

<script>
    name: 'product-image-delete';
    export default {
        props: {
            images: {
                type: Array
            },
            product_id: {
                type: Number
            },
            original_images: {
              type: Array
            }
        },
        data(){
           return {
               image_url: ''
           }
        },
        methods: {
          deleteImage: function(image, index){
              console.log(image)
              console.log(index)
              axios.post(this.$store.state.my_url+'/api/admin/product/image/delete', {
                  image: image,
                  original_image: this.original_images[index],
                  id: this.product_id
              })
              .then((response) => {
                  this.$store.commit('removeProductImage', {
                      image: image,
                      index: index
                  })
              })
              .catch((exception) => {
                  console.log(exception);
              })
          }
        },
        mounted() {
            this.image_url = this.$store.state.my_url;

            this.$store.commit('setProductImage', {
                images: this.images
            });
        },
        computed: {
            allImages: function(){
                return this.$store.getters.product_image;
            }
        }
    }
</script>

<style>
    .del_i i {
        margin: 0 !important;

    }
    .del_i {
        position: absolute;
        top: 0%;
        right: 0%;
    }
</style>

