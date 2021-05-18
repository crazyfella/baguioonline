<?php



namespace App\Http\Controllers\API;



use App\Categories;

use App\Http\Controllers\Controller;

use App\Product;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class CategoriesController extends Controller

{



    public function index()

    {

        // $products = Product::with('categories')->whereHas('categories', function ($query) {

        //     $query->where('slug', request()->category);

        // });

    }





    public function store(Request $request)

    {



    }





    public function show($id)

    {

        $category = DB::table('product_category as a')

            ->join('sub_categories as b', 'a.category_id', 'b.id')

            ->where('a.product_id', $id)

            ->first();



            $productId= [

                'productIdCategory' => $category

            ];



            return $productId;

    }





    public function update(Request $request, $id)

    {



    }





    public function destroy($id)

    {



    }



    public function showCat(){

        return Categories::latest()->paginate(100);

    }

    public function foods()

    {

        return DB::table('sub_categories')

            ->where('category_id',10)

            ->latest()->paginate(100);

    }



    public function automotive()

    {

        return DB::table('sub_categories')

            ->where('category_id',9)

            ->latest()->paginate(100);

    }



    public function sports()

    {

        return DB::table('sub_categories')

            ->where('category_id',8)

            ->latest()->paginate(100);

    }



    public function fashion()

    {

        return DB::table('sub_categories')

            ->where('category_id',7)

            ->latest()->paginate(100);

    }



    public function home()

    {

        return DB::table('sub_categories')

            ->where('category_id',6)

            ->latest()->paginate(100);

    }



    public function pets()

    {

        return DB::table('sub_categories')

            ->where('category_id',5)

            ->latest()->paginate(100);

    }



    public function babies()

    {

        return DB::table('sub_categories')

            ->where('category_id',4)

            ->latest()->paginate(100);

    }



    public function healths()

    {

        return DB::table('sub_categories')

            ->where('category_id',3)

            ->latest()->paginate(100);

    }



    public function tvs()

    {

        return DB::table('sub_categories')

            ->where('category_id',2)

            ->latest()->paginate(100);

    }



    public function electronics()

    {

        return DB::table('sub_categories')

            ->where('category_id',1)

            ->latest()->paginate(100);

    }







}

