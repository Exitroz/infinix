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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('btc')->nullable();
            $table->string('eth')->nullable();
            $table->string('usdt')->nullable();
            $table->string('usdt_network')->nullable();
            $table->string('busd')->nullable();
            $table->string('busd_network')->nullable();
            $table->string('ltc')->nullable();
            $table->string('xrp')->nullable();
            $table->string('xrp_tag')->nullable();
            $table->enum('auto_withdrawal', ['on','off'])->default('off');
            $table->string('default_address')->default('BTC');
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
        Schema::dropIfExists('wallets');
    }
};
