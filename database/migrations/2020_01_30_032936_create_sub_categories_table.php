<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('sub_category');
            $table->string('sub_category_slug')->unique();
            $table->integer('status');
            $table->timestamps();
        });

        DB::table('sub_categories')->insert([
            ['sub_category' => 'Mobiles', 'category_id' => 1,                   'status' => 1, 'sub_category_slug' => 'moblies'],
            ['sub_category' => 'Tablets', 'category_id' => 1,                   'status' => 1, 'sub_category_slug' => 'tablets'],
            ['sub_category' => 'Laptops', 'category_id' => 1,                   'status' => 1, 'sub_category_slug' => 'laptops'],
            ['sub_category' => 'Desktops', 'category_id' => 1,                  'status' => 1, 'sub_category_slug' => 'desktops'],
            ['sub_category' => 'Security Cameras', 'category_id' => 1,          'status' => 1, 'sub_category_slug' => 'securit-cameras'],
            ['sub_category' => 'Action/Video Cameras', 'category_id' => 1,      'status' => 1, 'sub_category_slug' => 'video-cameras'],
            ['sub_category' => 'Digital Cameras', 'category_id' => 1,           'status' => 1, 'sub_category_slug' => 'digital-cameras'],
            ['sub_category' => 'Gaming Consoles', 'category_id' => 1,           'status' => 1, 'sub_category_slug' => 'gaming-consoles'],
            ['sub_category' => 'Gadgets', 'category_id' => 1,                   'status' => 1, 'sub_category_slug' => 'gadgets'],
            ['sub_category' => 'Electoronic Accessories', 'category_id' => 1,   'status' => 1, 'sub_category_slug' => 'electronic-accessories'],
            ['sub_category' => 'TV & Video Devices', 'category_id' => 2,        'status' => 1, 'sub_category_slug' => 'tv-video-devices'],
            ['sub_category' => 'TV Accessories', 'category_id' => 2,            'status' => 1, 'sub_category_slug' => 'tv-accessories'],
            ['sub_category' => 'Home Audio', 'category_id' => 2,                'status' => 1, 'sub_category_slug' => 'home-audio'],
            ['sub_category' => 'Cooling & Air Treatment', 'category_id' => 2,   'status' => 1, 'sub_category_slug' => 'cooling-air-treatment'],
            ['sub_category' => 'Small Kitchen Appliances', 'category_id' => 2,  'status' => 1, 'sub_category_slug' => 'small-ktichen-appliances'],
            ['sub_category' => 'Vacuums & Floor Care', 'category_id' => 2,      'status' => 1, 'sub_category_slug' => 'vacuums'],
            ['sub_category' => 'Household Appliances', 'category_id' => 2,      'status' => 1, 'sub_category_slug' => 'household-appliances'],
            ['sub_category' => 'Personal Care Appliances', 'category_id' => 2,  'status' => 1, 'sub_category_slug' => 'personal-care-appliances'],
            ['sub_category' => 'Large Appliances', 'category_id' => 2,          'status' => 1, 'sub_category_slug' => 'large-appliances'],
            ['sub_category' => 'Parts & Accessories', 'category_id' => 2,       'status' => 1, 'sub_category_slug' => 'parts-accessories'],
            ['sub_category' => 'Make-Up', 'category_id' => 3,                   'status' => 1, 'sub_category_slug' => 'make-up'],
            ['sub_category' => 'Skin Care', 'category_id' => 3,                  'status' => 1, 'sub_category_slug' => 'skin-care'],
            ['sub_category' => 'Hair Care', 'category_id' => 3,                 'status' => 1, 'sub_category_slug' => 'hair-care'],
            ['sub_category' => 'Bath & Body', 'category_id' => 3,               'status' => 1, 'sub_category_slug' => 'bath-body'],
            ['sub_category' => 'Personal Care', 'category_id' => 3,             'status' => 1, 'sub_category_slug' => 'personal-care'],
            ['sub_category' => "Men's Care", 'category_id' => 3,                'status' => 1, 'sub_category_slug' => 'mens-care'],
            ['sub_category' => 'Fragrances', 'category_id' => 3,                'status' => 1, 'sub_category_slug' => 'fragrances'],
            ['sub_category' => 'Beauty Tools', 'category_id' => 3,              'status' => 1, 'sub_category_slug' => 'beauty-tools'],
            ['sub_category' => 'Food Supplements', 'category_id' => 3,          'status' => 1, 'sub_category_slug' => 'food-supplements'],
            ['sub_category' => 'Medical Supplies', 'category_id' => 3,          'status' => 1, 'sub_category_slug' => 'medical-supplies'],
            ['sub_category' => 'Adult Diapers & Incontinence', 'category_id' => 3, 'status' => 1, 'sub_category_slug' => 'adult-diapers'],
            ['sub_category' => 'Diapering & Pooty', 'category_id' => 4,         'status' => 1, 'sub_category_slug' => 'diapering-pooty'],
            ['sub_category' => 'Milk Formula & Baby Food', 'category_id' => 4,  'status' => 1, 'sub_category_slug' => 'milk-formula'],
            ['sub_category' => 'Baby Fashion & Accessories', 'category_id' => 4, 'status' => 1, 'sub_category_slug' => 'baby-fashion'],
            ['sub_category' => 'Feeding Essentials', 'category_id' => 4,        'status' => 1, 'sub_category_slug' => 'feeding-essentials'],
            ['sub_category' => 'Baby Gear', 'category_id' => 4,                 'status' => 1, 'sub_category_slug' => 'baby-gear'],
            ['sub_category' => 'Baby Personal Care', 'category_id' => 4,        'status' => 1, 'sub_category_slug' => 'baby-personal'],
            ['sub_category' => 'Toys & Games', 'category_id' => 4,              'status' => 1, 'sub_category_slug' => 'toys-games'],
            ['sub_category' => 'Baby & Toddler Toys', 'category_id' => 4,       'status' => 1, 'sub_category_slug' => 'baby-toddler-toys'],
            ['sub_category' => 'Learning & Education', 'category_id' => 4,      'status' => 1, 'sub_category_slug' => 'learning-education'],
            ['sub_category' => 'Pet Accessories', 'category_id' => 5,           'status' => 1, 'sub_category_slug' => 'pet-accessories'],
            ['sub_category' => 'Pet Food', 'category_id' => 5,                  'status' => 1, 'sub_category_slug' => 'pet-food'],
            ['sub_category' => 'Pet Healthcare', 'category_id' => 5,            'status' => 1, 'sub_category_slug' => 'pet-healthcare'],
            ['sub_category' => 'Beer, Wine & Drinks', 'category_id' => 5,       'status' => 1, 'sub_category_slug' => 'beer-wine-drinks'],
            ['sub_category' => 'Food Staples', 'category_id' => 5,              'status' => 1, 'sub_category_slug' => 'food-staples'],
            ['sub_category' => 'Chocolate, Snacks & Sweets', 'category_id' => 5, 'status' => 1, 'sub_category_slug' => 'cholocate-snaks-sweets'],
            ['sub_category' => 'Cakes & Snacks', 'category_id' => 5,            'status' => 1, 'sub_category_slug' => 'cakes-snacks'],
            ['sub_category' => 'Bath', 'category_id' => 6,                     'status' => 1, 'sub_category_slug' => 'bath'],
            ['sub_category' => 'Bedding', 'category_id' => 6,                   'status' => 1, 'sub_category_slug' => 'bedding'],
            ['sub_category' => 'Furniture', 'category_id' => 6,                 'status' => 1, 'sub_category_slug' => 'furniture'],
            ['sub_category' => 'Storage & Organisation', 'category_id' => 6,    'status' => 1, 'sub_category_slug' => 'storage-organisation'],
            ['sub_category' => 'Laundry & Cleaning Equipments', 'category_id' => 6, 'status' => 1, 'sub_category_slug' => 'laundry-cleaning-equipments'],
            ['sub_category' => 'Kitchen & Dining', 'category_id' => 6,          'status' => 1, 'sub_category_slug' => 'kitchen-dining'],
            ['sub_category' => 'Lightning', 'category_id' => 6,                 'status' => 1, 'sub_category_slug' => 'lightning'],
            ['sub_category' => 'Home Decor', 'category_id' => 6,                'status' => 1, 'sub_category_slug' => 'home-decor'],
            ['sub_category' => 'Outdoor & Garden', 'category_id' => 6,          'status' => 1, 'sub_category_slug' => 'outdoor-garden'],
            ['sub_category' => 'Stationary & Craft', 'category_id' => 6,        'status' => 1, 'sub_category_slug' => 'stationary-craft'],
            ['sub_category' => 'Tools & Home Improvement', 'category_id' => 6,  'status' => 1, 'sub_category_slug' => 'tools-home-imporvement'],
            ['sub_category' => "Women's Fashion", 'category_id' => 7,           'status' => 1, 'sub_category_slug' => 'womens-fashion'],
            ['sub_category' => "Men's Fashion", 'category_id' => 7,             'status' => 1, 'sub_category_slug' => 'mens-fashion'],
            ['sub_category' => "Kid's Fashion", 'category_id' => 7,             'status' => 1, 'sub_category_slug' => 'kids-fashion'],
            ['sub_category' => 'Fashion Accessories', 'category_id' => 7,       'status' => 1, 'sub_category_slug' => 'fashion-accesories'],
            ['sub_category' => 'Bags', 'category_id' => 7,                      'status' => 1, 'sub_category_slug' => 'bags'],
            ['sub_category' => 'Eyeglasses', 'category_id' => 7,                'status' => 1, 'sub_category_slug' => 'eyeglasses'],
            ['sub_category' => 'Sunglasses', 'category_id' => 7,                'status' => 1, 'sub_category_slug' => 'sunglasses'],
            ['sub_category' => 'Contact Lenses', 'category_id' => 7,            'status' => 1, 'sub_category_slug' => 'contact-lenses'],
            ['sub_category' => 'Jewellery', 'category_id' => 7,                 'status' => 1, 'sub_category_slug' => 'jewellery'],
            ['sub_category' => 'Outdoor Recreation', 'category_id' =>8,         'status' => 1, 'sub_category_slug' => 'outdoor-recreation'],
            ['sub_category' => 'Sports Shoes', 'category_id' =>8,               'status' => 1, 'sub_category_slug' => 'sports-shoes'],
            ['sub_category' => 'Sports Apparel', 'category_id' =>8,             'status' => 1, 'sub_category_slug' => 'sports-apparel'],
            ['sub_category' => 'Exerice & Fitness Equipment', 'category_id' =>8, 'status' => 1, 'sub_category_slug' => 'exerice-fitness-equipment'],
            ['sub_category' => 'Sports Equipment', 'category_id' =>8,           'status' => 1, 'sub_category_slug' => 'sports-equipment'],
            ['sub_category' => 'Musical Instruments', 'category_id' =>8,        'status' => 1, 'sub_category_slug' => 'musical-instruments'],
            ['sub_category' => 'Book', 'category_id' =>8,                       'status' => 1, 'sub_category_slug' => 'book'],
            ['sub_category' => 'eBooks', 'category_id' =>8,                     'status' => 1, 'sub_category_slug' => 'eBooks'],
            ['sub_category' => 'Music', 'category_id' =>8,                      'status' => 1, 'sub_category_slug' => 'music'],
            ['sub_category' => 'Movies', 'category_id' =>8,                     'status' => 1, 'sub_category_slug' => 'movies'],
            ['sub_category' => 'Magazines', 'category_id' =>8,                  'status' => 1, 'sub_category_slug' => 'magazines'],
            ['sub_category' => 'Autotmotive', 'category_id' =>9,                'status' => 1, 'sub_category_slug' => 'automotive'],
            ['sub_category' => 'Motorcycles', 'category_id' =>9,                'status' => 1, 'sub_category_slug' => 'motorcycles'],
            ['sub_category' => 'Vehicle Care', 'category_id' =>9,               'status' => 1, 'sub_category_slug' => 'vehicle-care'],
            ['sub_category' => 'Automotive Accessories', 'category_id' =>9,     'status' => 1, 'sub_category_slug' => 'automotive-accessories'],
            ['sub_category' => 'Motorycycle Accessories', 'category_id' =>9,    'status' => 1, 'sub_category_slug' => 'motorcycle-accessories']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
