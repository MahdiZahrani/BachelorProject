<template>
    <v-card class="ma-2">
        <v-list class="d-flex flex-column align-center justify-center">
            <v-list-item class="px-2">
                <v-list-item-title class="cardTitle d-flex align-center justify-center">مشاور شما</v-list-item-title>
            </v-list-item>
            <v-divider  width="80%"></v-divider>
            <v-list-item>
                <v-list-item-avatar class="mt-6 avatar"  width="96px" height="96px" >
                    <img src="https://cdn.vuetifyjs.com/images/john.png" alt="avatar"/>
                </v-list-item-avatar>
            </v-list-item>

            <v-list-item link>
                <v-list-item-content >
                    <v-list-item-title class="text-subtitle-1 text-center mb-3">شما مشاوری انتخاب نکرده اید</v-list-item-title>
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
                    { text: 'درخواست مشاور', icon: 'flaticon-add-user-hand-drawn-outline' },
                    { text: 'ارسال پیام', icon: 'flaticon-arrow-pointing-up-hand-drawn-symbol' },
                    { text: 'نظرسنجی', icon: 'flaticon-clipboard-hand-drawn-interface-symbol' },
                    // { text: 'درباره ی مشاور', icon: 'flaticon-business-man-hand-drawn-outline' }
                ],
            }
        }
    }
</script>

<style scoped>

</style>