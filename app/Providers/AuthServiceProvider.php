<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Défini l'utilisateur en tant qu' administrateur à partir du boolén de la ta ble User
        Gate::define('admin', function (User $user) {

            return $user->admin === 1;

        });

        // Autorisation majeur
        // Gate::define('majeur', function (User $user) {
        //     $age = date('Y') - intval(substr($user->datenais, 4, 4));

        //     return $age >= 18;
        // });

        // Autorisation abonnement
        // Gate::define('abonnement', function (User $user) {

        //     return date("Y-m-d H:i:s") <= $user->abonnement ;

        // });
    }
}
