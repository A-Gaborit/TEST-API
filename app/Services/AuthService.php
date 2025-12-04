<?php

namespace App\Services;

use App\Contracts\Services\AuthServiceInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;

class AuthService implements AuthServiceInterface
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}

    /**
     * {@inheritDoc}
     */
    public function register(array $data): array
    {
        $user = $this->userRepository->create($data);
        $token = auth()->fromUser($user);

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function login(array $credentials): ?string
    {
        $token = auth()->attempt($credentials);

        return $token ?: null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentUser(): ?User
    {
        return auth()->user();
    }

    /**
     * {@inheritDoc}
     */
    public function logout(): void
    {
        auth()->logout();
    }

    /**
     * {@inheritDoc}
     */
    public function refresh(): string
    {
        return auth()->refresh();
    }
}
