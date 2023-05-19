<template>
  <div>
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card shadow-none border">
          <div class="card-body">
            <div class="card-widget">
              <h6 class="mb-2">Total Equity</h6>
              <h2 class="text-end">
                <i class="mdi mdi-cube icon-size float-start text-success text-success-shadow"></i>
                <span v-html="dashboard.user[0].account.currency"></span>{{ portfolio.total_equity | formatPrice }}
              </h2>
            </div>
          </div>
        </div>
      </div>
      <!-- COL END -->
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card shadow-none border">
          <div class="card-body">
            <div class="card-widget">
              <h6 class="mb-2">Total Profit</h6>
              <h2 class="text-end">
                <i class="icon-size mdi mdi-poll-box float-start text-warning text-warning-shadow"></i>
                <span v-html="dashboard.user[0].account.currency"></span>{{ portfolio.total_profit | formatPrice }}
              </h2>
            </div>
          </div>
        </div>
      </div>
      <!-- COL END -->
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
        <div class="card shadow-none border">
          <div class="card-body">
            <div class="card-widget">
              <h6 class="mb-2">Completed Investment</h6>
              <h2 class="text-end">
                <i class="fa fa-bar-chart icon-size float-start text-danger text-danger-shadow"></i>
                <span v-html="dashboard.user[0].account.currency"></span>{{ portfolio.total_completed | formatPrice }}
              </h2>
            </div>
          </div>
        </div>
      </div>
      <!-- COL END -->
    </div>
    <!-- ROW-5 -->
    <div class="row mt-5">
      <div class="col-12 col-sm-12">
        <div class="card shadow-none border">
          <div class="card-header">
            <h3 class="card-title mb-0">Active Orders</h3>
            <div class="card-options" v-if="portfolios.length > 0">
              <a href="/account/pricing" class="btn btn-md btn-primary">
                Create Investment
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="grid-margin">
              <div class="">
                <div class="table-responsive" v-if="portfolios.length > 0">
                  <table class="table card-table border table-vcenter text-nowrap align-items-center">
                    <thead class="">
                      <tr>
                        <th>Reference Code (#)</th>
                        <th>
                          Equity (<span v-html="dashboard.user[0].account.currency"></span>)
                        </th>
                        <th>
                          Profit (<span v-html="dashboard.user[0].account.currency"></span>)
                        </th>
                        <th>Status</th>
                        <th>Order date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody v-for="o in portfolios" :key="o.id">
                      <tr>
                        <td class="text-sm fs-6 font-weight-600">{{ o.id | str_pad}}</td>
                        <td class="fs-6"><span v-html="dashboard.user[0].account.currency"></span>{{ o.amount_usd |
                          formatPrice }}</td>
                        <td class="fs-6"><span v-html="dashboard.user[0].account.currency"></span>{{ o.earning |
                          formatPrice }}</td>
                        <td class="fs-6">
                          <template v-if="o.status == 'approved'">
                            <i class="fa fa-check me-1 text-success"></i> Active
                          </template>
                          <template v-else-if="o.status == 'completed'">
                            <i class="fa fa-check me-1 text-info"></i> Completed
                          </template>
                        </td>
                        <td class="fs-6">{{ o.created_at | formatDate }}</td>
                        <td class="fs-6">
                          <button v-if="today == 'Tuesday' || today == 'Thursday' && o.earning > 10" data-bs-toggle="modal" :data-bs-target="'#withdraw' + o.id"
                            class="btn btn-sm btn-primary shadow-none">Withdraw</button>
                          <button v-else disabled class="btn btn-sm btn-primary shadow-none">Withdraw</button>
                          <button v-if="o.status == 'completed'"  @click="reInvest(o.id)"
                            class="btn btn-sm btn-success shadow-none">Re-Invest</button>
                          <button v-else disabled class="btn btn-sm btn-success shadow-none">Re-Invest</button>

                          <div class="modal fade" ref="modal" :id="'withdraw' + o.id" tabindex="-1" role="dialog" data-bs-backdrop="static"
                            data-bs-keyboard="false" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-body" style=" text-align: left !important; padding-top: 0 !important; padding-bottom: 0 !important">
                                  <div>
                                    <div v-for="p in plans" :key="p.id">
                                      <div class="modal-header px-0 border-0">
                                        <h3 class="modal-title">
                                          Withdraw Profit
                                        </h3>
                                      </div>
                                      <div class="mb-4">
                                        <div class="fs-6 mb-1">Plan ID:</div>
                                        <div class="py-1 px-4 text-primary fs-6">
                                          <p>#{{ o.id | str_pad }}</p>
                                        </div>
                                      </div>
                                      <div class="mb-4">
                                        <div class="fs-6 mb-1">Invested Amount</div>
                                        <div class="py-1 px-4 text-primary fs-6">
                                          <p><span v-html="dashboard.user[0].account.currency"></span>{{ o.amount_usd | formatPrice }}</p>
                                        </div>
                                      </div>
                                      <div class="mb-4">
                                        <div class="fs-6 mb-1">Withdrawable Profit:</div>
                                        <div class="py-1 px-4 text-primary fs-6">
                                          <p><span v-html="dashboard.user[0].account.currency"></span>{{ o.earning | formatPrice }}</p>
                                        </div>
                                      </div>
                                      <div class="mb-3">
                                        <label for="recipient-name" class="form-control-label">Amount to withdraw (USD):</label>
                                        <input type="number" :min="o.earning" class="form-control form-control-lg"
                                          v-model="form.withdraw_amount" inputmode="numeric" />
                                      </div>
                                      <div class="text-danger text-wrap mb-3" v-show="isError">* {{ errMsg }} </div>
                                      <div class="mb-3">
                                        <label for="message-text" class="form-control-label">Withdraw to</label>
                                        <select class="form-control form-control-lg" v-model="form.wallet">
                                          <option value="wallet">Spot Wallet Account</option>
                                          <option value="btc">BTC Wallet Address</option>
                                          <option value="usdt">USDT Wallet Address (TRC20)</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer btn-list">
                                  <button v-if="form.withdraw_amount != ''" @click="withdraw(o)" type="button" class="btn btn-primary shadow-none">
                                    Confirm Withdrawal
                                  </button>
                                  <button type="button" class="btn btn-danger shadow-none" :ref="'close' + o.id" @click="closeF()"
                                    data-bs-dismiss="modal">
                                    Close
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-center p-5" v-else>
                  <h4 class="text-muted">No active investment recorded yet</h4>
                  <div class="my-4">
                    <a href="/account/pricing" class="btn btn-md btn-primary">
                      Create Investment
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- COL END -->
    </div>
    <!-- ROW-5 END -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      portfolio: [],
      dashboard: [],
      plans: {},
      portfolios: {},
      isError: false,
      errMsg: '',
    };
  },

  methods: {
    async getDashboardData() {
      await axios.get("/api/dashboard").then((response) => {
        this.dashboard = response.data.data;
        this.coinPrice = {
          bitcoin: this.dashboard.bitcoin_price,
          busd: this.dashboard.busd_price,
          usdt: this.dashboard.usdt_price,
        };
        this.btc_to_usd =
          this.dashboard.user[0].account.btc_balance * this.dashboard.bitcoin_price;
        this.usdt_to_usd =
          this.dashboard.user[0].account.usdt_balance * this.dashboard.usdt_price;
        this.busd_to_usd =
          this.dashboard.user[0].account.busd_balance * this.dashboard.busd_price;
      });
    },

    async getPortfolioData() {
      await axios
        .get("/api/user/portfolios/all")
        .then((res) => {
          this.portfolio = res.data.data;
          this.portfolios = this.portfolio.portfolios.data
        })
        .catch((err) => {
          
        });
    },

    async getPlans() {
      await axios.get('/api/company/plans').then((res) => {
        this.plans =  res.data.data
      }).catch((err) => {

      })
    },

    async getCompanyInfo() {
      await axios.get("/api/company-info").then((response) => {
        this.company = response.data.data
      })
    },

    async withdraw(order) {
      if(this.form.withdraw_amount > order.earning) {
        this.isError = true
        this.errMsg = "You can't withdraw an amount greater than your accumulated profit"
      } else if(this.form.withdraw_amount < 10) {
        this.isError = true
        this.errMsg = "Minimum withdrawal is $10"
      } else {
        this.isError = false
        this.errMsg = ''
        const data = {
          investment_id: order.id,
          amount: this.form.withdraw_amount,
          wallet: this.form.wallet
        }
        await axios.post('/api/user/investment/withdraw', data).then((res) => {
          
          if(res.data.data.success == false) {
            this.$swal( {
              'title': 'Error!',
              'text': res.data.data.message, 
              'icon': 'error',
              'confirmButtonText': 'Close window',
            })
          } else {
            this.form.withdraw_amount = ''
            this.$swal( {
              'title': 'Success!',
              'text': res.data.data.message, 
              'icon': 'success',
              'confirmButtonText': 'Close window',
            }).then(() => {
              this.form.withdraw_amount = ''
            })

            this.getPortfolioData()
          }
        }).catch((err) => {
          this.$swal( {
            'title': 'Error!',
            'text': err.response.error.message,
            'icon': 'error',
            'confirmButtonText': 'Close window',
          })
        })
      }
    },

    async reInvest(id) {
      const data = {
        transaction_id: id
      }

      await axios.post('/api/user/investment/re-invest', data).then((res) => {
        this.$swal( {
          'title': 'Success!',
          'text': res.data.data.message, 
          'icon': 'success',
          'confirmButtonText': 'Close window',
        })

        this.getPortfolioData()
      }).catch((err) => {
        this.$swal( {
          'title': 'Error!',
          'text': err.response.error.message,
          'icon': 'error',
          'confirmButtonText': 'Close window',
        })
      })
    },

    closeF() {
      this.form = {}
    }
  },

  mounted() {
    this.getDashboardData()
    this.getPortfolioData()
    this.getPlans()
    this.getCompanyInfo();

    const date = new Date()
    const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
    this.today = weekday[date.getDay()]
  },
};
</script>
