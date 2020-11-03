<template>
    <transition-group enter-active-class="animate__animated animate__fadeIn" appear>
        <v-sheet key="login" class="rounded-l-lg d-flex  px-sm-12 px-2 flex-column"  height="100%">
            <v-btn  x-large color="primary" class="mt-9 mb-sm-16 mb-2 text-h6 d-flex justify-space-between pl-1" >
                   <span>ورود با گوگل</span>
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
              {{alertText}}
            </v-alert>
            <v-form class="mt-sm-16 mt-5" ref="form" lazy-validation v-model="valid" @submit.prevent="submit">
                <v-text-field
                        autofocus
                        class="mb-8"
                        v-model="form.email"
                        :rules="validMobileOrEmail()"
                        label=" ایمیل یا شماره موبایل"
                        prepend-icon="flaticon-mail-envelope-back-hand-drawn-outline"
                        required
                ></v-text-field>
                <v-text-field
                        :type="showPass ? 'text' : 'password'"
                        :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
                        class="mb-8"
                        v-model="form.password"
                        :rules="passwordRules"
                        label="رمز عبور "
                        prepend-icon="flaticon-key-hand-drawn-outline"
                        required
                        @click:append="showPass = !showPass"
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
                >ورود</v-btn>
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
                emailOrPasswordRules :'emailRules',
                loading : false,
                valid : true,
                alert : false,
                alertText: "",
                form : {
                    email : '',
                    password : ''
                },
                passwordRules: [
                    v => !!v || 'رمز عبور خود را وارد نمایید',
                    v => !(/^[\u0600-\u06FF\s]+$/.test(v)) || 'صفحه کلید خود را انگلیسی نمایید',
                ],
            }
        },
        methods: {
            async submit () {

                if( this.$refs.form.validate() ){
                    this.loading = true;
                    let response = await this.$store.dispatch("signIn",this.form);
                    if(response.status !== 204){
                        this.alert = true;
                        if(response.status === 500) {
                            this.alertText = " متاسفم مشکلی از طرف ما به وجود آمده است !";
                        }else{
                            this.alertText = response.data.errors.email[0]
                        }
                    }else{
                        this.$router.go();
                    }
                    this.loading = false;
                }

            },
            validMobileOrEmail() {
                if (this.form.email === '') {
                    return ["ایمیل یا موبایل وارد نمایید"];
                } else if (isNaN(this.form.email) && !/.+@.+\..+/.test(this.form.email)) {
                    return ["ایمیل معتبر نمی باشد"]
                } else if (!isNaN(this.form.email) && !/^9[0-9]{9}$/.test(this.form.email)) {
                    return ["موبایل معتبر نمی باشد.شماره موبایل خود را بدون 0 یا +98 وارد نمایید"]
                }
            },
            showResetPassword(){
                this.resetPassword = "login-resetPassword"
            }
        },
    }
</script>

<style scoped>

</style>