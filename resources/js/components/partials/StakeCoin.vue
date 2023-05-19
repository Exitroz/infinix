<template>
   <div>
      <div class="card">
         <div class="card-body">
            <div class="avatar-list avatar-list-stacked mb-1">
               <span class="avatar brround cover-image" :data-image-src="`/assets/auth/images/icons/crypto/color/${ coin.img }`"
                  :style="`background: url(/assets/auth/images/icons/crypto/color/${ coin.img }) center center`"></span>
                  <span class="avatar brround cover-image" data-image-src="/assets/auth/images/icons/crypto/color/usdt.svg"
                  style="background: url('/assets/auth/images/icons/crypto/color/usdt.svg') center center"></span>
            </div>
            <h3 class="mb-1 number-font mb-3">{{ coin.name | uppercase }}/USDT</h3>
            <div class="row">
               <div class="col-6">Percentage Yield</div>
               <div class="col-6 text-right">{{ coin.percent }}%</div>
               <div class="col-6">Staking Period</div>
               <div class="col-6 text-right">{{ coin.period }} Days</div>
               <div class="col-6">Asset</div>
               <div class="col-6 text-right">{{ coin.name | uppercase }}</div>
               <div class="col-6">Min. Staking Amount</div>
               <div class="col-6 text-right">{{ coin.min_stake }} {{ coin.name | uppercase }}</div>
            </div>
            <div class="mt-3">
               <button type="button" data-bs-toggle="modal" :data-bs-target="'#c_'+coin.id" class="shadow-none btn btn-md btn-primary btn-block">Subscribe</button>
               <div class="modal fade" ref="modal" :id="'c_'+coin.id" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header border-0">
                           <h3 class="number-font mb-3"><span class="modal-title">Locked Staking</span> | {{ coin.name | uppercase }}/USDT</h3>
                        </div>
                        <div class="modal-body" style="text-align: left !important; padding-top: 0 !important; padding-bottom: 0 !important">
                           <form>
                              <div class="row">
                                 <div class="col-4 mb-5">
                                    <label for="recipient-name" class="form-control-label">Duration:</label>
                                    <div><button class="btn btn-outline-warning shadow-none">&bull; {{ coin.period }} Days</button></div>
                                 </div>
                                 <div class="col-8 mb-5">
                                    <label for="recipient-name" class="form-control-label">Annualized Interest Rate (AIR):</label>
                                    <div><button class="btn btn-outline-warning shadow-none">&bull; {{ coin.percent }}% ROI</button></div>
                                 </div>
                              </div>
                              <div class="mb-3">
                                 <label for="message-text" class="form-control-label">Lock Amount ({{ coin.name | uppercase }}):</label>
                                 <input type="number" :min="coin.min_stake" class="form-control bg-white form-control-lg" v-model="form.amount" inputmode="numeric">
                                 <div class="text-danger pt-1" v-show="isError">* {{ errMsg }} </div>
                                 <div class="text-muted pt-1">Minimum Staking Amount {{ coin.min_stake }} {{ coin.name | uppercase }}</div>
                              </div>
                              <hr>
                              <ul class="row">
                                 <div class="col-6"><b class="text-primary">&bull;</b> Stake Date: </div>
                                 <div class="col-6 text-right"><b class="text-primary"></b> {{ form.today | formatDate }}</div>
                                 <div class="col-6"><b class="text-primary">&bull;</b> Redemption Date: </div>
                                 <div class="col-6 text-right"><b class="text-primary"></b> {{ form.end_date | formatDate }}</div>
                                 <div class="col-6"><b class="text-primary">&bull;</b> Estimated interest returns: </div>
                                 <div class="col-6 text-right"><b class="text-primary"></b> {{ interest() | formatCoinPrice }} {{ coin.name | uppercase }}</div>
                              </ul>
                              <hr>
                              <div>
                                 <i>* Interests will be distributed to your USDT Wallet after the redemption is completed.</i>
                              </div>
                           </form>
                        </div>
                        <div class="modal-footer btn-list">
                           <button v-show="form.amount != 0 && !isError" type="button" class="btn btn-primary shadow-none" @click="lockAsset()">Confirm</button>
                           <button @click="form.amount = ''" type="button" class="btn btn-danger shadow-none" ref="close" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
   export default {
      props: {
         'coin': Object
      },

      data() {
         return {
            isError: false,
            form: {
               end_date: '',
               today: new Date(),
               amount: '',
               interest: 0.00
            },
            errMsg: ''
         }
      },

      methods: {
         async lockAsset() {
            await axios.post('/api/user/defi-mining/stake-coin', {
               amount: this.form.amount,
               duration: this.coin.period,
               interest: this.coin.percent,
               img: this.coin.img,
               start_date: this.form.today,
               end_date: this.form.end_date,
               coin: this.coin.name,
               coin_identifier: this.coin.identifier,
            }).then((res) => {
               if(res.status == 200) {
                  this.$refs.close.click()

                  this.$swal( {
                     'title': 'Success!',
                     'text': res.data.data.message, 
                     'icon': 'success',
                     'confirmButtonText': 'Close window',
                  })
               }
            }).catch((err) => {
               this.isError = true
               this.errMsg = err.response.error.message

               this.$swal( {
                  'title': 'Error!',
                  'text': err.response.error.message, 
                  'icon': 'error',
                  'confirmButtonText': 'Close window',
               })
            })
         },

         interest() {
            if(this.form.amount == '') {
               return this.form.interest
            } else {
               if(this.form.amount < this.coin.min_stake) {
                  this.isError = true
                  this.errMsg = 'Minimum staking is ' + this.coin.min_stake + ' ' + this.$options.filters.uppercase(this.coin.name)
               } else {
                  this.isError = false
                  this.errMsg = ''

                  this.form.amount = Number(this.form.amount)
                  this.coin.percent = Number(this.coin.percent)
                  this.coin.period = Number(this.coin.period)

                  var percentage = this.coin.percent / 100
                  var daily_roi = percentage / this.coin.period 
                  daily_roi = daily_roi * this.form.amount 
                  var result = daily_roi * this.coin.period
                  this.form.interest = result + this.form.amount
                  
                  return this.form.interest
               }
            }
         }
      },

      mounted() {
         this.form.end_date = new Date()

         this.form.end_date.setDate(this.form.end_date.getDate() + this.coin.period)
      }

      
   }
</script>

<style>
/* Chrome, Safari, Edge, Opera */
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
   }

   /* Firefox */
   input[type=number] {
      -moz-appearance: textfield;
   }
</style>