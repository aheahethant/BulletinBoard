<?php

namespace App\Providers;

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
        //Dao Registration
        $this->app->bind('App\Contracts\Dao\Post\PostDaoInterface', 'App\Dao\Post\PostDao');
        $this->app->bind('App\Contracts\Dao\User\UserDaoInterface', 'App\Dao\User\UserDao');
        $this->app->bind('App\Contracts\Dao\API\PostAPIDaoInterface', 'App\Dao\API\PostAPIDao');
        $this->app->bind('App\Contracts\Dao\API\UserAPIDaoInterface', 'App\Dao\API\UserAPIDao');

        //Services Registration
        $this->app->bind('App\Contracts\Services\Post\PostServiceInterface', 'App\Services\Post\PostService');
        $this->app->bind('App\Contracts\Services\User\UserServiceInterface', 'App\Services\User\UserService');
        $this->app->bind('App\Contracts\Services\API\PostAPIServiceInterface', 'App\Services\API\PostAPIService');
        $this->app->bind('App\Contracts\Services\API\UserAPIServiceInterface', 'App\Services\API\UserAPIService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
