<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CareSupportTeacherController extends Controller
{
    public function profile($id)
    {
        $user = User::where(['id' => $id])->with(['caregiver.city', 'caregiver.state'])->first();

        if (!$user || !$user['caregiver']) {
            return $this->returnError('Caregiver does not exist');
        }

        return view('care-support-teacher.profile', ['user' => $user]);
    }
}
