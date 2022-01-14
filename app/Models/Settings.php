<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Settings extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='settings';
    protected $softDelete = true;

    public function get($name)
    {
        $data  = Settings::where('name', '=', $name)->first();
        $settings = (isset($data->value) && $data->value != null) ? unserialize($data->value) : array();
        return $settings;
    }
}
