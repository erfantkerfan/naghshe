<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function home()
    {
        $articles = DB::table('Articles')->inRandomOrder()->limit(5)->get();
        return 'home';
    }

    public function index(Article $article)
    {
        return $article;
    }
}
