<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Product::seletc('productName')
                ->where('trackingNumber', 'like', '%' . $request->input('productName') . '%')->get();

        return response()->json($data);
    }

    public function search_product(Request $request){
        $product = $request->get('search_product');

        $products=Product::where('productName','LIKE','%'.$product.'%')->get();
        
        return view('search')->with('products', $products);
     
    }
}
