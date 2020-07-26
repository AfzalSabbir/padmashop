<template>
	<div style="position: static;">
        <input type="hidden" class="form-control" name="product" value="">
        <ul class="row">
            <li class="col-sm-12" v-if="!getNumber">
                <label>Username or Mobile <p class="number_error" >{{ error }}</p>
                    <input type="text" class="form-control" v-model="number" placeholder="">
                </label>
            </li>
            <li class="col-sm-12" v-if="getNumber">
                <label>OTP Code
                    <input type="text" class="form-control" v-model="otp_code" placeholder="">
                </label>
            </li>
            <li class="col-sm-12 text-left mb-0" style="display: flex;align-items: center;justify-content: space-between;">
                <a @click="register_form()" style="cursor: pointer;color: green;">Create a account</a>
                <button type="submit" @click="getOTP()" v-if="!getNumber"  class="btn btn-success">Submit</button>
                <button type="submit" @click="login()"  v-if="getNumber" class="btn btn-success">Login</button>
            </li>
        </ul>
        <div class="loader" v-if="loader">
        	<div>
        		Please wating...
        	</div>
        </div>
	</div>
</template>

<script>
	export default {
		name:'Login',
		props: {
	      url: {
	          type: String,
	          required: true
	      }
	    },
		data(){
			return {
				btn:'Submit',
				create_account: '',
				getNumber: '',
				number: '',
				loader: false,
				error: '',
				otp_code: '',
			}
		},
		mounted(){
			
		},
		methods:{
			register_form:function(){
				window.location.href = window.location.origin+'/register';
			},
			getOTP:function(){
				if(this.number != ''){
					this.loader = true;
					axios.post(this.$store.state.front_url+'/log-otp', {
	                    mobile: this.number
	                })
	                .then((response) => {
	                	console.log(response.data);
	                	this.loader = false;
	                    if(response.data == 'success'){
	                    	this.getNumber = this.number;
	                    	this.error = '';
	                    }else{
	                    	this.error = 'Phone number does not Validate!';
	                    }
	                })
	                .catch((exception) => {
	                   console.log(exception);
	                });
				}
			},
			login:function(){
				this.loader = true;
				axios.post(this.$store.state.front_url+'/login-otp', {
                    otp_code: this.otp_code,
                    mobile  : this.getNumber
                })
                .then((response) => {
                	this.loader = false;
                	if(response.data == 'success'){
                		window.history.back();
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
	.loader{
		position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #00000080;
        display: flex;
        text-align: center;
        align-items: center;
	}
	.number_error{
		color: red;
		margin-left: 10px;
		padding: 0;
		float: right;
	}
	.loader > div {
		margin: 0 auto;
    	font-size: 22px;
    	color: #fff;
	}
</style>
