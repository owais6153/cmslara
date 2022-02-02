<?php
    /*
    |--------------------------------------------------------------------------
    | Default Site Settings
    |--------------------------------------------------------------------------
    */
	return [
		'menus' => [
			'Primary' => 'primary',
		],
		'permissions' => [
            'Pages' =>[
                'View Pages' => 'viewPages',
                'Add Pages' =>'addPages',
                'Update Pages' =>'updatePages',
                'Delete Pages' =>'deletePages',
            ],
            'Menus' => [
                'View Menus' =>'viewMenus',
                'Add Menus' =>'addMenus'
            ],
            'Blogs' => [
                'View Blogs' =>'viewBlogs',
                'Add Blogs' =>'addBlogs',
                'Update Blogs' =>'updateBlogs',
                'Delete Blogs' =>'deleteBlogs',
            ],
            'Categories' => [
                'View Categories' =>'viewCategories',
                'Add Categories' =>'addCategories',
                'Update Categories' =>'updateCategories',
                'Delete Categories' =>'deleteCategories',
            ],
            'Users' => [
                'View Users' =>'viewUsers',
                'Add Users' =>'addUsers',
                'Update Users' =>'updateUsers',
                'Delete Users' =>'deleteUsers',
                'Change User Role' =>'changeUserRole',
                'Edit Itself' =>'editItself',

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
            'Notifications' => [
                'Allow Sending Notifications' =>'allowNotifications',
            ],
        ],
        'settings' => [
            'general' => [
                'site_name' => env('APP_NAME', 'Laravel App'),
                'site_title' => env('APP_NAME', 'Laravel App'),
                'home_page' => 'default',
            ],
            'registration' => [
                'default_role' => 'Admin',
                'email_verification_on_reg' => 1,
                'allow_registrstion' => 1,
                'allow_forget_password' => false,
            ],
            'email' => [
                'MAIL_MAILER' => env('MAIL_MAILER'),
                'MAIL_HOST' => env('MAIL_HOST'),
                'MAIL_PORT' => env('MAIL_PORT'),
                'MAIL_USERNAME' => env('MAIL_USERNAME'),
                'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
                'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
                'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
                'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
            ],
        ],
        // Firebase
        'apiKey' => "AIzaSyChBiRb-muGHgmq1-tT4UffmjcjvRk6IUs",
        'authDomain' => "erba-quest.firebaseapp.com",
        'projectId' => "erba-quest",
        'storageBucket' => "erba-quest.appspot.com",
        'messagingSenderId' => "364135749212",
        'appId' => "1:364135749212:web:a2885f5a12e0a497b33899",
        'measurementId' => "G-Y2C4SP9G3W",
        'vapidKey' => 'BDzBOuNcaScRhWa2dBfCS_7mQoNaKRs1nx2NpyUu7TE9RXo1unhMygz3IrPI4FpAgEnnFAUxPoFtgv9XRxHuoxo',
        'databaseURL' => 'https://project-id.firebaseio.com'
	];