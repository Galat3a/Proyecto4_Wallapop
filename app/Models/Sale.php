<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product', 
        'description', 
        'price', 
        'categoria_id', 
        'user_id', 
        'isSold'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
