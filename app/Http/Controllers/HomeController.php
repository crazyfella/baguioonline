<?php

namespace App\Http\Controllers;

use App\Categories;
use App\ImageUpload;
use App\Inbox;
use App\PaymentAccount;
use App\Product;
use App\Subscription;
use App\Sub_categories;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	public function index() {

		$id = Auth::id();

		$user = User::where('id', $id)->get();

		$messages = Inbox::where('userId', $id)->where('status', '0')->count();

		return view('home')->with([

			'user' => $user,

			'messages' => $messages,

		]);

	}

	public function main() {

		$this->middleware('auth');

		$collection = Product::all();

		if (!$collection->isEmpty()) {

			$product = Product::all()

				->random(10);

		} else {

			$product = "No items";

		}

		$latest = Product::

			orderBy('created_at', 'DESC')

			->limit(12)

			->get();

		return view('main')->with([

			'products' => $product,

			'latest' => $latest,

		]);

	}

	public function category() {

		$category_id = Sub_categories::where('sub_category_slug', request()->category)->first()->category_id;

		$id = Sub_categories::where('sub_category_slug', request()->category)->first()->id;

		$subCat = Sub_categories::where('category_id', $category_id)->get();

		$product_category = DB::table('product_category')

			->join('products', 'product_category.product_id', 'products.id')

			->join('sub_categories', 'product_category.category_id', 'sub_categories.id')

			->where('product_category.category_id', $id)

			->groupBy('products.productName')

			->orderBy('products.productName', 'ASC')

			->paginate(10);

		$slug = str_replace('-', ' ', request()->category);

		$title = ucwords($slug);

		return view('shop')->with([

			'subCategory' => $subCat, //SHOW CATEGORIES ON LEFT SIDE

			'product' => $product_category, //SHOW PRODUCTS

			'title' => $title,

		]);

	}

	public function product_details() {

		$item = Product::where('productSlug', request()->details)->first(); //PRODUCT ID

		if ($item == null) {

			return abort(404);

		} else {

			$id = $item->id;

			$viewNumber = $item->view;

			$totalView = $viewNumber + 1;

			$views = Product::findOrfail($id);

			$views->update(['view' => $totalView]);

			$product = DB::table('products as a')

				->join('users as b', 'a.userId', 'b.id')

				->where('a.productSlug', request()->details)

				->get();

			$id = Product::where('productSlug', request()->details)->first()->id;

			$images = ImageUpload::where('productId', $id)->get();

			$related = DB::table('product_category')

				->join('products', 'product_category.product_id', 'products.id')

				->inRandomOrder()

				->limit(8)

				->get();

			$random = Product::all()->random(3);

			return view('product-details')->with([

				'details' => $product,

				'images' => $images,

				'related' => $related,

				'random' => $random,

			]);

		}

	}

	public function seller($slug_shop) {

		$item = Product::where('productSlug', $slug_shop);

		if ($item == null) {

			return abort(404);

		} else {

			$product = DB::table('products as a')

				->join('users as b', 'a.userId', 'b.id')

				->where('b.slug_shop', $slug_shop)

				->orderBy('a.id', 'DESC')

				->paginate(12);

			$user = User::where('slug_shop', $slug_shop)->get();

			$category = DB::table('products as a')

				->join('users as b', 'a.userId', 'b.id')

				->join('product_category as c', 'c.product_id', 'a.id')

				->join('sub_categories as d', 'd.id', 'c.category_id')

				->where('b.slug_shop', $slug_shop)

				->get();

			return view('seller')->with([

				'product' => $product,

				'user' => $user,

				'category' => $category,

			]);

		}

	}

	public function autoComplete(Request $request) {

		$query = $request->get('term', '');

		$products = Product::where('productName', 'LIKE', '%' . $query . '%')->get();

		$data = array();

		foreach ($products as $product) {

			$data[] = array('value' => $product->productName, 'id' => $product->id);

		}

		if (count($data)) {
			return $data;
		} else {
			return ['value' => 'No Result Found', 'id' => ''];
		}

	}

	public function category_products() {

		$category = Categories::where('category_slug', request()->category)->first()->id;

		$subCat = Sub_categories::where('category_id', $category)->get();

		$product = DB::table('products as a')

			->join('product_category as b', 'a.id', 'b.product_id')

			->join('sub_categories as c', 'b.category_id', 'c.id')

			->join('categories as d', 'c.category_id', 'd.category_id')

			->where('d.category_id', $category)

			->groupBy('a.productName')

			->orderBy('a.productName', 'desc')

			->paginate(10);

		return view('products_category')->with([

			'product' => $product,

			'subCategory' => $subCat,

			'title' => request()->category,

		]);

	}

	public function payment_method($id) {

		$userId = Auth::id();

		if (PaymentAccount::where('userId', $userId)->exists()) {

			$msg = '1';

		} else {

			$msg = '0';

		}

		$subs = Subscription::where('subscription', $id)->first()->subscription;

		$paid = Subscription::where('subscription', $id)->first()->payment;

		$limit = Subscription::where('subscription', $id)->first()->limit;

		if ($id == $subs) {

			$subscription = $subs;

			$payment = $paid;

		} else {

			$subscription = "Error: Please refresh and try again";

			$payment = "0";

		}

		return view('payment_method', compact('subs', 'paid'))

			->with([

				'message' => $msg,

				'subscription' => $subscription,

				'payment' => $payment,

				'limit' => $limit,

			]);

	}

}
