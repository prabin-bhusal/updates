<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Notice;
use App\Policies\NoticePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Notice::class => NoticePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin_authenticated', function ($user) {
            return Request()->routeIs('admin.*') && Auth::guard('admin')->check();
        });

        Gate::define('admin_created_event', function ($user, $event) {
            return isset($event->admin()->id) && Request()->routeIs('admin.*') && Auth::guard('admin')->check();
        });
    }
}
