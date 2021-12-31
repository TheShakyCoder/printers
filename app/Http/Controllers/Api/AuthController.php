<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $hash = Hash::make($request->input('password'));
        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $hash
            ]);
    
            return response()->json([], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        if(!$user = User::where('email', $request->input('username'))->first()) {
            return response()->json([], 403);
        }
        
        if(!Hash::check($request->input('password'), $user->password)) {
            return response()->json([], 401);
        }

        if($user->api_token == null) {
            $user->api_token = Str::random(60);
            $user->save();
        }
        
        return response()->json([
            'api_token' => $user->api_token
        ], 200);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        if($user = User::where('api_token', $token)->first()) {
            $user->api_token = null;
            $user->save();
            return response()->json([], 200);
        }
        
        return response()->json([], 401);
    }
}
