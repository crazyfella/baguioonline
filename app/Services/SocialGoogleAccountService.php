<?php
namespace App\Services;
use App\SocialGoogleAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Support\Str;

class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialGoogleAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();
            if ($account) {
                        return $account->user;
                    } else {
            $account = new SocialGoogleAccount([
                            'provider_user_id' => $providerUser->getId(),
                            'provider' => 'google'
                        ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {

                $shop = Str::random(6);
                $slug_Shop =  $this->createSlugShop($shop);
                
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'slug_user' => $this->createSlug($providerUser->getName()),
                    'password' => md5(rand(1,10000)),
                    'shop_name' => $shop ,
                    'slug_shop' => $slug_Shop
                ]);
                        }
            $account->user()->associate($user);
                        $account->save();
            return $user;
        }
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