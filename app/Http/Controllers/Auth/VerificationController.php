<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\VerificationToken;
use App\Process\RegistrationProcess;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
//        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $id = $request->route('id');
        $urlToken = $request->route('hash');
        $data = [
            'title' => 'Verification Successful',
            'image' => asset('images/verified__valid.svg'),
            'message' => 'Your Email has been verified',
            'login' =>true
        ];
        $token = VerificationToken::where([['user_id', '=', $id]])
            ->with('user')
            ->latest()
            ->first();

        if ($token->user->email_verified_at) {
            $data = [
                'title' => 'Welcome back',
                'image' => asset('images/verified__already.svg'),
                'message' => 'Your Email has already been verified',
                'login' => true
            ];
        } else if (!$token || $token->token !== $urlToken) {
            $data = [
                'title' => 'Oops!',
                'image' => asset('images/verified__invalid.svg'),
                'message' => 'The verification link is invalid',
                'login' => false
            ];
        } else if (Carbon::now()->gt(Carbon::parse($token->expires_at))) {
            $data = [
                'title' => 'Oops!',
                'image' => asset('images/verified__expired.svg'),
                'message' => 'The verification link has expired',
                'login' => false
            ];
        } else {
            $now = Carbon::now()->toDateTimeString();
            User::where('id', $id)->update(['email_verified_at' => $now]);
        }

        return view('auth.verified', ['data' => $data]);
    }

    public function resend(Request $request)
    {
        $userId = session('userId');

        if (!$userId) {
            return back()->with('message', ['type' => 'danger', 'message' => 'Failed to Resend token']);
        }

        $user = User::where('id', $userId)->first();

        RegistrationProcess::sendVerifyEmail($user->id, $user->email, $user->firstname);

        return back()->with('resent', true);
    }
}
