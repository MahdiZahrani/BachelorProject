<template>
 <div class="wrap">
      <main-schedule></main-schedule>
      <main-report></main-report>
 </div>
</template>

<script>
   import Schedule from "./Schedule";
   import Report from "./Report";


   export default {
        data(){
            return{

            }
        },
        components: {
            'main-schedule' : Schedule,
            'main-report' : Report,
        },
        methods : {
        }
    }
</script>

<style scoped>
</style>