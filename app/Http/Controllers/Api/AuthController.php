<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        $token = auth()->fromUser($user);

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Identifiants invalides'
            ], 401);
        }

        return response()->json([
            'token' => $token,
        ]);
    }

    public function me(): JsonResponse
    {
        return response()->json(new UserResource(auth()->user()));
    }

    public function logout() : JsonResponse
    {
        auth()->logout();
        return response()->json([
            'message' => 'Déconnexion réussie',
        ]);
    }

    public function refresh(): JsonResponse
    {
        return response()->json([
            'token' => auth()->refresh(),
        ]);
    }
}
