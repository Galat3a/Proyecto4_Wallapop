<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function destroy(Image $image)
    {
        $image->delete();
        return back()->with('success', 'Imagen eliminada exitosamente.');
    }
}
