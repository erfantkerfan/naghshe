<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function home()
    {
        $articles = Article::inRandomOrder()->take(3)->get();
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
        if (Auth::user()->id != 1){
            abort(403);
        }
        $article = Article::FindOrFail($id);
        if($article->file!=null) {
            $file_path = public_path('file/') . $article->id . '.' . $article->file;
            @unlink($file_path);
        }
        $article->delete();
        return redirect(route('home'));
    }
    public function clear_hits($id)
    {
        if (Auth::user()->id != 1){
            abort(403);
        }
        $article = Article::FindOrFail($id);
        $article->hits =100;
        $article->save();
        return back();
    }
    public function form()
    {
        return view('admin.article');
    }
    public function create(Request $request)
    {
        $this->Validate($request, [
            'category' => 'required|integer',
            'title' => 'required|string',
            'summary' => 'required|string',
            'provider' => 'required|string',
        ]);

        if($request->hasFile('file')){
            $file = $request->file('file')->getClientOriginalExtension();
        }else{
            $file = null;
        }

        $article = new Article(array(
            'category_id' => $request->category,
            'title' => $request->title,
            'summary' => $request->summary,
            'provider' => $request->provider,
            'date_time' => Verta::now(),
            'hits' => 100,
            'file' => $file ,
        ));
        $article->save();

        $file_name = $article->id .'.'.$file;
        if($request->hasFile('file')) {
            $request->file('file')->move(public_path('file/'), $file_name);
        }
        return redirect(route('home'));

    }
}
