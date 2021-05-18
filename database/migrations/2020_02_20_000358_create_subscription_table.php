<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subscription');
            $table->integer('limit');
            $table->integer('payment');
            $table->timestamps();
        });

        DB::table('subscriptions')->insert([
            ['subscription' => 'free',     'limit' => '0',  'payment' => '0'],
            ['subscription' => 'basic',    'limit' => '5',  'payment' => '360'],
            ['subscription' => 'standard', 'limit' => '15', 'payment' => '480'],
            ['subscription' => 'premium',  'limit' => '25', 'payment' => '560'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription');
    }
}
