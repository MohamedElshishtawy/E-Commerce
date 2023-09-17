<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Authorizations;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("add-product", function(User $user, ){
            $auth_id = $user->authorization()->where("user_id" , $user->id)->first()->auth_id;
            $auth_title = \App\Models\Authorizations::find($auth_id)->first()->title;
            if ( $auth_title == "add-product"){
                return true;
            }

        });
    }
}
