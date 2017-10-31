<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'content', 'image'. 'slug', 'meta_title', 'meta_description', 'view'
    ];
}
