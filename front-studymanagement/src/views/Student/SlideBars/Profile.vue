<template>
    <v-card class="ma-2">
        <v-list class="d-flex flex-column align-center justify-center">
            <v-list-item class="px-2">
                <v-list-item-title class="cardTitle d-flex align-center justify-center">پروفایل</v-list-item-title>
            </v-list-item>
            <v-divider  width="80%"></v-divider>
            <v-list-item>
                <v-list-item-avatar class="mt-6 avatar"  width="96px" height="96px" >
                    <img src="https://cdn.vuetifyjs.com/images/john.png" alt="avatar"/>
                </v-list-item-avatar>
            </v-list-item>

            <v-list-item link>
                <v-list-item-content >
                    <v-list-item-title class="title text-center mb-3">مهدی</v-list-item-title>
                    <v-list-item-subtitle class="text-center mb-3">mahdizahrani76@gmail.com</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-list-item-group>
                <v-list-item
                        v-for="(item, i) in items"
                        :key="i"
                >
                    <v-list-item-icon>
                        <v-icon v-text="item.icon"></v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title v-text="item.text"></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list-item-group>
        </v-list>
    </v-card>
</template>

<script>
export default {
    data() {
        return {
            items: [
                { text: 'برنامه های من', icon: 'flaticon-pages-hand-drawn-interface-symbol' },
                { text: 'گزارش ها', icon: 'flaticon-drawers-hand-drawn-tool-outline' },
                { text: 'تنظیمات', icon: 'flaticon-settings-hand-drawn-symbol' }
            ],
        }
     }

}
</script>

<style scoped>
.cardTitle{
    width: 202px;
    height: 46px;
    }
    .avatar{
        border: 2px solid #073576;
    }
</style>