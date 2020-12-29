<?php

namespace App\Process;

use App\Events\TutorCreatedEvent;
use App\Listeners\SendTutorCreatedEmail;
use App\Mail\TutorCreated;
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

        $user = User::create($this->data);

        Caregiver::create(['user_id' => $user->id]);

        TutorCreatedEvent::dispatch($user);

        return $user->id;
    }
}
