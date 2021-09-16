<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(195);
        Gate::define('market', function (User $user) {
            return $user->type == 'market';
        });
        Gate::define('company', function (User $user) {
            return $user->type == 'company';
        });
        Gate::define('sales', function (User $user) {
            return $user->type == 'sales';
        });
    }
}
