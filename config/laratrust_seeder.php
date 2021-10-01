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
        'super_admin' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'matches' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'matches' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
