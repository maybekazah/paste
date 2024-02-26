<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Abstract\IPasteService;
use App\Services\Abstract\IUserService;
use App\Services\PasteService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings =[
        IPasteService::class => PasteService::class,
        IUserService::class => UserService::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
