<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnSuccess($message, $url = null)
    {
        $data = [
            'status' => 'success',
            'message' => $message
        ];

        return $url ? redirect($url)->with('message', $data) : back()->with('message', $data);
    }

    public function returnError($message, $url = null)
    {
        $data = [
            'status' => 'error',
            'message' => $message
        ];

        return $url ? redirect($url)->with('message', $data) : back()->with('message', $data);
    }
}
