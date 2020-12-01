<?php

namespace App\Process;

use App\Mail\Registration;
use App\Models\Caregiver;
use App\Models\User;
use App\Models\VerificationToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationProcess extends BaseProcess
{
    public $request;
    public $data;

    public function __construct(Request $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    public function run()
    {
        $this->data['password'] = Hash::make($this->data['password']);

        User::create($this->data);

        $userId = DB::getPdo()->lastInsertId();

        Caregiver::create(['user_id' => $userId]);

        self::sendVerifyEmail($userId, request('email'), request('firstname'));

        return $userId;
    }

    public static function sendVerifyEmail($userId, $userEmail, $userFirstname)
    {
        $now = Carbon::now()->toDateTimeString();

        $expiresAt = Carbon::now()->addHour()->toDateTimeString(); // Expires in an hour

        $token = md5($expiresAt);

        VerificationToken::create(['user_id' => $userId, 'token' => $token, 'expires_at' => $expiresAt, 'created_at' => $now]);

        $verificationLink = route('verification.verify', ['id' => $userId, 'hash' => $token]);

        Mail::to($userEmail)
            ->send(new Registration($userFirstname, $verificationLink));
    }
}
