<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registro(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombre_usuario' => 'required|string|max:255|unique:users',  
                'email' => 'required|email|unique:users', 
                'password' => 'required|string|min:6',  
                'roles' => 'required|array',  
                'roles.*' => 'exists:roles,nombre_rol', 
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'mensaje' => 'Faltan campos por rellenar o los campos no son válidos',
                'errores' => $e->errors()  
            ], 422);
        }

        if (User::where('nombre_usuario', $request->nombre_usuario)->exists()) {
            return response()->json(['mensaje' => 'El usuario ya está registrado'], 409);
        }
        
        $user = User::create([
            'nombre_usuario' => $request->nombre_usuario, 
            'email' => $request->email, 
            'password' => Hash::make($request->password),
        ]);

        $roles = Role::whereIn('nombre_rol', $request->roles)->get();

        if (!$roles->contains('nombre_rol', 'usuario')) {
            $usuarioRol = Role::where('nombre_rol', 'usuario')->first();
            if ($usuarioRol) {
                $roles->push($usuarioRol); 
            }
        }

        $user->roles()->attach($roles);

        return response()->json([
            'message' => 'Usuario registrado con éxito.',
            'user' => $user,
            'roles' => $roles->pluck('nombre_rol'), 
        ], 201);
    }

    /**
     * Login de un usuario.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nombre_usuario' => 'required|string',  
            'password' => 'required|string',
        ]);

        $user = User::where('nombre_usuario', $request->nombre_usuario)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'token' => $token,
            'user' => $user,
            'roles' => $user->roles->pluck('nombre_rol'),  
        ], 200);
    }

    /**
     * Logout del usuario.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
    }
}
