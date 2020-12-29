<?php

namespace App\Http\Middleware;

use App\Models\Notification;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class NotificationReadAtMiddleware
{
    /**
     * Updates the read at field for a notification if the link is directed from a notification
     *
     * @param  Request  $request
     * @param Closure $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($request->has('notification')) {
            $id = $request->input('notification');
            Notification::where('id', $id)->update(['read_at' => Carbon::now()]);
        }

        return $next($request);
    }
}
