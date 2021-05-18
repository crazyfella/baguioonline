<?php



use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;



class CreateUsersTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('name');

            $table->string('slug_user');

            $table->string('email')->unique();

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            $table->string('address')->nullable();

            $table->string('contact')->nullable();

            $table->string('photo_user')->default('profile.png');

            $table->string('cover_user')->default('no-image.jpg');

            $table->integer('subscription')->default(1);

            $table->string('shop_name');

            $table->string('slug_shop');

            $table->string('facebook')->nullable();

            $table->string('instagram')->nullable();

            $table->string('website')->nullable();

            $table->integer('status')->default(0);

            $table->datetime('last_login_at')->nullable();

            $table->rememberToken();

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

        Schema::dropIfExists('users');

    }

}

