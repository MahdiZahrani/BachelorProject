<template>
    <v-navigation-drawer
            :absolute="!hidee"
            v-model="hidee"
            temporary
            color="transparent"
            hide-overlay
            class="elevation-0"
    >
        <right-profile></right-profile>
        <right-counselor></right-counselor>
    </v-navigation-drawer>
</template>

<script>
    import Profile from "../SlideBars/Profile";
    import Counselor from "../SlideBars/Counselor";
    export default {
        props:['hidee'],
        data(){
            return {
                drawer : this.hide
            }
        },
        components : {
            'right-profile' : Profile,
            'right-counselor' : Counselor
        }
    }
</script>

