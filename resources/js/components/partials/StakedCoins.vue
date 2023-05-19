<template>
   <tr>
      <td class="fs-6">
         <span class="avatar brround cover-image" :data-image-src="`/assets/auth/images/icons/crypto/color/${ coin.img }`"
         :style="`background: url(/assets/auth/images/icons/crypto/color/${ coin.img }) center center`">
            <span class="avatar-status" :class="coin.status == 'active' ? 'bg-green' : coin.status == 'completed' ? 'bg-blue' : 'bg-yellow'"></span>
         </span>
      </td>
      <td class="fs-6">{{ coin.staked_value | formatCoinPrice }} {{ coin.coin_name | uppercase }}</td>
      <td class="fs-6">{{ coin.profit | formatCoinPrice }} {{ coin.coin_name | uppercase }}</td>
      <td class="text-success fs-6">{{ coin.percentage }}%</td>
      <td class="fs-6">{{ coin.start_date | formatDate }}</td>
      <td class="fs-6">{{ coin.end_date | formatDate }}</td>
      <td class="fs-6">
         <div class="btn-list">
            <button type="button" v-if="coin.status == 'completed'" data-bs-toggle="modal" :data-bs-target="'#w_'+coin.id" class="shadow-none btn btn-md btn-primary btn-sm">Withdaraw</button>
            <button type="button" v-if="coin.status != 'completed'" data-bs-toggle="modal" :data-bs-target="'#t_'+coin.id" class="shadow-none btn btn-md btn-danger btn-sm">Terminate</button>
         </div>
         <div class="modal fade" ref="modal" :id="'w_'+coin.id" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header border-0">
                     <h3 class="number-font mb-3"><span class="modal-title">Withdraw Staked Coin</span> | {{ coin.coin_name | uppercase }}</h3>
                  </div>
                  <div class="modal-body" style="text-align: left !important; padding-top: 0 !important; padding-bottom: 0 !important">
                     <form>
                        <div class="row">
                           <div class="col-4 mb-5">
                              <label for="recipient-name" class="form-control-label">Duration:</label>
                              <div><button class="btn btn-outline-warning shadow-none">&bull; {{ coin.duration }} Days</button></div>
                           </div>
                           <div class="col-8 mb-5">
                              <label for="recipient-name" class="form-control-label">Annualized Interest Rate (AIR):</label>
                              <div><button class="btn btn-outline-warning shadow-none">&bull; {{ coin.percentage }}% ROI</button></div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="message-text" class="form-control-label">Staked Amount:</label>
                           <div class="border border-primary p-3 px-4 rounded-1">
                              <p>{{ coin.staked_value | formatCoinPrice }} {{ coin.coin_name | uppercase }}</p>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="message-text" class="form-control-label">Profit:</label>
                           <div class="border border-primary p-3 px-4 rounded-1">
                              <p>{{ coin.staked_value + coin.profit | formatCoinPrice }} {{ coin.coin_name | uppercase }}</p>
                           </div>
                        </div>
                        <ul class="row my-4">
                           <div class="col-6"><b class="text-primary">&bull;</b> Staked Date: </div>
                           <div class="col-6 text-right"><b class="text-primary"></b> {{ coin.start_date | formatDate }}</div>
                           <div class="col-6"><b class="text-primary">&bull;</b> Redemption Date: </div>
                           <div class="col-6 text-right"><b class="text-primary"></b> {{ coin.end_date | formatDate }}</div>
                           <div class="col-6"><b class="text-primary">&bull;</b> Fee: </div>
                           <div class="col-6 text-right"><b class="text-primary"></b> 0.00 {{ coin.coin_name | uppercase }}</div>
                           <div class="col-6"><b class="text-primary">&bull;</b> Status: </div>
                           <div class="col-6 text-right"><button class="btn btn-success btn-sm shadow-none">&bull; {{ coin.status | capitalize }}</button></div>
                        </ul>
                     </form>
                  </div>
                  <div class="modal-footer btn-list">
                     <button type="button" class="btn btn-primary shadow-none" @click="withdraw(coin.id)">Confirm</button>
                     <button type="button" class="btn btn-danger shadow-none" ref="close" data-bs-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" ref="modal" :id="'t_'+coin.id" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header border-0">
                     <h3 class="number-font mb-3"><span class="modal-title">Terminate Staked Coin</span> | {{ coin.coin_name | uppercase }}</h3>
                  </div>
                  <div class="modal-body" style="text-align: left !important; padding-top: 0 !important; padding-bottom: 0 !important">
                     
                     <div class="row">
                        <div class="col-12 mb-5">
                           <div class="fs-6 p-3 text-wrap border rounded-3"><strong>&bull;</strong> Terminating an active staking will attract a fee of 2.5% from the coin/token.</div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer btn-list">
                     <button type="button" class="btn btn-primary shadow-none" @click="terminateCoin(coin.id)">Continue</button>
                     <button type="button" class="btn btn-danger shadow-none" ref="close" data-bs-dismiss="modal">Cancel</button>
                  </div>
               </div>
            </div>
         </div>
      </td>
   </tr>
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
         async terminateCoin(id) {
            await axios.post('/api/user/defi-mining/staking/terminate', { id: id}).then((res) => {
               this.$refs.close.click()

               this.$swal( {
                  'title': 'Success!',
                  'text': res.data.data.message, 
                  'icon': 'success',
                  'confirmButtonText': 'Close window',
               })

               this.$parent.getStakings()
            }).catch((err) => {
               this.$swal( {
                  'title': 'Error!',
                  'text': err.response.error.message, 
                  'icon': 'error',
                  'confirmButtonText': 'Close window',
               })
            })
         },

         async withdraw(id) {
            await axios.post('/api/user/defi-mining/staking/withdraw', { id: id }).then((res) => {
               this.$refs.close.click()

               this.$swal( {
                  'title': 'Success!',
                  'text': res.data.data.message, 
                  'icon': 'success',
                  'confirmButtonText': 'Close window',
               })

               this.$parent.getStakings()
            }).catch((err) => {
               this.$swal( {
                  'title': 'Error!',
                  'text': err.response.error.message, 
                  'icon': 'error',
                  'confirmButtonText': 'Close window',
               })
            }).finally(() => {
               window.location.href = '/account/defi-mining'
            })
         }
      },

      mounted() {
         
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