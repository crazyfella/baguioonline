<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{


    public function __construct() {
		$this->middleware('auth:api');

    }

    public function index()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $currentPhoto = $user->photo_user;
        $currentCover = $user->cover_user;

		$this->validate($request, [
			'name' => 'required|string|max:191|regex:/^[a-zA-Z0-9 ]+$/u',
            'email' => 'required|string|email|max:191|unique:users,email,' . $user->id,
            'shop_name' => 'required|string|max:191|unique:users,shop_name,' . $user->id,
        ]);

        if ($user->slug_shop != $request->slug) {
            $user->slug_shop = $this->createSlug($request->shop_name, $id);
        }

        if ($request->photo_user != $currentPhoto) { //PROFILE IMAGE

			$name = time() . '.' . explode('/', explode(':', substr($request->photo_user, 0, strpos($request->photo_user, ';')))[1])[1];

			\Image::make($request->photo_user)->save(public_path('images/profile/') . $name);

			$request->merge(['photo_user' => $name]);

			$userPhoto = public_path('images/profile/') . $currentPhoto;

			if ($currentPhoto != 'profile.png') {
				if (file_exists($userPhoto)) {
					@unlink($userPhoto);
				}
			}

        }
        
        if ($request->cover_user != $currentCover) { //COVER IMAGE

            $name = time() . '.' . explode('/', explode(':', substr($request->cover_user, 0, strpos($request->cover_user, ';')))[1])[1];

			\Image::make($request->cover_user)->resize(1200, 330)->save(public_path('images/cover/') . $name);

			$request->merge(['cover_user' => $name]);
            
			$userPhoto = public_path('images/cover/') . $currentCover;

			if ($currentCover != 'no-image.jpg') {
				if (file_exists($userPhoto)) {
					@unlink($userPhoto);
				}
			}

		}

		if (!empty($request->new_password) || !empty($request->current_password)) {
            $this->validate($request, [
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required', 'min:6'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            $request->merge(['password' => Hash::make($request['new_password'])]);
		}

        $user->update($request->all());


    }


    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug_shop', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug_shop', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return User::select('slug_shop')->where('slug_shop', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }


    public function destroy($id)
    {

    }

    public function profile()
    {
        return auth('api')->user();
    }

    public function dashboard()
    {
        $id = auth('api')->user()->id;
        $userDash = User::where('id',$id)->first();

        $allUser = [
            'userDashboard' => $userDash
        ];

        return $allUser;
    }

    public function subscription()
    {
        $id = auth('api')->user()->id;
     
        $userCount = DB::table('users')
        ->join('subscriptions', 'users.subscription','subscriptions.id')
        ->where('users.id',$id)
        ->first();

        $allUser = [
            'userSubs' => $userCount
        ];

        return $allUser;
    }

    public function coverPhoto()
    {
        $id = auth('api')->user()->id;
        $photo = User::findOrfail($id);
        $cover_user = User::where('id', $id)->first()->cover_user;

        $photo->update([
            'cover_user' => 'no-image.jpg'
        ]);
        
        $userPhoto = public_path('images/cover/') . $cover_user;
        @unlink($userPhoto);
    }

    public function cover_user()
    {
        $id = auth('api')->user()->id;
        $userPhoto = User::where('id',$id)->first()->cover_user;

        $cover = [
            'userCover' => $userPhoto
        ];

        return $cover;
    }

    

    

   

}
