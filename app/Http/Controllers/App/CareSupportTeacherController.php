<?php

namespace App\Http\Controllers\App;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Caregiver;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class CareSupportTeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Caregiver::with(['user', 'state', 'city'])
            ->where('status', Status::APPROVED);

        $states = State::getStates();

        $cities = [];

        if ($request->location || $request->state) {

            $query = $query->where('state_id', $request->location ?? $request->state);

            $cities = State::getCities($request->location ?? $request->state);

        }

        if ($request->city) {

            $query = $query->where('city_id', $request->city);

        }

        $careSupportTeachers = $query->paginate(15);

        return view('app.care-support-teachers', [
            'careSupportTeachers' => $careSupportTeachers,
            'states' => $states,
            'cities' => $cities,
            'state' => $request->location ?? $request->state ?? '',
            'city' => $request->city
        ]);
    }

    public function profile($id)
    {
        $user = User::where(['id' => $id])->with(['caregiver.city', 'caregiver.state', 'caregiver.educations'])->first();

        if (!$user || !$user['caregiver']) {
            return $this->returnError('Caregiver does not exist');
        }

        return view('care-support-teacher.profile', ['user' => $user]);
    }
}
