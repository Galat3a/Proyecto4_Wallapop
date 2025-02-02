<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->filled('name')) {
            $user->name = $request->name;

        }
        
        if ($user->email !== $request->email) {
            $user->email = $request->email;
        }

        $user->save();//funciona

        if ($user->email_verified_at == null) {
            return redirect()->route('home')->with('status', 'Perfil editado correctamente. Verifica tu EMAIL')->withErrors(['status' => 'Ya no estas verificado']);
        }

        return redirect()->route('home')->with('status', 'Perfil editado correctamente.');
    }

    /*
    unction update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ]);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator->getMessageBag());
        }
        $user = $request->user();
        try {
            if($request->email != $user->email) {
                $user->email_verified_at = null;
            }
            $user->update($request->all());
            return redirect('home/profile')->with(['message' => 'User edited.']);
        } catch(\Exception $e) {
            return redirect('home/profile')->with(['message' => 'User not edited.']);
        }
    }
    */ 




    //CAMBIO DE CONTRASEÑA
    public function changePassword()
    {
        return view('profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {//si falla
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if (!Hash::check($request->current_password, $user->password)) {
           
            return redirect()->back()->withErrors(['current_password' => 'La contraseña es erronea'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('status', 'Contraseña actualizada.');
    }
     /*
            function password(Request $request) {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator->getMessageBag());
        }
        $oldpassword = $request->oldpassword;
        $user = $request->user();
        if (password_verify($oldpassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('home/profile')->with(['message' => 'User password changed.']);
        }
        return redirect('home/profile')->with(['message' => 'User password not edited because old password is not correct.']);
    }*/ 
    
}
