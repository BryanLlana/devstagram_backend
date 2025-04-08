<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\wall\WallController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get("/wall/{user:username}", [WallController::class, "index"])
        ->missing(function () {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        });

    Route::post("/post/create", [PostController::class, "store"]);
});
