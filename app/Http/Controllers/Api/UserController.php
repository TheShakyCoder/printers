<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function me(Request $request)
    {
        $token = $request->bearerToken();

        if($user = User::where('api_token', $token)->first()) {
            return response()->json([
                'user' => $user
            ], 200);
        }

        return response()->json([], 404);
    }
}
