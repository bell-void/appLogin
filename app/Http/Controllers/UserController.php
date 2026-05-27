<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Muestra el formulario con la lista de carreras
    public function create()
    {
        $careers = Career::all();

        return view("register", compact("careers"));
    }

    // Procesa el registro del usuario
    public function store(Request $request)
    {
        // 1. Validar los datos
        $validatedData = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users',
            'password'       => 'required|min:8|confirmed',
            'career_id'      => 'required|exists:careers,id',
            'terms_accepted' => 'accepted',
        ]);

        // 2. Crear el usuario
        User::create([
            'name'               => $validatedData['name'],
            'email'              => $validatedData['email'],
            'password'           => Hash::make($validatedData['password']),
            'career_id'          => $validatedData['career_id'],
            'terms_accepted'     => true,

            // Verificación automática
            'email_verified_at'  => now(),
        ]);

        // 3. Redirección final
        return redirect()->route('register')
            ->with('success', 'Usuario registrado exitosamente');
    }
}