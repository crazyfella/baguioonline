<?php



namespace App\Http\Controllers\API;



use App\Categories;

use App\ImageUpload;

use App\Product;

use App\Sub_categories;

use App\User;

use Auth;

use App\Http\Controllers\Controller;

use App\Product_category;

use App\Subscription;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;

use Illuminate\Validation\ValidationException;

use Illuminate\Support\Arr;



class ProductsController extends Controller

{





    public function __construct() {

		$this->middleware('auth:api');

    }







    public function index(Request $request)

    {

        $user = auth('api')->user()->id;



        if ( $request->input('showdata') ) {

            return Product::where('userId', $user)->orderBy('created_at', 'desc')->get();

            }

                $columns = ['productName', 'ProductPrice','created_at'];

                $length = $request->input('length');

                $column = $request->input('column');

                $search_input = $request->input('search');



                $query = Product::select('productName', 'ProductPrice', 'created_at')

                ->orderBy($columns[$column]);



            if ($search_input) {

                $query->where(function($query) use ($search_input) {

                $query->where('productName', 'like', '%' . $search_input . '%')

                ->orWhere('ProductPrice', 'like', '%' . $search_input . '%')

                ->orWhere('created_at', 'like', '%' . $search_input . '%');

                });

            }

            $product = $query->paginate($length);

            return ['data' => $product];

    }





    public function store(Request $request)

    {



        $id = auth('api')->user()->id;

        $this->validate($request,[

            'productName' => 'required|string|max:191|regex:/^[a-zA-Z0-9 ]+$/u',

            'productPrice' => 'required',

            'selectedCategory' => 'required|array|between:1,5',

            'photo' => 'required',

        ],

        [

            'selectedCategory.required' => 'Category is limited to 5.',

        ]);



        $productCount = Product::where('userId',$id)->get(); //FETCH PRODUCTS

        $total = $productCount->count(); //TOTAL NUMBER OF PRODUCTS



        $subscription = DB::table('users') //CHECK SUBSCRIPTION

        ->join('subscriptions', 'users.subscription','subscriptions.id')

        ->where('users.id',$id)

        ->first();



        //FEATURED IMAGE



        $photo = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];



        \Image::make($request->photo)->resize(720, 960)->save(public_path('images/featured/') . $photo);



        $request->merge(['photo' => $photo]);



        $productPhoto = public_path('images/featured/');



        if (file_exists($productPhoto)) {

            @unlink($productPhoto);

        }



        //END FEATURED IMAGE









        $items = new Product();

        $items->userId = $id;

        $items->productName            = $request['productName'];

        $items->productBrand           = $request['productBrand'];

        $items->productPrice           = $request['productPrice'];

        $items->productDescription     = $request['productDescription'];

        $items->productColor           = $request['productColor'];

        $items->productSize            = $request['productSize'];

        $items->photo                  = $photo;

        $items->productSlug            = $this->createSlug($request['productName']);





        if($total <= $subscription->limit){

            $items->save();



            $latestId =  $items->id;



            $category = $request->selectedCategory; //SAVE CATEGORY

            foreach ($category as $datas) {

                Product_category::create([

                    'product_id'       => $latestId,

                    'category_id'    	=> $datas,

                ]);

            }

                

        }else{

            return false;

        }









    }







    public function show($id)

    {



        $product = DB::table('products')

                    ->where('id',$id)

                    ->get()

                    ->each(function($sub){

                        $sub->productCategory = explode(",", $sub->productCategory);

                    });

        return $product;



    }



    public function update(Request $request, $id)

    {

        $items = Product::findOrfail($id);

        $currentPhoto = $items->photo;



        $this->validate($request,[



            'productName' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|max:191',

            'productPrice' => 'required',



        ]);



        //FEATURED IMAGE

        if ($request->photo != $currentPhoto) {

            $photo = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];



            \Image::make($request->photo)->resize(400, 600)->save(public_path('images/featured/') . $photo);



            $request->merge(['photo' => $photo]);



            $productPhoto = public_path('images/featured/') . $currentPhoto;



            if (file_exists($productPhoto)) {

                @unlink($productPhoto);

            }

            $items->update([

                'productName'           => $request['productName'],

                'productBrand'          => $request['productBrand'],

                'productPrice'          => $request['productPrice'],

                'productDescription'    => $request['productDescription'],

                'productColor'          => $request['productColor'],

                'productSize'           => $request['productSize'],

                'photo'                 => $photo,

                'productSlug'           => $this->createSlug($request['productName'])

            ]);

        }else{

            $items->update([

                'productName'           => $request['productName'],

                'productBrand'          => $request['productBrand'],

                'productPrice'          => $request['productPrice'],

                'productDescription'    => $request['productDescription'],

                'productColor'          => $request['productColor'],

                'productSize'           => $request['productSize'],

                'productSlug'           => $this->createSlug($request['productName'])

            ]);

        }



        //END FEATURED IMAGE









    }







    public function udpateCategory(Request $request, $id)

    {



        $this->validate($request,[

             'selectedCategory' => 'required|array|between:1,5'

        ],

        [

             'selectedCategory.required' => 'Category Field Is Required or Category limit exceeded.',

        ]);



        DB::delete('delete from product_category where product_id = ?',[$id]);



        $category = $request->selectedCategory;

            foreach ($category as $datas) {

                Product_category::create([

                    'product_id'   => $id,

                    'category_id'  => $datas,

                ]);

            }



    }







    public function destroy($id)

    {

        $product = Product::findOrfail($id);

        $currentPhoto = $product->photo;





        //PRODUCT IMAGES

        $imageUpload = DB::table('image_uploads')

                        ->where('productId',$id)

                        ->get();



        //delete the files

        foreach ($imageUpload as $image) {

            File::delete([

                public_path(('/images/').$image->image)

            ]);

        }



        //PRODUCT FEATURED IMAGE

        $imageFeatured = DB::table('products')

                        ->where('id',$id)

                        ->get();

        //delete the files

        $imageFeatured = public_path('images/featured/') . $currentPhoto;



        if (file_exists($imageFeatured)) {

            @unlink($imageFeatured);

        }

        $product->delete();

        DB::delete('delete from image_uploads where productId = ?',[$id]);

        DB::delete('delete from product_category where product_id = ?',[$id]);



    }







    public function getProduct()

    {

        $user = auth('api')->user();

    }



    public function countProducts()

    {

        $id = auth('api')->user()->id;

        $products = Product::all()->where('userId',$id);



        $allProductstCount = [

            'products_count' => $products->count()

        ];

        return $allProductstCount;

    }



    public function createSlug($title, $id = 0)

    {

        // Normalize the title

        $slug = str_slug($title);



        // Get any that could possibly be related.

        // This cuts the queries down by doing it once.

        $allSlugs = $this->getRelatedSlugs($slug, $id);



        // If we haven't used it before then we are all good.

        if (! $allSlugs->contains('productSlug', $slug)){

            return $slug;

        }



        // Just append numbers like a savage until we find not used.

        for ($i = 1; $i <= 50; $i++) {

            $newSlug = $slug.'-'.$i;

            if (! $allSlugs->contains('productSlug', $newSlug)) {

                return $newSlug;

            }

        }



        throw new \Exception('Can not create a unique slug');

    }



    protected function getRelatedSlugs($slug, $id = 0)

    {

        return Product::select('productSlug')->where('productSlug', 'like', $slug.'%')

            ->where('id', '<>', $id)

            ->get();

    }

}

