<template>
    <transition-group enter-active-class="animate__animated animate__fadeIn" appear>
     <v-sheet key="register" class="rounded-l-lg d-flex  px-sm-12 px-2 flex-column"  height="100%">

         <v-btn  x-large color="primary" class="mt-9 mb-sm-16 mb-2 text-h6 d-flex justify-space-between pl-1" >
             <span>ثبت نام با گوگل</span>
             <div style="background-color: white ; width: 55px ; height: 49px; border-radius: 11px">
                 <img width="45px" height="45px"
                      src="../../assets/images/googleIcon.png"
                      alt="googleIcon"/>
             </div>
         </v-btn>
         <v-alert
                 v-model="alert"
                 dismissible
                 close-icon="mdi-delete"
                 color="red"
                 border="left"
                 elevation="2"
                 colored-border

         >
            <div v-html="alertText"> {{alertText}}</div>
         </v-alert>
        <v-form class="mt-sm-16 mt-5" ref="form"  v-model="valid" @submit.prevent="submit">
            <v-text-field
                    autofocus
                    counter="25"
                    class="mb-8"
                    v-model="form.name"
                    :rules="nameRules"
                    label="نام"
                    prepend-icon="flaticon-boy-hand-drawn-face"
                    required
            ></v-text-field>
            <v-text-field
                    class="mb-8"
                    v-model="form.email"
                    :rules="emailRules"
                    label="ایمیل"
                    prepend-icon="flaticon-mail-envelope-back-hand-drawn-outline"
                    required
            ></v-text-field>
            <v-text-field
                    class="mb-8"
                    counter="10"
                    v-model="form.mobile"
                    label="شماره موبایل"
                    :rules="mobileRules"
                    prepend-icon="flaticon-tablet-hand-drawn-tool-outline"
                    suffix="0"
                    required
            ></v-text-field>
            <v-text-field
                    :type="showPass ? 'text' : 'password'"
                    :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
                    class="mb-8"
                    counter
                    hint="رمز عبور باید حداقل ۸ کاراکتر و شامل حرف بزرگ و کاراکتر خاص باشد"
                    v-model="form.password"
                    :rules="passwordRules"
                    label="رمز عبور "
                    prepend-icon="flaticon-key-hand-drawn-outline"
                    required
                    @click:append="showPass = !showPass"
            ></v-text-field>
            <v-text-field
                    :type="showConfPass ? 'text' : 'password'"
                    :append-icon="showConfPass ? 'mdi-eye' : 'mdi-eye-off'"
                    class="mb-8"
                    v-model="form.password_confirmation"
                    :rules="passwordConfirmRules"
                    label="تکرار رمزعبور "
                    prepend-icon="flaticon-key-hand-drawn-outline"
                    required
                    @click:append="showConfPass = !showConfPass"
            ></v-text-field>
            <v-btn
                    :disabled="!valid"
                    :loading="loading"
                    type="submit"
                    class="text-h6 mb-sm-16"
                    block
                    x-large
                    rounded
                    color="info"
            >ثبت نام</v-btn>
        </v-form>
    </v-sheet>
    </transition-group>
</template>

<script>
    export default {
        data(){
            return{
                showPass : false,
                showConfPass : false,
                loading : false,
                valid : true,
                alert : false,
                alertText: "",
                form : {
                    name : '',
                    email : '',
                    mobile : '',
                    password : '',
                    password_confirmation:'',
                },
                nameRules: [
                    v => !!v || 'نام را وارد نمایید',
                    v => (v && v.length >= 4) || 'نام شما نمی تواند کمتر از 4 کاراکتر باشد',
                    v => (v && v.length <= 25) || 'نام شما نمی تواند بیشتر از 25 کاراکتر باشد',
                ],

                emailRules: [
                    v => !!v || 'ایمیل را وارد نمایید',
                    v => /.+@.+\..+/.test(v) || 'ایمیل معتبر نمی باشد',
                ],

                mobileRules: [
                    v => !!v || 'شماره موبایل خود را وارد نمایید',
                    v => /^9[0-9]{9}$/.test(v) || 'شماره موبایل معتبر نمی باشد',
                ],

                passwordRules: [
                    v => !!v || 'رمز عبور خود را وارد نمایید',
                    v => (v && v.length >= 8) || 'رمز عبور نمی تواند کمتر از 8 کاراکتر باشد',
                    v => !(/^[\u0600-\u06FF\s]+$/.test(v)) || 'صفحه کلید خود را انگلیسی نمایید',
                    v => /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/.test(v)
                        || 'رمز عبور معتبر نمی باشد باید شامل یک حرف بزرگ و کاراکتر خاص و عدد باشد',

                ],

                passwordConfirmRules: [
                    v => !!v || 'تکرار رمز عبور  را وارد نمایید',
                    v => !(/^[\u0600-\u06FF\s]+$/.test(v)) || 'صفحه کلید خود را انگلیسی نمایید',
                    v => v === this.form.password || 'تکرار رمز عبور اشتباه می باشد'
                ],
            }
        },
        methods:{
            async submit () {
                if( this.$refs.form.validate() ){
                    this.loading = true;
                    let response = await this.$store.dispatch("register",this.form);
                    if(response.status !== 201){
                        this.alert = true;
                        if(response.status === 500) {
                            this.alertText = " متاسفم مشکلی از طرف ما به وجود آمده است !";
                        }else{
                            let errors = response.data.errors;
                            Object.keys(errors).forEach(key => {
                                const val = errors[key]
                                this.alertText += val[0] + "</br>"
                            })

                        }
                    }else{
                        this.$router.go();
                    }
                    this.loading = false;
                }

            },
        }


    }
</script>

<style scoped>

</style>