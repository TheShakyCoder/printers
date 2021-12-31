<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'options_products')->using(OptionProduct::class);
    }
    
    public function lines()
    {
        return $this->hasMany(Line::class);
    }
}
