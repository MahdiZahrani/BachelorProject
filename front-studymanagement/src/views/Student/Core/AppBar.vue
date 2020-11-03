<template>
    <v-app-bar
            color="white"
            dense
            flat
            class="justify-space-between"
    >
    <div>
        <v-btn icon @click="SidebarRight">
            <v-icon>flaticon-list-items-hand-drawn-symbol-outlines</v-icon>
        </v-btn>

        <v-btn icon>
            <v-icon >flaticon-bell-hand-drawn-interface-symbol</v-icon>
        </v-btn>
    </div>

        <p style="margin: 0">شنبه ۱۸ مرداد ۱۳۹۹</p>

    <div>
        <v-btn icon>
            <v-icon>flaticon-magnifying-glass-hand-drawn-tool</v-icon>
        </v-btn>
        <v-btn icon @click="SidebarLeft">
            <v-icon>flaticon-list-items-hand-drawn-symbol-outlines</v-icon>
        </v-btn>
    </div>
        <v-menu
                left
                bottom
        >
            <v-btn
                    icon
            >
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>

            <v-list>
                <v-list-item
                        v-for="n in 5"
                        :key="n"
                        @click="() => {}"
                >
                    <v-list-item-title>Option {{ n }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </v-app-bar>
</template>

<script>
    export default {
        data(){
            return{
                MinimizeSidebarRight : true,
                MinimizeSidebarLeft : true
            }
        },
        methods : {
            SidebarRight() {
                this.MinimizeSidebarRight = ! this.MinimizeSidebarRight;
                this.$emit('minimizeRightSideBar' , this.MinimizeSidebarRight)
            },
            SidebarLeft() {
                this.MinimizeSidebarLeft = ! this.MinimizeSidebarLeft;
                this.$emit('minimizeLeftSideBar' , this. MinimizeSidebarLeft)
            }
        }
    }
</script>

<style >
    .v-toolbar__content{
        justify-content: space-between;
    }
</style>