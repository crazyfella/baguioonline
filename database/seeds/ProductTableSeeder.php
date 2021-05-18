<?php



use Illuminate\Database\Seeder;



class ProductTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $faker = Faker\Factory::create();



        for($i = 0; $i < 10; $i++) {

            App\Product::create([

                'userId' => $faker->randomDigit,

                'productName' => $faker->catchPhrase,

                'productBrand' => $faker->company,

                'productPrice' => $faker->randomNumber(3),



                'productDescription' => $faker->text,

                'productColor' => $faker->safeColorName,

                'productSize' => $faker->randomDigit,

                'photo' =>  $faker->imageUrl($width = 640, $height = 480),

                'productSlug' => $faker->slug,

                'view' => $faker->randomDigit

            ]);

        }



        for($i = 0; $i < 10; $i++) {

            App\Product_category::create([

                'product_id' => $faker->randomDigit,

                'product_id' => $faker->randomDigit,

            ]);

        }



        

    }

}

