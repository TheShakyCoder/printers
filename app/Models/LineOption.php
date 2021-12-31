<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LineOption extends Pivot
{
    use HasFactory;

    public function line()
    {
        return $this->belongsTo(Line::class);
    }
    
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
