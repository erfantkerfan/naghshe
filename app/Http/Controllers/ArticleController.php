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
        $articles = DB::table('Articles')->where('deleted_at','=',null)->inRandomOrder()->limit(5)->get();
        return view('home')->with(['articles'=>$articles]);
    }
    public function index($id)
    {
        $article = Article::FindOrFail($id);
        $article->hits ++;
        $article->save();
        return view('article')->with(['article'=>$article]);
    }
    function delete($id)
    {
    $article = Article::FindOrFail($id);
    $article->delete();
    return redirect(route('home'));
    }
    public function clear_hits($id)
    {
        $article = Article::FindOrFail($id);
        $article->hits =100;
        $article->save();
        return back();
    }
}
