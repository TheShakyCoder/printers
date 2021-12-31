<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public function linesOptions()
    {
        return $this->hasMany(LineOption::class, 'lines_options');
    }
    
    public function optionsProducts()
    {
        return $this->hasMany(OptionProduct::class, 'options_products');
    }
}
