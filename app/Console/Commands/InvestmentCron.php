<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Investment;
use Illuminate\Support\Facades\DB;

class InvestmentCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investment:profits';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add profits for Investments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $investments = Investment::where('status', 'approved')->get();
        $this->info('Retrieving active investments...');

        DB::beginTransaction();
        if(count($investments) > 0 ) {
            $this->info('Active investments retrieved...');

            foreach ($investments as $investment) {
                if($investment->count_down == $investment->duration) {
                    $investment->update([
                        'status' => 'completed'
                    ]);
                } else {
                    $percentage = $investment->plan->interest / 100;
                    $returns = floatval($investment->amount_usd) * floatval($percentage);
                    $this->info('daily interest calculated...');

                    $investment->update([
                        'earning' =>  DB::raw('earning + ' . $returns),
                        'count_down' => DB::raw('count_down + 1'),
                    ]);

                    $this->info('Profit added...');
                }

                DB::commit();
            }

            $this->info('Profit top-up completed, exiting...');
        } else {
            $this->info('No active investments found, exiting...');
        }
    }
}
