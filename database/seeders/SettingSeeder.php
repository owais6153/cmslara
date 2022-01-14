<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'general' => [
                'site_name' => env('APP_NAME', 'Laravel App'),
                'site_title' => env('APP_NAME', 'Laravel App'),
            ],
            'registration' => [
                'default_role' => 'Admin',
                'email_verification_on_reg' => 1,
                'allow_registrstion' => 1,
                'allow_forget_password' => 1,
            ]
        ];

        foreach ($settings as $key => $setting_V){
            $setting = new Settings();
            $setting->name = $key;
            $setting->value = serialize($setting_V);
            $setting->save();
        }
    }
}
