<?php
    /*
    |--------------------------------------------------------------------------
    | Default Site Settings
    |--------------------------------------------------------------------------
    */
	return [
		'menus' => [
			'primary',
		],
        'menus_max_depth' => 3,
		'permissions' => [
            'Pages' =>[
                'View Pages' => 'viewPages',
                'Add Pages' =>'addPages',
                'Update Pages' =>'updatePages',
                'Delete Pages' =>'deletePages',
            ],
            'Menus' => [
                'View Menus' =>'viewMenus',
                'Add Menus' =>'addMenus',
                'Update Menus' =>'updateMenus',
                'Delete Menus' =>'deleteMenus',
            ],
            'Users' => [
                'View Users' =>'viewUsers',
                'Add Users' =>'addUsers',
                'Update Users' =>'updateUsers',
                'Delete Users' =>'deleteUsers',
            ],            
            'Roles' => [
                'View Roles' =>'viewRoles',
                'Add Roles' =>'addRoles',
                'Update Roles' =>'updateRoles',
                'Delete Roles' =>'deleteRoles',
            ],
            'Dashboard & Settings' => [
                'Access Settings' =>'accessSettings',
                'Access Dashboard' =>'accessDashboard',
            ],
        ],
        'settings' => [
            'general' => [
                'site_name' => env('APP_NAME', 'Laravel App'),
                'site_title' => env('APP_NAME', 'Laravel App'),
            ],
            'registration' => [
                'default_role' => 'Admin',
                'email_verification_on_reg' => 1,
                'allow_registrstion' => 1,
                'allow_forget_password' => false,
            ],
        ],
	];