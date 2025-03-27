<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Esta opción define el "guard" y el "broker" de contraseñas por defecto
    | para tu aplicación. Puedes cambiar estos valores según lo necesites.
    |
    */

    'defaults' => [
        // Mantén 'web' como predeterminado para Blade, pero puedes usar 'api' explícitamente donde lo necesites
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir los "guards" para tu aplicación.
    | Por defecto, tienes configuraciones para sesión (web) y Sanctum (api).
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'sanctum',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Aquí defines cómo se recuperan los usuarios de tu base de datos.
    | Generalmente, usarás Eloquent para esto.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Configuración para el sistema de restablecimiento de contraseñas.
    | Puedes definir la tabla donde se almacenan los tokens, entre otras opciones.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Configuración para el tiempo antes de solicitar nuevamente la confirmación de contraseña.
    |
    */

    'password_timeout' => 10800,

];
