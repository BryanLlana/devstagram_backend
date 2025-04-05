<?php

namespace App\Http\Controllers\wall;

use App\Http\Controllers\Controller;
use App\Models\User;

class WallController extends Controller
{
    public function index(User $user) {
        return response()->json([
            "data" => $user
        ]);
    }
}
