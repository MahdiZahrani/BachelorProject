<template>
    <v-card
        id = "schedule"
        class="ma-3 pt-3 px-3"
    >
        <v-row    v-if="showDays"  >
            <schedule-daily
                class="mx-auto mb-3"
                color="white"
                v-for="n in 7"
                :key="n"
            >
                <div slot="date">1 آذر</div>
                <div slot="day">شنبه</div>

            </schedule-daily>
        </v-row>
        <v-row v-else>
            sdafsdf
        </v-row>
    </v-card>
</template>

<script>
    import DailySchedule from "./DailySchedule";
    export default {
        data: () => ({
            showDays : true,
            item: 1,
            items: [
                { Mon:{ task1 :{ 'lesson' : 'riyazi', 'time' : '7 to 8' , 'checked' : 'false'}}},
                { Tue:{ task1 :{ 'lesson' : 'riyazi', 'time' : '7 to 8' , 'checked' : 'false'}}},
                { Wed:{ task1 :{ 'lesson' : 'riyazi', 'time' : '7 to 8' , 'checked' : 'false'}}},
                { Thu:{ task1 :{ 'lesson' : 'riyazi', 'time' : '7 to 8' , 'checked' : 'false'}}},
                { Fri:{ task1 :{ 'lesson' : 'riyazi', 'time' : '7 to 8' , 'checked' : 'false'}}},
                { Sat:{ task1 :{ 'lesson' : 'riyazi', 'time' : '7 to 8' , 'checked' : 'false'}}},
                { Sun:{ task1 :{ 'lesson' : 'riyazi', 'time' : '7 to 8' , 'checked' : 'false'}}},

            ],
        }),
        components:{
            'schedule-daily' : DailySchedule,
        }
    }
</script>

<style scoped>
#schedule{
    background: rgba(130, 225, 255, 0.1);
}
</style>