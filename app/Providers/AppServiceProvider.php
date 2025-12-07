<?php

namespace App\Providers;

use App\Contracts\Repositories\MemberPartnerRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\PartnerRepositoryInterface;
use App\Contracts\Services\AuthServiceInterface;
use App\Contracts\Services\PartnerServiceInterface;
use App\Repositories\MemberPartnerRepository;
use App\Repositories\UserRepository;
use App\Repositories\PartnerRepository;
use App\Services\AuthService;
use App\Services\PartnerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
        $this->app->bind(MemberPartnerRepositoryInterface::class, MemberPartnerRepository::class);

        // Services
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(PartnerServiceInterface::class, PartnerService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
