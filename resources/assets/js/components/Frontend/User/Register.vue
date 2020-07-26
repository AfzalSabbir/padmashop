<template>
    <div>
    	<div class="form-group row">
    		<div class="col-md-6">
    			<label >District</label> 
    			<select name="district_id" @click="district_clicked()" id="district_id" v-model="district_id" class="form-control m-0" required>
    				<option disabled selected>--Select District-- </option>
    				<option v-for="district in districts" :value="district.id">{{ district.name }}</option>
    			</select>
    		</div>
    		<div class="col-md-6">
    			<label>Upazila</label>
                <i v-if="loaded_upazillas" class="fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom"></i>
    			<select name="upazilla_id" id="upazilla_id" class="form-control m-0" required>
    				<option v-for="upazilla in upazillas" :value="upazilla.id">{{ upazilla.name }}</option>
    			</select>
    		</div>
    	</div>
        <ul class="row">
            <li class="col-sm-12 col-md-6">
                <label>Have a distributor ?
                    <span class="form-control clearfix mt-2" >
                        <label style="width: 25%;float: left; margin: 0;"><input type="radio" v-model="is_distributor" value="0" name="is_distributor" style="height: 15px;padding:0;margin:0;">&nbsp; No</label>
                        <label style="width: 25%;float: left; margin: 0;"><input type="radio" v-model="is_distributor" value="1" name="is_distributor" style="height: 15px;padding:0;margin:0;">&nbsp; Yes</label>
                    </span>
                </label>
            </li>
        </ul>
        <ul class="row align-items-end" v-if="is_distributor==1">
            <li class="col-sm-12 col-md-6">
                <label>Distributor Code
                    <input type="text" id="d_code" class="form-control d_code" name="d_code" v-model="d_code" placeholder="">
                </label>
            </li>
            <li class="col-sm-12 col-md-6">
                <label>Distributor Name
                    <input id="d_name" v-model="d_name" name="d_name" class="form-control distributor_name d-block text-success disabled" readonly="">
                </label>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "register",
        props: {
            districts: {
                type: Array,
                required: true
            },
        },
        data(){
            return {
                upazillas: [],
                district_id: '',
                upazillas:'',
                loaded_upazillas: false,
                is_distributor: 0,
                d_code: '',
                d_name: '',
            }
        },
        watch: {
            is_distributor:function(){
                if(this.is_distributor == 0){
                    this.d_code = '';
                    this.d_name = '';
                }
            },
            district_id: function(){
                this.loaded_upazillas = true;
                axios.post(this.$store.state.front_url+'/get-all-upazillas', {
                    district_id: this.district_id
                })
                .then((response) => {
                    this.loaded_upazillas = false;
                    this.upazillas = response.data;
                })
                .catch((exception) => {
                    console.log(exception);
                });
            },
            d_code:function(){
                axios.get(this.$store.state.front_url+'/get-distributor/'+this.d_code)
                .then((response)=>{
                    this.d_name = response.data;
                })
                .catch((exception)=>{
                    console.log(exception);
                });
            }
        }
    }
</script>

