<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('category');
            $table->string('category_slug');
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['category_id' => 1, 'category' => 'Electronic Devices',        'category_slug' => 'electronic-devices'], //1
            ['category_id' => 2, 'category' => 'TV & Home Appliances',      'category_slug' => 'tv-home-appliances'], //2
            ['category_id' => 3, 'category' => 'Health & Beauty',           'category_slug' => 'health-beauty'], //3
            ['category_id' => 4, 'category' => 'Babies & Toys',             'category_slug' => 'babies-toys'], //4
            ['category_id' => 5, 'category' => 'Foods & Pets',              'category_slug' => 'foods-pets'], //5
            ['category_id' => 6, 'category' => 'Home and Living',           'category_slug' => 'home-living'], //6
            ['category_id' => 7, 'category' => "Fashions",                  'category_slug' => 'fashions'], //7
            ['category_id' => 8, 'category' => 'Sports & Lifestyle',        'category_slug' => 'sports-lifestyle'], //8
            ['category_id' => 9, 'category' => 'Automative & Motorcycles',  'category_slug' => 'automative-motorcycles'], //9
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
