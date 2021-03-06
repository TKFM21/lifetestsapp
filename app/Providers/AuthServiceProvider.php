<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 開発者のみ許可
        Gate::define('system-only', function ($user) {
            return ($user->role_id == 1);
        });
        // 管理者以上（管理者＆システム管理者）に許可
        Gate::define('admin-higher', function ($user) {
            return ($user->role_id > 0 && $user->role_id <= 3);
        });
        // 承認者以上（管理者＆システム管理者＆承認者）に許可
        Gate::define('shounin-higher', function ($user) {
            return ($user->role_id > 0 && $user->role_id <= 5);
        });
        // 確認者以上（管理者＆システム管理者＆承認者＆確認者）に許可
        Gate::define('kakunin-higher', function ($user) {
            return ($user->role_id > 0 && $user->role_id <= 7);
        });
        // 作業ユーザ以上に許可
        Gate::define('worker-higher', function ($user) {
            return ($user->role_id > 0 && $user->role_id <= 9);
        });
        // Guestユーザ以上（つまり全権限）に許可
        Gate::define('user-higher', function ($user) {
            return ($user->role_id > 0 && $user->role_id <= 10);
        });
    }
}
