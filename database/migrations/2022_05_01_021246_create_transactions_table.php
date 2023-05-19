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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['deposit', 'withdrawal'])->nullable();
            $table->double('amount_usd', 12, 2)->default(0);
            $table->string('coin_amount')->default(0);
            $table->string('payment_mode')->nullable();
            $table->string('address')->nullable();
            $table->string('network')->nullable();
            $table->enum('status', ['pending', 'approved', 'processing', 'declined'])->default('pending');
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
        Schema::dropIfExists('transactions');
    }
};
