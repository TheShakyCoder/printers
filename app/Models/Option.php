<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    // protected $appends = ['range'];

    public function linesOptions()
    {
        return $this->hasMany(LineOption::class, 'lines_options');
    }
    
    public function optionsProducts()
    {
        return $this->hasMany(OptionProduct::class, 'options_products');
    }

    // public function getRangeAttribute()
    // {
    //     return collect(range($this->min_value, $this->max_value, $this->increment_value));
    // }
}
