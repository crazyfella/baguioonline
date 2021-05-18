<?php



use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;



class CreateProductsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('products', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->integer('userId');

            $table->string('productName');

            $table->string('productSlug')->unique();

            $table->string('productBrand')->nullable();

            $table->string('productPrice');

            $table->longText('productDescription')->nullable();

            $table->string('productColor')->nullable();

            $table->string('productSize')->nullable();

            $table->string('photo')->nullable();

            $table->integer('view')->default(0);

            $table->integer('status')->default(0);

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

        Schema::dropIfExists('products');

    }

}

