<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'El Correo Electrónico es obligatorio',
            'email.email' => 'Debes ingresar un correo electrónico válido',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        try {
            $credentials = request(['password']);
            $credentials['email'] = strtolower(request('email'));

            if (!Auth::attempt($credentials)) {
                return response()->json(['error' => 'Usuario o contraseña incorrectos'], 401);
            }

            $user = $request->user();
            $token = $user->createToken('Personal Access Token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request){
        try{
            $request->user()->currentAccessToken()->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Sesión cerrada de forma exitosa!'
        ]);
    }

}
