<template>
    <v-container id="container" :fluid="true">
       <v-row>
<!--           -->
           <v-sheet color="white" class="rounded-lg d-block ma-2 my-sm-4 mx-sm-9 ma-lg-auto d-sm-flex"
                    elevation="4"
                    width="1420" height="100vh" id="sheet">
               <v-col lg="8" class="pa-0">
                   <transition-group enter-active-class="animate__animated animate__fadeIn" appear>
                   <v-card key="rightLogin" class="rounded-r-lg  backgroundLogo d-flex"  width="100%"
                           height="100%" >
                       <img
                               src="../../assets/images/register-photo.png"
                               alt="Welcome To RegisterForm"
                               class="d-none d-lg-block"
                       />

                      <div class="d-sm-flex flex-sm-column align-end" style="width:100%">
                          <v-btn large
                                 color="white"
                                 class="text-h6 rounded-r-lg rounded-l-0 mb-1 "
                                 @click="setRegister"
                                 :text ="!activeRegister"
                          >ثبت نام</v-btn>
                          <v-btn large
                                 color="white"
                                 class="text-h6 float-left  rounded-r-lg rounded-l-0"
                                 :text ="!activeLogin"
                                 @click="setLogin"
                          >ورود</v-btn>
                      </div>
                   </v-card>
                   </transition-group>
               </v-col >
               <v-col>
                 <Component :is="switchLoginRegister"></Component>
               </v-col>
           </v-sheet>
       </v-row>
    </v-container>
</template>

<script>
    import LoginForm from './LoginAccount'
    import RegisterForm from "./RegisterAccount";
    export default {
        data(){
            return {
                switchLoginRegister: 'account-register',
                activeRegister : true,
                activeLogin : false,
            }
        },
        components:{
            'account-login' : LoginForm,
            'account-register' : RegisterForm
        },
        methods :{
            setRegister() {
                this.switchLoginRegister = 'account-register';
                this.activeRegister = true;
                this.activeLogin = false;
            },
            setLogin() {
                this.switchLoginRegister = 'account-login'
                this.activeLogin = true;
                this.activeRegister = false;
            }
        }
    }
</script>

<style scoped>
.container{
    background: linear-gradient(125.4deg, #073576 0%, #0486E0 51.2%, #05B5E5 95.87%);
}
.backgroundLogo{
    background: linear-gradient(125.03deg, #0E327D -29.13%, #09A1D4 95.29%);
}
.logo{
    background: url("/src/assets/images/register-photo.png") transparent;
}

</style>
