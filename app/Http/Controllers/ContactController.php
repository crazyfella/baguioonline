<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Contact;

use App\User;

use Auth;



class ContactController extends Controller

{







    public function contact_us(Request $request)

    {



        $this->validate($request,[

            'name' => 'required',

            'phone' => 'required',

            'subject' => 'required',

            'message' => 'required',

            'g-recaptcha-response' => 'recaptcha',

        ]);





        $contact = new Contact();

        $contact->name          = $request['name'];

        $contact->category      = 'contact us - concern';

        $contact->phone         = $request['phone'];

        $contact->email         = $request['email'];

        $contact->subject       = $request['subject'];

        $contact->message       = $request['message'];

        $contact->save();



        return back()->with('success','Thank you for your concern, we will be in touch as soon as we read your concern.');



    }



    public function padala(Request $request)

    {

        $id = Auth::user();



        $user = User::where('id',$id->id)->first();





        $this->validate($request,[

            'phone' => 'required',

        ]);





        $contact = new Contact();

        $contact->name      = $user->name;

        $contact->category  = $request['category'];

        $contact->phone      = $request['phone'];

        $contact->email      = $user->email;

        $contact->subject      = $request['subject'];

        $contact->message      = $request['message'];

        $contact->save();



        return back()->with('success','Thank you for giving us a message, we will be in touch asap.');

    }

}

