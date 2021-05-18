<?php



namespace App\Providers;

use App\Categories;

use App\Sub_categories;

use Illuminate\Support\ServiceProvider;



class CategoriesServiceProvider extends ServiceProvider

{

    /**

     * Register services.

     *

     * @return void

     */

    public function register()

    {

        //

    }



    /**

     * Bootstrap services.

     *

     * @return void

     */

    public function boot()

    {

        view()->composer('*', function ($view){

            $foods = Sub_categories::where('category_id',10)->get();

            $automative = Sub_categories::where('category_id',9)->get();

            $sport = Sub_categories::where('category_id',8)->get();

            $fashion = Sub_categories::where('category_id',7)->get();

            $home = Sub_categories::where('category_id',6)->get();

            $pets = Sub_categories::where('category_id',5)->get();

            $baby = Sub_categories::where('category_id',4)->get();

            $health = Sub_categories::where('category_id',3)->get();

            $appliance = Sub_categories::where('category_id',2)->get();

            $electronic = Sub_categories::where('category_id',1)->get();

            

            $category = Categories::inRandomOrder()->limit(5)->get();

            $sub_categories = Sub_categories::inRandomOrder()->limit(5)->get();



            return $view
                    ->with('foods',$foods)

                    ->with('automative',$automative)

                    ->with('sport',$sport)

                    ->with('fashion',$fashion)

                    ->with('pets',$pets)

                    ->with('home',$home)

                    ->with('baby',$baby)

                    ->with('health',$health)

                    ->with('appliance',$appliance)

                    ->with('electronic',$electronic)

                    ->with('categories', $category)

                    ->with('sub_categories',$sub_categories);

        });

    }

}

