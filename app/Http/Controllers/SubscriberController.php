<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        return $user ? response()->json([$user], 200) : response()->json(['error' => 'Unauthorized'], 401);
    }
}
