<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company_profile;
use App\Models\Employe_profile;
use App\Models\User;
use App\Notifications\NewUserNotify;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function authenticated()
    {
        if(auth()->user() && auth()->user()->is_admin)
        {
            return redirect()->route('admin-dashboard');
        }
        elseif(auth()->user() && auth()->user()->role == 'recruteur')
        {
            return redirect()->route('company-dashboard');
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    //google callack
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    //google callack
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect('/')->with('message', 'Bienvenue !');
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        return redirect('/')->with('message', 'Bienvenue!');

    }


    public function _registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();
        if(!$user)
        {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            // $user->password = $data->password;
            $user->provider_id = $data->id;
            // $user->avatar = $data->avatar;
            $user->save();
            
            // formateur
            $company_profile = new Company_profile();
            $company_profile->user_id = $user->id;
            $company_profile->save();
            // étudiant
            $employe_profile = new Employe_profile();
            $employe_profile->user_id = $user->id;
            $employe_profile->name = $user->name;
            $employe_profile->email = $user->email;
            $employe_profile->slug = Str::slug($user->name) . strval(rand(1111, 9999));
            $employe_profile->save();
            
            event(new Registered($user));
            $user->notify(new NewUserNotify($user));
        }
        Auth::login($user);
    }
}
