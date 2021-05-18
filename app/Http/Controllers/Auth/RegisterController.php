<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $messages = array(
            'shop_name.unique' => 'The store name has already been taken.',
        );

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'shop_name' => ['unique:users,shop_name'],
            
        ], $messages);

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if(empty($data['shop_name'])){
            $shop = Str::random(6);
            $slug_Shop =  $this->createSlugShop($shop);
        }else{
            $shop = $data['shop_name'];
            $slug_Shop =  $this->createSlugShop($data['shop_name']);
        }
        

        return User::create([
            'name' => $data['name'],
            'slug_user' => $this->createSlug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'shop_name' => $shop ,
            'slug_shop' => $slug_Shop
        ]);
    }

    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug_user', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 50; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug_user', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return User::select('slug_user')->where('slug_user', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }



    public function createSlugShop($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugsShop($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug_shop', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 50; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug_shop', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugsShop($slug, $id = 0)
    {
        return User::select('slug_shop')->where('slug_shop', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }


}
