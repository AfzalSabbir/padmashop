<template>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="contact_form_container">
                <div class="contact_form_title h1 ml-2">Get in Touch</div>

                <form v-on:submit.prevent id="contact_form">
                    <div
                        class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                        <input type="text" v-model="name" id="contact_form_name" class="form-control contact_form_name input_field m-2" placeholder="Your name" required="required" data-error="Name is required.">
                        <input type="email" v-model="email" id="contact_form_email" class="form-control contact_form_email input_field m-2" placeholder="Your email" required="required" data-error="Email is required.">
                        <input type="tel" v-model="mobile" id="contact_form_phone" class="form-control contact_form_phone input_field m-2" placeholder="Your phone number">
                    </div>
                    <div class="contact_form_text px-2">
                        <textarea id="contact_form_message" v-model="message" class="text_field contact_form_message form-control p-2" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                    </div>
                    <div class="contact_form_button">
                        <button role="button" @click="save" class="button btn btn-success contact_submit_button m-2">Send Message</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Contact",
        props: ['url'],
        data() {
            return {
                name: '',
                email: '',
                mobile: '',
                message: ''
            }
        },
        methods: {
            save: function () {
                this.success = false;
                if (this.name && this.mobile && this.email && this.message){
                    axios.post(this.url + '/contactSave', {
                        name: this.name,
                        mobile: this.mobile,
                        email: this.email,
                        message: this.message
                    }).then((response) => {
                        console.log(response.data);
                        toastr.success("Data successfully Save!");
                        this.name = '',
                        this.mobile = '',
                        this.email = '',
                        this.message = ''
                    })
                        .catch((e) => {
                            console.log(e)
                        });
                }
            },
        },
    }
</script>

<style scoped>

</style>
