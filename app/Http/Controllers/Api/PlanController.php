<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Http\Resources\PlanResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    protected function listPlans() {
        $plans = Plan::where('status', 'on')->get();

        $data = [
            'success' => true,
            'plans' => $plans
        ];
        
        return new PlanResource($data); 
    }
}
