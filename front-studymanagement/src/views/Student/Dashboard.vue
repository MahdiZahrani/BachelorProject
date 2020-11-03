<template>
    <v-row  id="container">
        <dashboard-right-sidebar :hide="drawerRight" class="ma-4" ></dashboard-right-sidebar>

        <v-col class="pa-0 mt-1">
            <v-card
                 class="my-5 rounded-t-lg mx-lg-5 mx-md-3 pa-0 "
             >
                <dashboard-app-bar @minimizeRightSideBar="rightSidebar" @minimizeLeftSideBar="leftSidebar"></dashboard-app-bar>
                 <v-divider></v-divider>
                <dashboard-main></dashboard-main>
            </v-card>
        </v-col>

        <dashboard-left-sidebar :hidee="drawerLeft" class="ma-4" ></dashboard-left-sidebar>
    </v-row>
</template>


<script>
    import AppBar from "./Core/AppBar";
    import RightSideBar from "./Core/RightSideBar";
    import LeftSideBar from "./Core/LeftSideBar";
    import Main from "./Main/Main";
    export default {
        data(){
            return{
                drawerRight:true,
                drawerLeft:true,
         }
        },
        components : {
            'dashboard-app-bar' : AppBar,
            'dashboard-right-sidebar' :RightSideBar,
            'dashboard-left-sidebar' :LeftSideBar,
            'dashboard-main' : Main
        },
        methods:{
            rightSidebar(event) {
                this.drawerRight = event;
            },
            leftSidebar(event) {
                this.drawerLeft = event;
            }
        }
    }
</script>

<style scoped>
#container{
    background: rgba(130, 225, 255, 0.1);
}

</style>