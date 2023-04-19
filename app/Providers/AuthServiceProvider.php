<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Articulo::class => ArticuloPolicy::class,
        Proveedor::class => ProveedorPolicy::class,
        TipoArticulo::class => TipoArticuloPolicy::class,
        UnidadMedida::class => UnidadMedida::class,
        Auxiliar::class => AuxiliarPolicy::class,
        Odontologo::class => OdontologoPolicy::class,
        Recepcionistar::class => RecepcionistarPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
