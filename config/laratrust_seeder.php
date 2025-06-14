<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'plants' => 'c,r,u,d',
            'diseases' => 'c,r,u,d',
            'diagnostics' => 'c,r,u,d',
            'recommendations' => 'c,r,u,d',
            'statistics' => 'r',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
            'system_settings' => 'r,u',
        ],
        'expert' => [
            'plants' => 'r,u',
            'diseases' => 'r,u',
            'diagnostics' => 'c,r,u',
            'recommendations' => 'c,r,u',
            'statistics' => 'r',
            'profile' => 'r,u',
        ],
        'technician' => [
            'plants' => 'r',
            'diagnostics' => 'c,r,u',
            'recommendations' => 'r',
            'profile' => 'r,u',
        ],
        'user' => [
            'diagnostics' => 'c,r',
            'recommendations' => 'r',
            'profile' => 'r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',    // créer
        'r' => 'read',      // lire/voir
        'u' => 'update',    // modifier
        'd' => 'delete',    // supprimer
    ],
];
