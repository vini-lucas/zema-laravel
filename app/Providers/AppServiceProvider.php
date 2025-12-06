<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        // Super Admin que possui acesso à todas as páginas
        Gate::before(function ($user, $ability) {
        return $user->hasRole('Desenvolvedor') ? true : null;
    });
    }
}
