<template>
    <div>
        <div class="col-md-12 border-top-0 pt-3 pb-3">
            <div class="row">
                <div class="col-md-3">
                    <img :src="url+'/'+profile_image" width="100%" v-if="!image_loaded">
                    <img :src="profile_image" width="100%" v-else>
                    <br><br>
                    <input type="file" class="form-control" @change="onImageChange">
                    <button class="btn btn-success mt-2" @click="updateProfilePicture">Upload</button>
                </div>
                <div class="col-md-9">
                    <button class="btn btn-success btn-sm float-right cursor-pointer" @click="save" v-if="edit_form"><i class="fas fa-check"></i></button>
                    <button class="btn btn-info btn-sm float-right cursor-pointer" @click="visibleEdit" v-if="!edit_form"><i class="fas fa-edit"></i></button>
                    <table id="table">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="">Name</label>
                                <div class="mb-4">
                                    <input type="text" v-model="name" :disabled="!edit_form" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="">Village</label>
                                <div class="mb-4">
                                    <input type="text" class="form-control" v-model="auth.village" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="">Mobile</label>
                                <div class="">
                                    <input type="text" class="form-control" v-model="mobile" :disabled="!edit_form">
                                    <small id="emailHelp" class="form-text text-muted">
                                        <span v-if="success_message">{{ success_message }}</span>
                                        <span v-if="error_message">{{ error_message }}</span>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="">Username</label>
                                <div class="">
                                    <input type="text" class="form-control" v-model="auth.username" disabled>
                                </div>
                            </div>
                        </div>
                    </table>
                    <hr>
                    <password></password>    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Profile",
    props: {
        auth: {
            type: Object,
            required: true
        }
    },
    data(){
        return {
            edit_form: false,
            name: '',
            mobile: '',
            success_message: '', 
            error_message: '', 
            profile_image: '',
            image: '',
            image_loaded: false,
            url: ''
        }
    },
    methods: {
        visibleEdit: function(){
            this.edit_form = true;
        },
        save: function(){
            axios.post(this.url+'/user/update-profile', {
                mobile: this.mobile,
                name: this.name,
                id: this.auth.id,
            })
            .then((response) => {
              this.edit_form = false; 
              toastr.success("Profile has been uploaded successfully"); 
          })
            .catch((exception) => {
                console.log(exception);
            });
        },
        onImageChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            this.createImage(files[0]);
        },
        createImage(file) {
            var image = new Image;
            var reader = new FileReader();
            reader.onload = (e) => {
                this.image = e.target.result;
                this.profile_image = this.image;
            };
            reader.readAsDataURL(file);
            this.image_loaded = true;
        },
        updateProfilePicture() {
            if (this.image) {
                axios.post(this.$store.state.front_url + '/user/change-image', {
                    image: this.image
                }).then(function (response){
                    toastr.success("Picture has been uploaded successfully");
                }).catch(function (error){
                    console.log(error);
                });
            }
        }
    },
    computed: {

    },
    mounted(){
        this.url = this.$store.state.front_url;
        this.name = this.auth.name;
        this.mobile = this.auth.mobile;
        this.profile_image = this.auth.image;
        this.url = this.$store.state.front_url;
    },
    watch: {
        mobile: function(){
            axios.post(this.url+'/user/check-mobile', {
                mobile: this.mobile
            })
            .then((response) => {
                if(response.data == 'available'){
                    this.success_message = 'Available';
                    this.error_message = '';
                }
                else{
                    if(response.data == this.auth.mobile){
                        this.success_message = 'Available';
                        this.error_message = '';
                    }
                    else{
                        this.error_message = 'Not Available';
                        this.success_message = '';
                    }
                }
            })
            .catch((exception) => {
                console.log(exception);
            });
        }
    }
}
</script>

<style scoped>
#table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 20px;
}
#table tr th {
    width: 100px;
}
</style>
