<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function edit(Setting $setting)
    {
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'maxImages' => 'required|integer|min:1',
        ]);

        $setting->update([
            'name' => $request->name,
            'maxImages' => $request->maxImages,
        ]);

        return redirect()->route('settings.index')->with('success', 'Configuración actualizada exitosamente.');
    }
}
