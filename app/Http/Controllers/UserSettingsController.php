<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserSettingsController extends Controller
{
    public function index()
    {
        $caregiver = auth()->user()->caregiver()->first();
        $states = State::getStates();
        $cities = [];

        if ($caregiver->state_id !== null) {
            $cities = State::getCities($caregiver->state_id);
        }

        return view('dashboard.settings', [
            'states' => $states,
            'cities' => $cities,
            'caregiver' => $caregiver
        ]);
    }

    public function updateBasicDetails(Request $request)
    {
        try {
            auth()->user()->update($request->all());
            return  $this->returnSuccess(Messages::successMessage('Your details', 'updated'));
        } catch (Exception $ex) {
            report($ex);
            return $this->returnError(Messages::failedMessage('update', 'your details'));
        }
    }

    public function updateContactDetails(Request $request)
    {
        $request->validate([
            'state' => 'required',
            'city' => 'required',
            'street1' => 'required'
        ]);

        $request->merge(['city_id' => $request->city, 'state_id' => $request->state]);

        $data = $request->only(['street1', 'street2', 'city_id', 'state_id']);

        try {
            auth()->user()->caregiver()->update($data);
            return  $this->returnSuccess(Messages::successMessage('Your details', 'updated'));
        } catch (Exception $ex) {
            report($ex);
            return $this->returnError(Messages::failedMessage('update', 'your details'));
        }
    }

    public function updateBioAndResume(Request $request)
    {
        $request->validate([
            'bio' => 'required'
        ]);

        try {
            auth()->user()->caregiver()->update($request->only(['bio']));
            return  $this->returnSuccess(Messages::successMessage('Your details', 'updated'));
        } catch (Exception $ex) {
            report($ex);
            return $this->returnError(Messages::failedMessage('update', 'your details'));
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->user()->validatePassword($request->currentPassword)) {
            return $this->returnError('Current password is not correct');
        }

        $request->merge(['password' => Hash::make($request->password)]);

        try {
            auth()->user()->update($request->only(['password']));
            return $this->returnSuccess('Password updated successfully');
        } catch (Exception $ex) {
            report($ex);
            return $this->returnError('Failed to update your password');
        }
    }
}
