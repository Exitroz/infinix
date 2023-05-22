<template>
   <div>
      <div class="row mt-5">
         <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card bg-secondary img-card box-secondary-shadow">
               <div class="card-body">
                  <div class="d-flex">
                     <div class="text-white">
                        <h2 class="mb-0 number-font"><span v-html="dashboard.user[0].account.currency"></span>{{dashboard.user[0].account.balance | formatPrice }}</h2>
                        <p class="text-white mb-0">Account Balance </p>
                     </div>
                     <div class="ms-auto"> <i class="fe fe-dollar text-white fs-30 me-2 mt-2"></i> </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8">
            <div class="card shadow-none border">
               <div class="card-body">
                  <div class="grid-margin">
                     <div class="">
                        <h5 class="fs-5 fw-bold">Fund Wallet</h5>
                        <div class="py-2">
                           <div class="row gutters-xs">
                              <div class="col-md-4 cursor-pointer">
                                 <deposit-coin coin="btc" name="Bitcoin" img="/assets/auth/images/icons/crypto/color/btc.svg" :prices="coinPrice"></deposit-coin>
                              </div>
                              <div class="col-md-4 cursor-pointer">
                                 <deposit-coin coin="eth" name="Ethereum" img="/assets/auth/images/icons/crypto/color/eth.svg" :prices="coinPrice"></deposit-coin>
                              </div>
                              <div class="col-md-4 cursor-pointer">
                                 <deposit-coin coin="usdt" name="Tether USD" img="/assets/auth/images/icons/crypto/color/usdt.svg" :prices="coinPrice"></deposit-coin>
                              </div>
                              <div class="col-md-4 cursor-pointer">
                                 <deposit-coin coin="alt_coin" name="alt_coin" img="/assets/auth/images/icons/crypto/color/usdt.svg" :prices="coinPrice"></deposit-coin>
                              </div>
                              <div class="col-md-4 cursor-pointer">
                                 <deposit-coin coin="bank" name="bank" img="/assets/auth/images/icons/crypto/color/usdt.svg" :prices="coinPrice"></deposit-coin>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div><!-- COL END -->
      </div>
      <div class="row my-5">
         <div class="col-sm-6 col-xl-4 secondary" v-for="(plan, index) in plans" :key="index">
            <div class="princing-item mb-4">
               <div class="pricing-divider text-center">
                  <h3 class="text-light">{{ plan.name }} Plan</h3>
                  <h4 class="my-0 display-2 text-light font-weight-normal mb-3">{{ plan.interest }} <span
                        class="h5">&percnt;</span></h4>
                  <svg class="pricing-divider-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1"
                     preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px"
                     xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                     y="0px">
                     <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                        c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6">
                     </path>
                     <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                        c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6">
                     </path>
                     <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                        H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                     <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                     c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z"
                        fill="#FFFFFF"></path>
                  </svg>
               </div>
               <div class=" br-br-0 br-bl-0 bg-white mt-0 shadow text-center">
                  <ul class="list-group list-group-flush text-center">
                     <li class="list-group-item"><b>Min. Deposit</b> &dollar;{{ plan.min_amount | formatPrice }}</li>
                     <li class="list-group-item"><b>Max. Deposit</b> &dollar;{{ plan.max_amount | formatPrice }}</li>
                     <li class="list-group-item"><b>Contract Duration </b>{{ plan.duration }} Days</li>
                     <li class="list-group-item"><b> 24/7</b> support</li>
                     <li class="list-group-item border-bottom-0"><b>Instant Withdrawal</b></li>
                  </ul>
                  <div class="card-footer">
                     <button data-bs-toggle="modal" :data-bs-target="`#buy_${plan.id}`" class="btn fw-bold btn-block btn-radius btn-primary">
                        Buy Plan
                     </button>
                  </div>
               </div>
            </div>
            <div class="modal fade" ref="modal" :id="`buy_${plan.id}`" tabindex="-1" role="dialog" data-bs-backdrop="static"
               data-bs-keyboard="false" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div v-if="step == 2" class="modal-header border-0">
                        <h3 class="modal-title" id="example-Modal3">
                           Create Investment
                        </h3>
                     </div>
                     <div class="modal-body"
                        style="text-align: left !important; padding-top: 0 !important; padding-bottom: 0 !important">
                        <div v-if="step == 1">
                           <div class="modal-header px-0 border-0">
                              <h3 class="modal-title">
                                 Purchase Plan | {{ plan.name | capitalize }} Plan
                              </h3>
                           </div>
                           <div class="text-center pb-3">
                              <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop"
                                 colors="primary:#121331,secondary:#ffa800" style="width:150px;height:150px">
                              </lord-icon>
                           </div>
                           <div class="mb-4">
                              <div class="fs-6 mb-1">Minimum Deposit:</div>
                              <div class="bg-light border p-3 px-4 rounded-1 fs-6">
                                 <p><span v-html="dashboard.user[0].account.currency"></span>{{ plan.min_amount |
                                       formatPrice
                                 }}
                                 </p>
                              </div>
                           </div>
                           <div class="mb-4">
                              <div class="fs-6 mb-1">{{ plan.cycle | capitalize }} Return On Investment:</div>
                              <div class="bg-light border p-3 px-4 rounded-1 fs-6">
                                 <p>{{ plan.interest }}%</p>
                              </div>
                           </div>
                           <div class="mb-4">
                              <div class="fs-6 mb-1">Duration:</div>
                              <div class="bg-light border p-3 px-4 rounded-1 fs-6">
                                 <p>{{ plan.duration | capitalize }} Days</p>
                              </div>
                           </div>
                           {{ plan.description }}

                           {{ selectedPlan(plan.id) }}
                        </div>
                        <div v-if="step == 2">
                           <form>
                              <div class="mb-3">
                                 <label for="recipient-name" class="form-control-label">Amount (USD):</label>
                                 <input type="number" :min="plan.min_amount" class="form-control form-control-lg"
                                    v-model="form.amount" inputmode="numeric" />
                              </div>
                              <div class="mb-3">
                                 <label for="message-text" class="form-control-label">Deposit Wallet</label>
                                 <select class="form-control form-control-lg" v-model="form.wallet" readonly>
                                    <option value="wallet">Account Balance (<span
                                          v-html="dashboard.user[0].account.currency"></span>{{
                                                dashboard.user[0].account.balance | formatPrice
                                          }})
                                    </option>
                                 </select>
                              </div>
                              <div class="text-danger text-wrap mb-3" v-show="isError">* {{ errMsg }} </div>
                           </form>
                        </div>
                     </div>
                     <div class="modal-footer btn-list">
                        <button v-if="step == 1" @click="step = 2; form.plan = plan.id" type="button"
                           class="btn btn-primary shadow-none">
                           Next
                        </button>
                        <button v-else @click="invest(plan)" type="button" class="btn btn-primary shadow-none">
                           Confirm Purchase
                        </button>
                        <button v-if="step == 2" @click="step = 1; form.plan = plan.id" type="button"
                           class="btn btn-light shadow-none">
                           Back
                        </button>
                        <button @click="step = 1; close()" type="button" class="btn btn-danger shadow-none" ref="close"
                           data-bs-dismiss="modal">
                           Close
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>


<script>
import DepositCoin from './partials/Deposit.vue'

export default {

   components: {
      DepositCoin
   },

   data() {
      return {
         plans: [],
         form: {
            wallet: 'wallet',
            withdraw_amount: '',
            amount: ''
         },
         dashboard: [],
         company: [],
         step: 1,
         today: null,
         isError: false,
         errMsg: '',
         coinPrice: '',
      }
   },

   methods: {
      async getDashboardData() {
         await axios.get("/api/dashboard").then((response) => {
            this.dashboard = response.data.data;
            this.coinPrice = {
               bitcoin: this.dashboard.bitcoin_price,
               busd: this.dashboard.busd_price,
               usdt: this.dashboard.usdt_price,
               eth: this.dashboard.eth_price,
            }
         })
      },
      
      async getPlans() {
         await axios.get('/api/user/company/plans').then((res) => {
            this.plans = res.data.data.plans
         }).catch((err) => {

         })
      },

      selectedPlan(plan) {
         this.form.plan = plan
      },

      async invest(plan) {
         const data = {
         amount: this.form.amount,
         wallet: this.form.wallet,
         plan: this.form.plan
         }
         if(this.form.amount < plan.min_amount) {
         this.isError = true
         this.errMsg = 'Minimum investment amount of ' + plan.min_amount + ' USD is required'
         } else {
         await axios.post('/api/user/investment/create', data).then((res) => {
            this.form.amount = ''

            if(res.data.data.success == false) {
               this.$swal( {
               'title': 'Error!',
               'text': res.data.data.message, 
               'icon': 'error',
               'confirmButtonText': 'Close window',
               }) 
            } else {
               this.$swal( {
               'title': 'Success!',
               'text': res.data.data.message, 
               'icon': 'success',
               'confirmButtonText': 'Close window',
               })

               this.getDashboardData()

               this.$refs.close.click()
            }        
         }).catch((err) => {
            console.log(err)
            this.$swal( {
               'title': 'Error!',
               'text': err.response.error.message, 
               'icon': 'error',
               'confirmButtonText': 'Close window',
            })
         })
         }
      },

      close() {
         this.form = {
            wallet: 'wallet',
            withdraw_amount: '',
            amount: ''
         },
         this.isError = false,
         this.errMsg = '',
         this.$refs.close.click()
      }
   },

   mounted() {
      this.getDashboardData()
      this.getPlans()
   }
}
</script>


<style>
.cursor-pointer {
   cursor: pointer;
}
</style>