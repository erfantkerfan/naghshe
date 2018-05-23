<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function hits()
    {
        return $this->hasMany(Article::class)->sum('hits');

    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
