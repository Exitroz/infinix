<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class TestController extends Controller
{
    protected function runTest() {
        $data = [
            'name' => "Me"
        ];

        Mail::to('tonysmart.ct@gmail.com')->send(new TestMail($data));
    }
}
