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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->enum('currency', ['&pound;', '&euro', '&dollar;'])->default('&dollar;');
            $table->double('min_deposit', 12, 2)->default(0);
            $table->string('btc')->nullable();
            $table->string('eth')->nullable();
            $table->string('usdt')->nullable();
            $table->string('usdt_network')->nullable();
            $table->string('busd')->nullable();
            $table->string('busd_network')->nullable();
            $table->string('ltc')->nullable();
            $table->string('xrp')->nullable();
            $table->string('xrp_tag')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
