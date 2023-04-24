<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\Paginator;
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
        

        view()->composer('user.header', function ($view) {
            $user = auth()->user();
            $count = 0;
            if ($user) {
                $count = Cart::where('email', $user->email)->count();
            }
            $view->with('cartCount', $count);
        });

        Paginator::useBootstrap();
    }
}
