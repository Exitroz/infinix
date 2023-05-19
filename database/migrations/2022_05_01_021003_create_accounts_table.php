<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->double('balance', 12, 2)->default(0);
            $table->string('currency');
            $table->date('date_of_birth')->nullable();
            $table->string('transaction_pin')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->enum('status', ['unverified', 'verified', 'suspended'])->default('unverified');
            $table->enum('send_w_otp', ['yes', 'no'])->default('yes');
            $table->enum('send_p_email', ['yes', 'no'])->default('yes');
            $table->enum('send_i_exp_email', ['yes', 'no'])->default('yes');
            $table->string('referral_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
