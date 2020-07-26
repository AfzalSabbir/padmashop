<template>
    <div>
        <form v-on:submit.prevent>
            <button class="btn btn-success btn-sm float-right cursor-pointer" @click="updatePassword" v-if="edit_form" ><i class="fas fa-check"></i></button>
            <button class="btn btn-info btn-sm float-right cursor-pointer" @click="passwordEdit" v-if="!edit_form"><i class="fas fa-edit"></i></button>
            <table id="table">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="">Old Password</label>
                        <div class="">
                            <input type="password" v-model="oldPassword" :disabled="!edit_form" class="form-control" required>
                            <label class="text-danger">{{ error_message }}</label>
                        </div>
                    </div><div class="col-md-6">
                    <label for="" class="">New Password</label>
                    <div class="mb-4">
                        <input type="password" v-model="newPassword" :disabled="!edit_form" class="form-control" required>
                    </div>
                </div>
                    <div class="col-md-6">
                        <label class="">Confirm Password</label>
                        <div class="mb-4">
                            <input type="password" class="form-control" v-model="confirmPassword" :disabled="!edit_form" required>
                            <label class="text-danger">{{ wrong_password_message }}</label>
                        </div>
                    </div>
                </div>
            </table>
        </form>
    </div>
</template>

<script>
export default {
    name: "Password",

    data(){
        return {
            edit_form: false,
            oldPassword:'',
            newPassword:'',
            confirmPassword:'',
            success_message: '',
            error_message: '',
            wrong_password_message:''
        }
    },
    methods: {
        passwordEdit: function(){
            this.edit_form = true;
        },
        updatePassword: function(){
            if(this.newPassword==this.confirmPassword){
                axios.post(this.url+'/user/password-change', {
                    oldPassword: this.oldPassword,
                    newPassword: this.newPassword,
                    confirmPassword: this.confirmPassword
                })
                    .then((response) => {
                        if(response.data == 'mismatch'){
                            this.wrong_password_message = '';
                            this.error_message = "Old password not match";
                        }
                        else {
                            toastr.success("Password has been successfully changed");
                            this.edit_form = false;
                            this.wrong_password_message = '';
                            this.error_message = "";
                            this.oldPassword ='';
                            this.newPassword ='';
                            this.confirmPassword ='';
                        }
                    })
                    .catch((exception) => {
                        console.log(exception);
                    });
            }
            else{
                this.wrong_password_message = 'Password does not match.';
                this.error_message = '';
            }
        }
    },
    mounted(){
        this.url = this.$store.state.front_url;
    },
    watch: {

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
