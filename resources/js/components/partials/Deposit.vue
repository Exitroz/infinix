<template>
   <div>
      <button type="button" data-bs-toggle="modal" @click="getCompanyInfo()" :data-bs-target="`#${coin}`" class="btn btn-link btn-sm shadow-none py-2 px-5">
         <div class="d-flex align-items-center pt-5 mt-auto" @click="getCompanyInfo()">
            <div class="avatar brround avatar-md me-3 cover-image" :data-image-src="img" :style="`background: url(&quot;${img}&quot;) center center;`"></div>
            <div class="fs-6 fw-bold">
               <span class="text-default">{{ name }}</span>
            </div>
         </div>
      </button>
      <div class="modal fade" ref="modal" :id="coin" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header border-0" :class="step != 1 ? 'pb-0' : ''">
                  <h3 class="modal-title" id="example-Modal3">Deposit {{ coin | uppercase }}</h3>
               </div>
               <div class="modal-body" style="text-align: left !important; padding-top: 0 !important; padding-bottom: 0 !important" v-if="step == 1">
                  <form>
                     <div class="mb-3">
                        <label for="recipient-name" class="form-control-label">Deposit Amount (USD):</label>
                        <input type="number" :min="company.min_deposit" class="form-control form-control-lg" v-model="amount" inputmode="numeric">
                     </div>
                     <div class="text-danger mb-3" v-show="isError">* {{ errMsg }} </div>
                     <div class="mb-3">
                        <label for="message-text" class="form-control-label">{{ coin | uppercase }} value:</label>
                        <input class="form-control form-control-lg" v-model="form.coin_value" readonly inputmode="numeric">
                     </div>
                     <div class="mb-3">
                        <i v-if="coin == 'usdt'"><strong class="text-danger">*</strong> We only support <b>{{ company.usdt_network | uppercase }}</b> Network for USDT Payments.</i>
                        <i v-if="coin == 'eth'"><strong class="text-danger">*</strong> We only support <b>ERC20</b> Network for ETH Payments.</i>
                        <!--i><strong class="text-danger">*</strong> We only support <b>TRC20</b> Network for USDT Payments.</i-->
                     </div>
                  </form>
               </div>
               <div class="modal-body" style="text-align: left !important" v-if="step == 2">
                  <div class="mx-auto block text-center">
                     <div class="mb-3">Scan the code on the withdrawal page of the trading platform APP or wallet APP</div>
                     <qrcode :background="qrBackground" :size="qrSize" :cls="qrCls" :value="qrText"></qrcode>
                  </div>
                  <div class="mt-3">
                     <div class="row gutters-xs">
                        <div class="col">
                           <input type="text" readonly class="form-control bg-white" :value="qrText">
                        </div>
                        <span class="col-auto">
                           <button class="btn btn-primary" type="button"><i class="fe fe-copy"></i></button>
                        </span>
                     </div>
                     <div v-if="coin == 'usdt'" class="mt-3 fs-6">Network: <b class="fs-5">{{ company.usdt_network | ucwords }}</b></div>
                     <div v-if="coin == 'eth'" class="mt-3 fs-6">Network: <b class="fs-5">ERC20</b></div>
                     <div class="fs-6" :class="coin == 'btc' ? 'mt-3' : ''">Coin Amount to Pay: <b class="fs-5">{{ form.coin_value }} {{ coin | uppercase }}</b></div>
                     <hr>
                     <ul class="mt-2">
                        <li>* Send only <b class="text-primary">{{ coin | uppercase }}</b> to this deposit address.</li>
                        <li v-if="coin == 'usdt'">* Ensure the network is <b class="text-primary">{{ company.usdt_network | uppercase }}</b> before sending</li>
                        <li v-if="coin == 'busd'">* Ensure the network is <b class="text-primary">{{ company.busd_network | uppercase }}</b> before sending</li>
                        <li v-if="coin == 'eth'">* Ensure the network is <b class="text-primary">ERC20</b> before sending</li>
                     </ul>
                  </div>
               </div>
               <div class="modal-footer btn-list">
                  <button v-if="step == 1" v-show="amount != 0 && !isError" type="button" class="btn btn-primary shadow-none" @click="step = 2">Confirm</button>
                  <button v-if="step == 2" type="button" class="btn btn-primary shadow-none" @click="confirmDeposit()">I have made a payment</button>
                  <button v-if="step == 2" type="button" @click="step = 1" class="btn btn-default shadow-none">Back</button>
                  <button type="button" @click="step = 1; amount = ''; form.coin_value = 0.00" class="btn btn-danger shadow-none" ref="close" data-bs-dismiss="modal">Close</button>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
import Qrcode from 'v-qrcode/src/index'

export default {
   name: "DepositCoin",

   props: {
      'coin': String,
      'name': String,
      'img': String,
      'prices': Object
   },

   components: {
      Qrcode
   },

   data() {
      return {
         amount: '',
         form: {
            coin_value: 0.00
         },
         step: 1,
         qrCls: 'qrcode',
         qrText: '',
         qrSize: 250,
         qrBackground: '#FFFFFF',
         company: '',
         isError: false,
         errMsg: ''
      }
   },
   watch: {
      amount: function() {
         if( this.amount != '') {
            if(this.amount < this.company.min_deposit) {
               this.isError = true
               this.errMsg = 'Minimum deposit amount of ' + this.company.min_deposit + ' USD is required'
            } else {
               this.isError = false
               this.errMsg = ''

               if(this.coin == 'btc') {
                  this.form.coin_value = this.amount / this.prices.bitcoin
                  this.form.coin_value = (this.form.coin_value / 1).toFixed(8).replace(',', '.')
               } else if(this.coin == 'usdt') {
                  this.form.coin_value = this.amount / this.prices.usdt
                  this.form.coin_value = (this.form.coin_value / 1).toFixed(2).replace(',', '.')
               } else if(this.coin == 'busd') {
                  this.form.coin_value = this.amount / this.prices.busd
                  this.form.coin_value = (this.form.coin_value / 1).toFixed(2).replace(',', '.')
               } else if(this.coin == 'eth') {
                  this.form.coin_value = this.amount / this.prices.eth
                  this.form.coin_value = (this.form.coin_value / 1).toFixed(8).replace(',', '.')
               }
            }
         }
      }
   },

   methods: {
      async getCompanyInfo() {
         await axios.get("/api/company-info").then((response) => {
            this.company = response.data.data
            if(this.coin == 'btc') {
               this.qrText = this.company.btc
            } else if(this.coin == 'usdt') {
               this.qrText = this.company.usdt
            } else if(this.coin == 'busd') {
               this.qrText = this.company.busd
            }
         })
      },

      async confirmDeposit() {
         const data = {
            amount: this.amount,
            coin_value: this.form.coin_value,
            coin: this.coin
         }

         await axios.post('/api/user/transaction/deposit', data).then((response) => {

            this.$refs.close.click()

            this.$swal( {
               'title': 'Request Sent!',
               'text': response.data.data.message, 
               'icon': 'success',
               'confirmButtonText': 'Close window',
            })
         })
      }
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