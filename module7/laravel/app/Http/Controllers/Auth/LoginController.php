<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Redirect the user to the authentication page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        $driver = request()->segment(count(request()->segments()));
        session(['driver' => $driver]);

        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from server..
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        $driver = session('driver');

        $userData = Socialite::driver($driver)->user();

        $user = User::where('provider_id', $userData->getId())->first();

        if (!$user) {
            $user = User::create([
                'email' => $userData->getEmail(),
                'name' => $userData->getName(),
                'provider_id' => $userData->getId(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
