<?php

namespace App\GraphQL\Queries;

use App\Models\Line;
use App\Models\User;

class Cart
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $token = request()->bearerToken();
        $user = User::where('api_token', $token)->first();
        
        return Line::query()->where('user_id', $user->id)->whereNull('order_id')->get();
    }
}
