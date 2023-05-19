<template>
  <div>
    <template v-if="isError">
      <div class="text-center my-5 py-5 text-muted col-12">
        <div class="my-5 py-5">
          <div class="fs-2">
            <img src="/assets/auth/images/lottie/lottie-error.gif" width="100" height="100" />
          </div>
          <div class="mt-2 fs-6">Sorry! we couldn't handle the request right now, please try again.</div>
        </div>
    </div>
    </template>
    <template v-else>
      <!-- ROW-1 -->
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
              <div class="card shadow-none border">
                <div class="card-body text-center statistics-info">
                  <div class="counter-icon bg-yellow mb-0 box-primary-shadow">
                    <i class="fe fe-layers text-white"></i>
                  </div>
                  <h6 class="mt-4 mb-1">Account Balance</h6>
                  <h3 class="mb-2 number-font">
                    <span v-html="dashboard.user[0].account.currency"></span>{{ dashboard.user[0].account.balance | formatPrice }}
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
              <div class="card shadow-none border">
                <div class="card-body text-center statistics-info">
                  <div class="counter-icon bg-indigo mb-0 box-secondary-shadow">
                    <i class="fe fe-briefcase text-white"></i>
                  </div>
                  <h6 class="mt-4 mb-1">Total Invested Equity</h6>
                  <h3 class="mb-2 number-font">
                    <span v-html="dashboard.user[0].account.currency"></span>{{ dashboard.total_investments | formatPrice }}
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
              <div class="card shadow-none border">
                <div class="card-body text-center statistics-info">
                  <div class="counter-icon bg-success mb-0 box-success-shadow">
                    <i class="fe fe-dollar-sign text-white"></i>
                  </div>
                  <h6 class="mt-4 mb-1">Total Profits</h6>
                  <h3 class="mb-2 number-font">
                    <span v-html="dashboard.user[0].account.currency"></span>{{ dashboard.total_profits | formatPrice }}
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
              <div class="card shadow-none border">
                <div class="card-body text-center statistics-info">
                  <div class="counter-icon bg-gray mb-0 box-primary-shadow">
                    <i class="fe fe-layers text-white"></i>
                  </div>
                  <h6 class="mt-4 mb-1">Total Investments</h6>
                  <h3 class="mb-2 number-font">
                    {{ dashboard.investments.length }}
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
              <div class="card shadow-none border">
                <div class="card-body text-center statistics-info">
                  <div class="counter-icon bg-secondary mb-0 box-primary-shadow">
                    <i class="fe fe-users text-white"></i>
                  </div>
                  <h6 class="mt-4 mb-1">Referral Bonus</h6>
                  <h3 class="mb-2 number-font">
                    <span v-html="dashboard.user[0].account.currency"></span>{{ dashboard.referral_bonus | formatPrice }}
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
              <div class="card shadow-none border">
                <div class="card-body text-center statistics-info">
                  <div class="counter-icon bg-info mb-0 box-info-shadow">
                    <i class="fe fe-codepen text-white"></i>
                  </div>
                  <h6 class="mt-4 mb-1">Total Withdrawals</h6>
                  <h3 class="mb-2 number-font">
                    <span v-html="dashboard.user[0].account.currency"></span>{{ dashboard.total_withdrawals | formatPrice }}
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
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
      dashboard: [],
      coinPrice: '',
      btc_to_usd: 0.00,
      usdt_to_usd: 0.00,
      busd_to_usd: 0.00,
      isError: false,
      portfolios: {}
    }
  },

  methods: {
    async getDashboardData() {
      await axios.get("/api/dashboard").then((response) => {
        this.isError = false
        this.dashboard = response.data.data
        this.coinPrice = {
          bitcoin: this.dashboard.bitcoin_price,
          usdt: this.dashboard.usdt_price
        }
        this.btc_to_usd = this.dashboard.user[0].account.btc_balance * this.dashboard.bitcoin_price
        this.usdt_to_usd = this.dashboard.user[0].account.usdt_balance * this.dashboard.usdt_price

        this.portfolios = this.dashboard.active_investments.data
      }).catch((err) => {
        if(err.response.status == 500) {
          this.isError = true
        }
      })
    }
  },

  mounted() {
    this.getDashboardData()
  },
};
</script>
