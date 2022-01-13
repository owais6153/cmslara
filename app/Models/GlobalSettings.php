<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalSettings extends Model
{

    protected $settings;
    protected $keyValuePair;

    public function __construct( $settings)
    {
        $this->settings = $settings;
        foreach ($settings as $setting){
            $this->keyValuePair[$setting->name] = unserialize($setting->value);
        }
    }


    public function get(string $type){
        if (isset($this->keyValuePair[$type])) {
            return $this->keyValuePair[$type];
        }
        return false;
    }
    public function getValue(string $type, $key){
        if (isset($this->keyValuePair[$type])) {
            return $this->keyValuePair[$type][$key];
        }
        return false;
    }
}
