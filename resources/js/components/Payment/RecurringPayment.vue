<template>
  
  <div>
    <button @click="openScheduleModal" class="btn hami-btn btn-3">Set Recurring Billing</button>

      <div class="modal fade" id="newSchedule" role="dialog" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                  <h3 class="modal-title">
                    <i class="ico-calendar"></i>
                    Recurring Payment
                  </h3>
                  <button @click="closeModal" class="close" data-dismiss="modal" type="button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Product Title:</label>
                            <div><b>{{ product.title }}</b></div>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Price:</label>
                            <div><b>&#8358; {{ (product.price).toLocaleString() }}</b></div>
                          </div>
                            <div class="form-group">
                              <label  class="control-label required">How Often Do you want to be billed?</label>
                              <select class="form-control" v-model="frequency">
                                  <option value="daily" :selected="frequency === 'daily'">Daily</option>
                                  <option value="weekly" :selected="frequency === 'weekly'">Weekly</option>
                                  <option value="monthly" :selected="frequency === 'monthly'">Monthly</option>
                              </select>
                            </div>
                            <div class="form-group" v-if="frequency === 'daily'">
                              <label  class="control-label required">Choose the time of the day</label>
                              <select v-model="daytime" class="form-control">
                                <option value="">please select</option>
                                <option  v-for="(t, index) in times" :key="index" :value="index">{{ t }}</option>
                              </select>
                            </div>
                            <div class="form-group" v-if="frequency === 'weekly'">
                              <label  class="control-label required">Choose the day of the week</label>

                              <select v-model="weekday" class="form-control">
                                <option value="">please select</option>
                                <option  v-for="(t, index) in weekdays" :key="index" :value="t">{{ t }}</option>
                              </select>
                            </div>

                            <div class="form-group"  v-if="frequency === 'monthly'">
                              <label  class="control-label required">Choose the billing day</label>
                              <select v-model="monthday" class="form-control">
                                <option value="">please select</option>
                                <option  v-for="(t, index) in monthdays" :key="index" :value="t">{{ t }}</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
                <span  v-if="success">
                  <div class="alert success">
                    We have received your request! This feature will be available soon.
                  </div>
                  <div class="modal-footer">
                  <button @click="closeModal" class="btn hami-btn btn-3" data-dismiss="modal" type="button">Ok</button>
                  </div>
                </span>
                
                <div class="modal-footer" v-if="!success">
                    <button :disabled="disabled" type="button" @click="schedule" class="btn hami-btn btn-3 mt-15" v-if="!loading">Schedule Billing</button>
                    <button :disabled="disabled" type="button" class="btn hami-btn btn-3 mt-15" v-if="loading">Schedule..</button>
                </div>
            </div>
        </div>
      </div>
  </div>

</template>

<script>
export default {

  props: {
    product: {
      type: Object,
      required: true
    }
  },

  computed: {
    disabled() {
      return this.loading || 
        (this.frequency === 'daily' && this.daytime === '') || 
        (this.frequency === 'weekly' && this.daytime === 'weekday') || 
        (this.frequency === 'monthly' && this.daytime === 'monthday')
    }
  },

  data() {
    return {
      loading: false,
      errorMessages: '',
      success: false,
      frequency: 'daily',
      daytime: '',
      weekday: '',
      monthday: '',

      weekdays: {
        '1': 'Monday',
        '2': 'Tuesday',
        '3': 'Wednesday',
        '4': 'Thursday',
        '5': 'Friday',
        '6': 'Saturday',
        '7': 'Sunday'
      },

      monthdays: {
        '1': '1st',
        '2': '2nd',
        '3': '3rd',
        '4': '4th',
        '5': '5th',
        '6': '6th',
        '7': '7th',
        '8': '8th',
        '9': '9th',
        '10': '10th',
        '11': '11th',
        '12': '12th',
        '13': '13th',
        '14': '14th',
        '15': '15th',
        '16': '16th',
        '17': '17th',
        '18': '18th',
        '19': '19th',
        '20': '20th',
        '21': '21th',
        '22': '22th',
        '23': '23th',
        '24': '24th',
        '25': '25th',
        '26': '26th',
        '27': '27th',
        '28': '28th',
        '29': '29th',
        '30': '30th',
        '31': '31th'
      },
      times: {
        '0': '12:00 am',
        '1': '1:00 am',
        '2': '2:00 am',
        '3': '3:00 am',
        '4': '4:00 am',
        '5': '5:00 am',
        '6': '6:00 am',
        '7': '7:00 am',
        '8': '8:00 am',
        '9': '9:00 am',
        '10': '10:00 am',
        '11': '11:00 am',
        '12': '12:00 am',
        '13': '13:00 pm',
        '14': '14:00 pm',
        '15': '15:00 pm',
        '16': '16:00 pm',
        '17': '17:00 pm',
        '18': '18:00 pm',
        '19': '19:00 pm',
        '20': '20:00 pm',
        '21': '21:00 pm',
        '22': '22:00 pm',
        '23': '23:00 pm',
      }
    }
  },
  
  methods: {

    openScheduleModal() {
      $("#newSchedule").modal('show');
    },

    closeModal() {
      $("#newSchedule").hide();
    },


    async schedule() {

    this.loading = true;

     let period = ''

      if(this.frequency === 'daily') {
        period = this.daytime
      } else if(this.frequency === 'weekly') {
        period = this.weekday
      } else if (this.frequency === 'monthly') {
        period = this.monthday
      }

      let postData = {
        product_id: this.product.id,
        frequency: this.frequency,
        period: period
      }

      try {

        const result = await axios.post('/products/schedule', postData)

        if(result && result.status === 201) {

          this.loading = false

          this.success = true  

          console.log("the result: ", result)

        }

      } catch(error) {

        this.loading = false

        console.log("this is the recurring error: ", error)

      }
    },
  }
}
</script>

<style scoped>

.errorClass {
  border: 1px solid red;
}

.success {
  border: 1px solid green;
}

.style-modal {
  background: #fff;
  padding: 10px;
  border-radius: 10px solid;
}
.style-content {
  padding: 20px;
}

@media (min-width: 768px) {
  .style-modal {
    width: 50%;
  }
}

.alert {
  width: 90%;
  margin: 2rem auto;
  border-radius: 2px;
  color: #000;
  background-color: #fff;
  padding: 0.5rem;
  text-align: center;
  animation-duration: 2s;
  animation-name: moveInBottom;
}

@keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(3rem);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}

</style>