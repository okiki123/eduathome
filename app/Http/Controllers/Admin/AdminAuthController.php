<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');;
//        $this->middleware('guest:admin')->except('logout');;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return redirect()->intended('/admin');
        }

        return $this->returnError('Invalid login credentials');
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     * @return void
     *
     * @throws ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
           'email' => 'required|string|exists:admins,email',
            'password' => 'required|string',
        ], ['email.exists' => 'There is no account with that email']);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return Auth::guard('admin')->attempt(
            $request->only(['email', 'password']),
            false
        );
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('admin.login');
    }
}
