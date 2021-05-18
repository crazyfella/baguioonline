<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    for($i = 0; $i < 5; $i++) {
        App\User::create([
            
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->password,
            'address' => $faker->address, 
            'contact' => $faker->phoneNumber, 
            'photo_user'=> $faker->imageUrl($width = 640, $height = 480) ,
            'subscription'=> $faker->randomDigitNot(5,6,7,8,9) , 
            'shop_name'=> $faker->company,
            'slug_shop'=> $faker->slug,
            'facebook'=> $faker->url, 
            'instagram'=> $faker->url, 
            'website'=> $faker->url,
            'slug_user' => $faker->slug,
        ]);
    }
    }
}
