<?php



namespace App\Http\Controllers\API;



use App\Http\Controllers\Controller;

use App\Inbox;

use App\Product;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class InboxController extends Controller

{

    



    public function index(Request $request)

    {

        $user = auth('api')->user()->id;

        

        $product = DB::table('inboxes as a')

        ->join('products as b', 'a.product_id', 'b.id')

        ->where('a.userId', $user)

        ->get();



        $membership = Inbox::where('userId', $user)->get();



        if ( $request->input('showdata') ) {

            return $membership;

            }

                $columns = ['name', 'subject','created_at'];

                $length = $request->input('length');

                $column = $request->input('column');

                $search_input = $request->input('search');



                $query = Inbox::where('userId', $user)->orderBy($columns[$column]);



            if ($search_input) {

                $query->where(function($query) use ($search_input) {

                $query->where('productName', 'like', '%' . $search_input . '%')

                ->orWhere('ProductPrice', 'like', '%' . $search_input . '%')

                ->orWhere('created_at', 'like', '%' . $search_input . '%');

                });

            }

            $inbox = $query->paginate($length);

            return ['data' => $inbox];





    }





    public function store(Request $request, $productSlug)

    {

       $product = Product::where('productSlug', $productSlug)->first();

       $product_id = $product->id;

       $user = $product->userId;



        $message = new Inbox();

        $message->userId        = $user;

        $message->messages       = $request['message'];

        $message->subject       = $request['subject'];

        $message->contact       = $request['contact'];

        $message->name          = $request['name'];

        $message->status        = '0';

        $message->product_id    = $product_id;

        $message->save();







        return back()->with('success','Thank you for your message, retailer will be in touch with you.');



    }





    public function show($id)

    {

         $inbox = Inbox::findOrfail($id);

        $inbox->update(['status'  => '1']);

        $product = Inbox::where('id', $id)->get()->first();


        if($product->product_id == 0)
        {
            $messages = Inbox::where('id', $id)->latest()->paginate(100);

        }else{
            $messages = DB::table('inboxes as a')
            ->join('products as b', 'a.product_id','b.id')
            ->where('a.id', $id)
            ->latest('a.created_at')->paginate(100);
        }

        return $messages;
    }





    public function update(Request $request, $id)

    {

        

    }





    public function destroy($id)

    {

        $inbox = Inbox::findOrfail($id);

        $inbox->delete();

    }



    public function countMessages()

    {

        $id = auth('api')->user()->id;

        $products = Inbox::all()->where('userId',$id)->where('status', '0');



        $allProductstCount = [

            'messages_count' => $products->count()

        ];

        return $allProductstCount;

    }



}

