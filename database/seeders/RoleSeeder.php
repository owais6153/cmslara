<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Bouncer;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =[
            'viewUsers',
            'addUsers',
            'updateUsers',
            'deleteUsers',
            'viewRoles',
            'addRoles',
            'updateRoles',
            'deleteRoles',
            'accessSettings',
            'accessDashboard',
        ];

        foreach($permissions as $per){
           Bouncer::allow('Admin')->to($per);
        }
    }
}

