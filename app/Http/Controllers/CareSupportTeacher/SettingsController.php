<?php

namespace App\Http\Controllers\CareSupportTeacher;

use App\Constants\Messages;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\State;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $caregiver = auth()->user()->caregiver()->first();
        $states = State::getStates();
        $cities = [];

        if ($caregiver->state_id !== null) {
            $cities = State::getCities($caregiver->state_id);
        }

        return view('care-support-teacher.settings.profile', [
            'states' => $states,
            'cities' => $cities,
            'caregiver' => $caregiver
        ]);
    }

    public function account()
    {
        return view('care-support-teacher.settings.account');
    }

    public function education()
    {
        $caregiver = auth()->user()->caregiver()->with(['educations'])->first();

        return view('care-support-teacher.settings.education', ['caregiver' => $caregiver]);
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

    public function uploadAvatar(Request $request)
    {
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));

        $imageName = Carbon::now() . '--'  . $request->imageName;

        try {

            Storage::disk('s3')->put('' . $imageName, $image, 'public');

            $url = Storage::disk('s3')->url('' . $imageName, $image);

            auth()->user()->caregiver()->update(['avatar_url' => $url]);

            return $this->returnSuccess(Messages::successMessage('Avatar', 'uploaded'));

        } catch (Exception $ex) {

            return  $this->returnError(Messages::failedMessage('Avatar', 'upload'));

        }
    }

    public function uploadResume(Request $request)
    {
        $file = $request->file('resume');

        $name = $file->getClientOriginalName();

        $fileName = Carbon::now() . '--'  . $file->getClientOriginalName();

        try {

            Storage::disk('s3')->put($fileName, file_get_contents($file), 'public');

            $url = Storage::disk('s3')->url($fileName, $file);

            auth()->user()->caregiver()->update(['resume_url' => $url, 'resume_name' => $name]);

            return $this->returnSuccess(Messages::successMessage('Resume', 'uploaded'));

        } catch (Exception $ex) {

            return  $this->returnError(Messages::failedMessage('Resume', 'upload'));

        }
    }

    public function addEducation(Request $request)
    {
        $request->validate([
            'school_name' => 'required',
            'entry_year' => 'required',
            'graduation_year' => 'required',
            'degree' => 'required',
            'discipline' => 'required'
        ]);

        try {

            $caregiver_id = auth()->user()->caregiver->id;

            $data = $request->only(['school_name', 'entry_year', 'graduation_year', 'degree', 'discipline']);

            $data['caregiver_id'] = $caregiver_id;

            Education::create($data);

            return $this->returnSuccess(Messages::successMessage('Education', 'added'));

        } catch (Exception $ex) {

            return $this->returnError(Messages::failedMessage('Education', 'add'));

        }
    }

    public function updateEducation(Request $request, $id)
    {
        $request->validate([
            'school_name' => 'required',
            'entry_year' => 'required',
            'graduation_year' => 'required',
            'degree' => 'required',
            'discipline' => 'required'
        ]);

        try {

            $caregiver_id = auth()->user()->caregiver->id;

            $data = $request->only(['school_name', 'entry_year', 'graduation_year', 'degree', 'discipline']);

            $data['caregiver_id'] = $caregiver_id;

            $education = Education::where('id', $id);

            $education->update($data);

            return $this->returnSuccess(Messages::successMessage('Education', 'updated'));

        } catch (Exception $ex) {

            return $this->returnError(Messages::failedMessage('Education', 'update'));

        }
    }

    public function deleteEducation(Request $request, $id)
    {
        try {

            $education = Education::where('id', $id);

            if (!$education) {
                return  $this->returnError('The record has already been deleted');
            }

            $education->forceDelete();

            return $this->returnSuccess(Messages::successMessage('Education', 'deleted'));

        } catch (Exception $ex) {

            return  $this->returnError(Messages::failedMessage('Education', 'delete'));

        }
    }
}
