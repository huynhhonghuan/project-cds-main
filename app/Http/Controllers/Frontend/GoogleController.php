<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class GoogleController extends Controller
{
    public function __construct()
    {
        
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        try {
        
            $user = Socialite::driver('google')->user();
         
            $finduser = User::where('email', $user->email)->first();
         
            if($finduser){
         
                Auth::login($finduser);
                return redirect()->intended('/');
         
            }else{
                return redirect()->intended('/');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
