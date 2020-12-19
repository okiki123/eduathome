<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCareSupportTeacherController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.care-support-teacher.all');
    }
}
