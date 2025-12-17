<?php

namespace App\Contracts\Services;

use App\Models\User;

interface AuthServiceInterface
{
    /**
     *
     * @param array $data
     * @return array ['user' => User, 'token' => string]
     */
    public function register(array $data): array;

    /**
     *
     * @param array $credentials
     * @return string|null
     */
    public function login(array $credentials): ?string;

    /**
     *
     * @return User|null
     */
    public function getCurrentUser(): ?User;

    /**
     *
     * @return void
     */
    public function logout(): void;

    /**
     *
     * @return string
     */
    public function refresh(): string;
}
