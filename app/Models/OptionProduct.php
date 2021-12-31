<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OptionProduct extends Pivot
{
    use HasFactory;

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
