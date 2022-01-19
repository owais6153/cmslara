<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use SoftDeletes;
    protected $table='categories';
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
    // protected $softDelete = true;
    use HasFactory;
    public function blogs()
    {
        return $this->belongsToMany(BLog::class, 'blogs_cats', 'cat_id', 'blog_id');
    }
}
