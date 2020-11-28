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
      <v-stepper non-linear>
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
        <v-stepper-content step="1">
          <v-data-table
              :headers="dataTableHeaders"
              :items="desserts"
              :items-per-page="10"
              :options.sync="options"
              :server-items-length="totalDesserts"
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
                        v-bind="attrs"
                        v-on="on"
                        class="text-h6 mb-2"
                        color="primary"
                        dark
                        tile
                    >
                      <v-icon left>
                        flaticon-add-hand-drawn-button-outline
                      </v-icon>
                      زمان جدید
                    </v-btn>
                  </template>
                  <v-form ref="form" v-model="timeFormValid" @submit.prevent="submitTime">
                    <v-card>
                      <v-card-title>
                        <span class="headline">ثبت زمان جدید</span>
                      </v-card-title>

                      <v-card-text>
                        <v-container>
                          <v-row>
                            <v-col
                                cols="12"
                                md="12"
                                sm="6"
                            >
                              <v-select
                                  v-model="timeForm.day"
                                  :items="days"
                                  :rules="dayRules"
                                  dense
                                  hide-details
                                  label="روز"
                                  menu-props="auto"
                                  prepend-icon="mdi-map"
                                  single-line
                              ></v-select>
                            </v-col>
                          </v-row>
                          <v-row
                              align="center"
                              justify="space-around"
                          >
                            <v-col style="width: 350px; flex: 0 1 auto;">
                              <h2 class="mb-3">از ساعت:</h2>
                              <v-time-picker
                                  v-model="timeForm.start"
                                  :max="timeForm.end"
                                  format="24hr"
                              ></v-time-picker>
                            </v-col>
                            <v-col style="width: 350px; flex: 0 1 auto;">
                              <h2 class="mb-3">تا ساعت:</h2>
                              <v-time-picker
                                  v-model="timeForm.end"
                                  :min="timeForm.start"
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
                            color="error"
                            @click="closeDialog"
                        >
                          انصراف
                        </v-btn>
                        <v-btn
                            :disabled="!timeFormValid"
                            :loading="loading"
                            class="text-h6"
                            color="success"
                            type="submit"
                        >
                          ذخیره
                        </v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-form>
                  <v-snackbar
                      v-model="snackbar.status"
                      :color="snackbar.color"
                      absolute
                      content-class="text-h6"
                      left
                      rounded="pill"
                      timeout="4000"
                      top
                  >
                    {{ snackbar.text }}
                    <template v-slot:action="{ attrs }">
                      <v-btn
                          v-bind="attrs"
                          color="white"
                          text
                          @click="snackbar.status = false"
                      >
                        <v-icon>mdi-close</v-icon>
                      </v-btn>
                    </template>


                  </v-snackbar>
                </v-dialog>
              </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
              <v-icon
                  class="mr-2"
                  small

              >
                mdi-pencil
              </v-icon>
              <v-icon
                  class="mr-4"
                  small
              >
                mdi-delete
              </v-icon>
            </template>
          </v-data-table>
        </v-stepper-content>

        <v-stepper-content step="2">
          <v-data-table
              :headers="dataTableSubjectsHeaders"
              :items="desserts"
              :items-per-page="10"
              :options.sync="options"
              :server-items-length="totalDesserts"
              class="elevation-1 mt-3"
              loading-text="لطفا صبر نمایید"
          >
            <template v-slot:top>
              <v-toolbar
                  flat
              >
                <v-toolbar-title>موضوع مطالعاتی شما</v-toolbar-title>
                <v-divider
                    class="mx-4"
                    inset
                    vertical
                ></v-divider>
                <v-spacer></v-spacer>
                <v-dialog
                    v-model="CreateSubjectDialog"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        v-bind="attrs"
                        v-on="on"
                        class="text-h6 mb-2"
                        color="primary"
                        dark
                        tile
                    >
                      <v-icon left>
                        flaticon-add-hand-drawn-button-outline
                      </v-icon>
                      موضوع جدید
                    </v-btn>
                  </template>
                  <v-form ref="form" v-model="subjectFormValid" @submit.prevent="submitSubject">
                    <v-card>
                      <v-card-title>
                        <span class="headline">ثبت موضوع جدید</span>
                      </v-card-title>

                      <v-card-text>
                        <v-container>
                          <v-row v-for="(input,k) in subjectPriorityInput" :key="k">
                            <v-col
                                cols="12"
                                md="6"
                                sm="6"
                            >
                              <v-text-field
                                  v-model="input.subject"
                                  :rules="subjectRule"
                                  label="موضوع جدید "
                                  outlined
                                  prepend-inner-icon="mdi-book"
                              ></v-text-field>
                            </v-col>
                            <v-col
                                cols="12"
                                md="6"
                                sm="6"
                            >
                              <v-radio-group
                                  v-model="input.priority"
                                  row
                              >
                                <template v-slot:label>
                                  اولویت موضوع خود را وارد نمایید
                                </template>
                                <v-radio
                                    label="کم"
                                    value="low"
                                ></v-radio>
                                <v-radio
                                    label="معمولی"
                                    value="mid"
                                ></v-radio>
                                <v-radio
                                    label="زیاد"
                                    value="high"
                                ></v-radio>
                              </v-radio-group>
                            </v-col>
                          </v-row>
                          <v-btn
                              class="mx-2"
                              fab
                              dark
                              color="indigo"
                              @click="addSubjectInput"
                          >
                            <v-icon dark>
                              mdi-plus
                            </v-icon>
                          </v-btn>
                          <v-btn
                              class="mx-2"
                              fab
                              dark
                              color="primary"
                              @click="removeSubjectInput"
                          >
                            <v-icon dark>
                              mdi-minus
                            </v-icon>
                          </v-btn>

                        </v-container>
                      </v-card-text>

                      <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            class="text-h6"
                            color="error"
                            @click="CreateSubjectDialog = false"
                        >
                          انصراف
                        </v-btn>
                        <v-btn
                            :disabled="!subjectFormValid"
                            :loading="loading"
                            class="text-h6"
                            color="success"
                            type="submit"
                        >
                          ذخیره
                        </v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-form>
                  <v-snackbar
                      v-model="snackbar.status"
                      :color="snackbar.color"
                      absolute
                      content-class="text-h6"
                      left
                      rounded="pill"
                      timeout="4000"
                      top
                  >
                    {{ snackbar.text }}
                    <template v-slot:action="{ attrs }">
                      <v-btn
                          v-bind="attrs"
                          color="white"
                          text
                          @click="snackbar.status = false"
                      >
                        <v-icon>mdi-close</v-icon>
                      </v-btn>
                    </template>


                  </v-snackbar>
                </v-dialog>
              </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
              <v-icon
                  class="mr-2"
                  small

              >
                mdi-pencil
              </v-icon>
              <v-icon
                  class="mr-4"
                  small
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
import apiClient from "../../plugins/axios";

export default {
  data() {
    return {
      days: [
        {text: 'شنبه', value: 'sat'},
        {text: 'یکشنبه', value: 'sun'},
        {text: 'دوشنبه', value: 'mon'},
        {text: 'سه شنبه', value: 'tue'},
        {text: 'چهارشنبه', value: 'thu'},
        {text: 'پنجشنبه', value: 'wed'},
        {text: 'جمعه', value: 'fri'}
      ],
      dialog: true,
      loading: false,
      CreateTimeDialog: false,
      CreateSubjectDialog: false,
      timeFormValid: true,
      subjectFormValid: true,
      snackbar: {
        status: false,
        text: null,
        color: null,
      },
      timeForm: {
        day: null,
        start: null,
        end: null,
      },
      dataTableHeaders: [
        {text: 'روز', value: 'day'},
        {text: 'از ساعت', value: 'from'},
        {text: 'تا ساعت', value: 'to'},
        {text: 'عملیات', value: 'actions', sortable: false},
      ],
      totalDesserts: 0,
      desserts: [],
      options: {},
      dayRules: [
        v => !!v || 'روز مورد نظر خود را وارد نمایید',
      ],
      subjectRule: [
        v => !!v || 'موضوع مورد نظر خود را وارد نمایید',
      ],
      priorityItems: [
        {text: 'کم'},
        {text: 'معمولی'},
        {text: 'زیاد'},
      ],
      subjectPriorityInput: [
        { subject: '', priority: ''},
      ]
    }
  },
  methods: {
    ...mapMutations([
      'hideModal'
    ]),
    async submitTime() {
      if (this.$refs.form.validate()) {
        await apiClient.get('/csrf-cookie');
        this.loading = true;
        apiClient.post('/time', this.timeForm).then((res) => {
          if (res.status === 201) {
            this.snackbar.status = true;
            this.snackbar.text = "زمان مورد نظر شما با موفقیت اضافه شد";
            this.snackbar.color = "success"
            this.loading = false;
            this.$refs.form.reset();
          }
        }).catch((error) => {
          if (error.response.status === 405 || error.response.status === 500) {
            this.snackbar.status = true;
            this.snackbar.text = " متاسفم مشکلی از طرف ما به وجود آمده است !";
            this.snackbar.color = "error"
            this.loading = false;
            this.$refs.form.reset();
          }
        });
      }

    },
    async submitSubject() {
      if (this.$refs.form.validate()) {
        await apiClient.get('/csrf-cookie');
        this.loading = true;
        apiClient.post('/subject',this.subjectPriorityInput).then((res) => {
          if (res.status === 201) {
            this.snackbar.status = true;
            this.snackbar.text = "زمان مورد نظر شما با موفقیت اضافه شد";
            this.snackbar.color = "success"
            this.loading = false;
            this.$refs.form.reset();
          }
        }).catch((error) => {
          if (error.response.status === 405 || error.response.status === 500) {
            this.snackbar.status = true;
            this.snackbar.text = " متاسفم مشکلی از طرف ما به وجود آمده است !";
            this.snackbar.color = "error"
            this.loading = false;
            this.$refs.form.reset();
          }
        });
      }
    },
    closeDialog() {
      this.CreateTimeDialog = false;
    },
    addSubjectInput() {
      this.subjectPriorityInput.push(
          {
            subject: '', priority: ''
          })
    },
    removeSubjectInput() {

     if(this.subjectPriorityInput.length > 1){
       this.subjectPriorityInput.pop();
     }
    },
    getDataFromApi() {
      this.loading = true;
      return new Promise((resolve, reject) => {
        const {sortBy, sortDesc, page, itemPerPage} = this.options

        apiClient.get('/time').then((res) => {
          let items = res;
          const total = items.length;
        }).catch((error) => {
        })
      })
    }
  },
  watch: {},
  mounted() {
  },
  destroyed() {
    this.hideModal();
  }
}
</script>

<style>

</style>