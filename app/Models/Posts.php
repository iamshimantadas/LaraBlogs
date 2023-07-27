<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $primaryKey = "postid";
    const CREATED_AT = 'post_created_at';
    const UPDATED_AT = 'post_updated_at';
}
