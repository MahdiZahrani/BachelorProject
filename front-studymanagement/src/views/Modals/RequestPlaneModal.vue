<template>
  <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
  >
    <v-card
      class="container"
    >
      <v-toolbar
          color="primary"
          dark
      >
        <v-toolbar-title>دریافت برنامه جدید</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn
            dark
            icon
            @click="this.hideModal"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-toolbar>
      <v-stepper  non-linear>
        <v-stepper-header>
          <v-stepper-step
              editable
              step="1"
          >
          روزهایی که می خواهید مطالعه کنید را با بازه زمانی مورد نظر خود را مشخص کنید
          </v-stepper-step>

          <v-divider></v-divider>

          <v-stepper-step
              editable
              step="2"
          >
            سر فصل هایی که می خواهید مطالعه کنید را با اولویت وارد نمایید
          </v-stepper-step>
        </v-stepper-header>
        <v-stepper-content step="1" >
          <v-data-table
              :headers="dataTableHeaders"
              :items="desserts"
              :items-per-page="10"
              class="elevation-1 mt-3"
              loading-text="لطفا صبر نمایید"
          >
            <template v-slot:top>
              <v-toolbar
                  flat
              >
                <v-toolbar-title>زمان های انتخابی شما</v-toolbar-title>
                <v-divider
                    class="mx-4"
                    inset
                    vertical
                ></v-divider>
                <v-spacer></v-spacer>
                <v-dialog
                    v-model="CreateTimeDialog"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        color="primary"
                        dark
                        class="text-h6 mb-2"
                        v-bind="attrs"
                        v-on="on"
                    >
                      زمان جدید
                    </v-btn>
                  </template>

                  <v-card>
                    <v-card-title>
                      <span class="headline">ثبت زمان جدید</span>
                    </v-card-title>

                    <v-card-text>
                      <v-container>
                        <v-row>
                          <v-col
                              cols="12"
                              sm="6"
                              md="12"
                          >
                            <v-select
                                v-model="day"
                                :items="days"
                                menu-props="auto"
                                label="روز"
                                dense
                                hide-details
                                prepend-icon="mdi-map"
                                single-line
                            ></v-select>
                          </v-col>
                        </v-row>
                      <v-row
                          justify="space-around"
                          align="center"
                      >
                        <v-col style="width: 350px; flex: 0 1 auto;">
                          <h2 class="mb-3">از ساعت:</h2>
                          <v-time-picker
                              v-model="start"
                              :max="end"
                              format="24hr"
                          ></v-time-picker>
                        </v-col>
                        <v-col style="width: 350px; flex: 0 1 auto;">
                          <h2 class="mb-3">تا ساعت:</h2>
                          <v-time-picker
                              v-model="end"
                              :min="start"
                              format="24hr"
                          ></v-time-picker>
                        </v-col>
                      </v-row>
                      </v-container>
                    </v-card-text>

                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                          class="text-h6"
                          color="red"
                      >
                        انصراف
                      </v-btn>
                      <v-btn
                          class="text-h6"
                          color="success"
                      >
                        ذخیره
                      </v-btn>
                    </v-card-actions>
                  </v-card>

                </v-dialog>




              </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
              <v-icon
                  small
                  class="mr-2"

              >
                mdi-pencil
              </v-icon>
              <v-icon
                  small
                  class="mr-4"
              >
                mdi-delete
              </v-icon>
            </template>
          </v-data-table>


        </v-stepper-content>
      </v-stepper>
    </v-card>
  </v-dialog>
</template>


<script>
import {mapMutations} from 'vuex';

export default {
  data() {
    return {
      days : ['شنبه','یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'],
      dialog: true,
      CreateTimeDialog : false,
      day:null,
      start: null,
      end: null,
      dataTableHeaders : [
        {text : 'روز' , value : 'day'},
        {text : 'از ساعت' , value : 'fromTime'},
        {text : 'تا ساعت' , value : 'toTime'},
        { text: 'عملیات', value: 'actions', sortable: false },
      ],
      desserts :[
        {
          day : 'شنیه',
          fromTime : '2PM',
          toTime   : '6PM'
        }
      ]
    }
  },
  methods: {
    ...mapMutations([
      'hideModal'
    ])
  }
}
</script>

<style>

</style>