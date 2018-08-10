<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public function hits()
    {
        return $this->hasMany(Article::class)->sum('hits');

    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
