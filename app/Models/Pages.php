<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='pages';
    protected $softDelete = true;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'template',
        'description',
        'short_description',
        'user_id',
    ];
    public function author(){
        return $this->hasOne(User::class,'id', 'user_id' );
    }
}
