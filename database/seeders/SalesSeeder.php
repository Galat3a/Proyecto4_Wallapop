<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Categoria;
use App\Models\User;

class SalesSeeder extends Seeder
{
    public function run()
    {
        $categoria = Categoria::first();
        $user = User::first();

        Sale::create([
            'product' => 'Raqueta de tenis',
            'description' => 'Raqueta de tenis en perfecto estado',
            'price' => 15.30,
            'isSold' => false,
            'categoria_id' => $categoria->id,
            'user_id' => $user->id,
        ]);

        Sale::create([
            'product' => 'Lampara de techo',
            'description' => 'Lampara de techo en perfecto estado, color dorado',
            'price' => 60.50,
            'isSold' => false,
            'categoria_id' => $categoria->id,
            'user_id' => $user->id,
        ]);
    }
}