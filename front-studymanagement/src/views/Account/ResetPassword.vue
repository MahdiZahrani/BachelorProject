<template>
    <transition-group enter-active-class="animate__animated animate__fadeIn" appear>
        <v-sheet key="login" class="rounded-l-lg d-flex  px-sm-12 px-2 flex-column"  height="100%">
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
                <v-btn
                        :disabled="!valid"
                        :loading="loading"
                        type="submit"
                        class="text-h6 mb-sm-16"
                        block
                        x-large
                        rounded
                        color="info"
                >بازیابی رمز عبور</v-btn>
            </v-form>
        </v-sheet>
    </transition-group>
</template>

<script>

    import { mapActions } from 'vuex'

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
                        this.$router.push({name:'Dashboard'})
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
            }
        },
    }
</script>

<style scoped>

</style>