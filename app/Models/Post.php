<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use App\Models\PostImage;

class Post extends Model
{
    use HasFactory;
    protected $table = 'vtl_post';
    public $timestamps = false;

    public function postimg(): hasMany
    {
        return $this->hasMany(PostImage::class, 'post_id','id');
    }
}
