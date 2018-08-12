<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'category_id', 'title', 'summary', 'provider','date_time','file','hits',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
