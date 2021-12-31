<?php

namespace App\GraphQL\Mutations;

use App\Models\Line;
use App\Models\User;
use App\Models\Product;

class AddProductToCart
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $token = request()->bearerToken();
        $user = User::where('api_token', $token)->first();

        $line = Line::create([
            'product_id' => $args['product_id'],
            'user_id' => $user->id
        ]);

        $product = Product::with(['options'])->find($args['product_id']);

        $product->options->each(function($option) use($line) {
            $line->options()->attach($option->id, [
                'value' => $option->min_value
            ]);
        });

        return $line;
    }
}
