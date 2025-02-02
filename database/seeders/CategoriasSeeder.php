<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        Categoria::create(['name' => 'Coches']);
        Categoria::create(['name' => 'Hogar']);
        Categoria::create(['name' => 'Jardín']);
        Categoria::create(['name' => 'Moda']);
        Categoria::create(['name' => 'Accesorios']);
        Categoria::create(['name' => 'Deporte']);
    }
}