<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caregiver;
use App\Models\User;
use App\Tables\CareSupportTeachersTable;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Okipa\LaravelTable\Table;

class AdminCareSupportTeacherController extends Controller
{
    public function index(Request $request)
    {
        $table = (new CareSupportTeachersTable())->setup();

        return view('admin.care-support-teacher.all', ['table' => $table]);
    }

    public function show($id)
    {
        $user = User::where(['caregivers.id' => $id])->with(['caregiver.city', 'caregiver.state'])->first();

        if (!$user || !$user['caregiver']) {
            return $this->returnError('Care support teacher does not exist');
        }

        return view('admin.care-support-teacher.one', ['user' => $user]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        try {
            $caregiver = Caregiver::where(['id' => $id])->first();

            if (!$caregiver) {
                return $this->returnError('Care support teacher does not exist');
            }

            $caregiver->update($request->only(['status']));

            return $this->returnSuccess('Care support teacher status updated successfully');

        } catch (Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
    }
}
