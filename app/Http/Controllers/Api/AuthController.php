<?php

namespace App\Http\Controllers\Api;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Contracts\Services\AuthServiceInterface;

class AuthController extends Controller
{
    /**
     * @param AuthServiceInterface $authService
     */
    public function __construct(
        protected AuthServiceInterface $authService
    ) {}

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $result = $this->authService->register($request->validated());

        return response()->json([
            'data' => new UserResource($result['user']),
            'token' => $result['token'],
        ], Response::HTTP_CREATED);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $token = $this->authService->login($request->only('email', 'password'));

        if (!$token) {
            throw new AuthenticationException('Identifiants invalides');
        }

        return response()->json([
            'token' => $token,
        ]);
    }

    /**
     * @return UserResource
     */
    public function me(): UserResource
    {
        $user = $this->authService->getCurrentUser();

        return new UserResource($user);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return response()->json([
            'message' => 'Déconnexion réussie',
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $token = $this->authService->refresh();

        return response()->json([
            'token' => $token,
        ]);
    }
}
