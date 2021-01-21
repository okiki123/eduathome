<?php

namespace App\Http\Controllers\App;

use App\Constants\StaticContents;
use App\Http\Controllers\Controller;
use App\Models\State;

class HomeController extends Controller
{
    public function index()
    {
        $successStories = StaticContents::$successStories;

        $states = State::getStates();

        return view('app.welcome', [
            'states' => $states,
            'successStories' => $successStories
        ]);
    }

    public function about()
    {
        return view('app.about');
    }
}
