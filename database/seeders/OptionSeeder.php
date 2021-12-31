<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = collect(config('seeder.options'));

        $options->each(function($option) {
            Option::create([
                'name' => $option['name'],
                'min_value' => $option['min_value'],
                'max_value' => $option['max_value'],
                'increment_value' => $option['increment_value'],
                'input' => $option['input']
            ]);
        });
    }
}
