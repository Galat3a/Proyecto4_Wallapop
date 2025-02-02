<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

}