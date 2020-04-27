<?php

namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use Exception;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $findUser = User::where('google_id', $googleUser->id)->first();

            if($findUser) {
                Auth::login($findUser);

                return redirect()->route('home.index');
            }
            else {
                $newUser = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'password' => encrypt('123456dummy'),
                        'credit' => 20000.0
                ]);

                Auth::login($newUser);

                return redirect()->route('home.index');
            }
        }
        catch (Exception $e){
            dd($e->getMessage());
        }
    }
}
