<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function profile()
    {
        return response()->json([auth()->user()], 200);
    }
}
