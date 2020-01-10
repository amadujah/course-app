<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if (!$user)
            return response()->json(['status' => 'failure']);
        else
            return response()->json(['status' => 'success', 'password' => $user->password]);
    }

    public function redirectTo()
    {
        $loggedUser = User::where('id', Auth::user()->getAuthIdentifier())->first();
        if ($loggedUser->isAdmin()) {
            return route('admin');
        } else {
            return route('home');
        }
    }
}
