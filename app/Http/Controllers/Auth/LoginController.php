<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
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
    public function redirectTo()
    {
        $role = auth()->user()->roles[0]->name;

        if ($role == 'super-admin' || $role == 'admin') {
            return '/admin/dashboard';
        }
        return '/posts';
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

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function githubCallback()
    {
        $user = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            [
                'email' => $user->email
            ],
            [
                'name' => $user->nickname,
                'password' => Hash::make(Str::random(24))
            ]
        );
        auth()->login($user, true);

        return redirect('/posts');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $user = User::firstOrCreate(
            [
                'email' => $user->getEmail() ? $user->getEmail() : 'default@facebook.com'
            ],
            [
                'name' => $user->getName(),
                'password' => Hash::make(Str::random(24)),
                'avatar' => $user->getAvatar()
            ]
        );

        auth()->login($user, false);

        return redirect('/posts');
    }
}
