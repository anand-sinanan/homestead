<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Billing\Stripe;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //perform any action or logic with the assumption that it's fully loaded (kind of like pre-execute?)
        view()->composer('layout.sidebar', function ($view){   // has to be name of the view
          $view->with('archives', \App\Post::archives());       //pass variables just like in return views for controller
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Use register to implement service providers (don't put in web.php)

        //Service Provider example (used bind() but use singleton() to reuse the one instance of class)
        //\App::singleton('App\Billing\Stripe', function() {
        //  return new \App\Billing\Stripe(config('services.stripe.secret'));

        //} );

        //becomes
        $this->app->singleton(Stripe::class, function() {
         return new Stripe(config('services.stripe.secret'));

        } );
    }
}
