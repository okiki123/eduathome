<?php

namespace App\Helpers;

class Utils {
    public static function messageResponse($status, $message, $code)
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
        ], $code);
    }
}
