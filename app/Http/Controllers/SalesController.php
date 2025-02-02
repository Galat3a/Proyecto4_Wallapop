<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        // Verificar si hay categorías
        if ($categorias->isEmpty()) {
            $categorias = Categoria::all();
        }
        
        return view('sales.create', compact('categorias'));
    }

    // ...existing code...
}
