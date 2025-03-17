<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $validatedData = $request->validated();

        $user = User::create([
            "name" => $validatedData["name"],
            "username" => Str::slug($validatedData["username"]),
            "email" => $validatedData["email"],
            "password" => Hash::make($validatedData["password"])
        ]);

        return response()->json([
            "message" => "Usuario creado correctamente",
            "data" => $user
        ]);
    }

    public function login(LoginRequest $request) {
        $validatedData = $request->validated();

        $user  = User::where("email", $validatedData["email"])->first();
        
        if (!$user) {
            return response()->json(["message" => "El correo no ha sido registrado"], 401);
        }

        if (!Hash::check($validatedData["password"], $user->password)) {
            return response()->json(["message" => "La contraseña es incorrecta"], 401);
        }

        $token = $user->createToken("authToken")->plainTextToken;
        
        return response()->json(["token" => $token, "user" => $user]);
    }
}
