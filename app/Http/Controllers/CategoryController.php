<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index($id)
    {
        $articles = Article::where('category_id','=',$id)->orderby('date_time','desc')->get();
        $category = Category::FindOrFail($id);
        $category->hits ++;
        $category->save();
        return view('articles')->with(['articles'=>$articles]);
    }
    function delete($id)
    {
        if (Auth::user()->id != 1){
            abort(403);
        }
        $category = Category::FindOrFail($id);
        $articles = Article::where('category_id','=',$id)->get();
        foreach ($articles as $article){
            if($article->file!=null) {
                $file_path = public_path('file/') . $article->id . '.' . $article->file;
                @unlink($file_path);
            }
            $article->delete();
        }
        $category->delete();
        return redirect(route('home'));
    }
    public function clear_hits($id)
    {
        if (Auth::user()->id != 1){
            abort(403);
        }
        $category = Category::FindOrFail($id);
        $category->hits =100;
        $category->save();
        return back();
    }

    public function form()
    {
        return view('admin.category');
    }

    public function create(Request $request)
    {
        $this->Validate($request, [
            'name' => 'required|string',
        ]);
        Category::create([
            'name' => $request->name,
            'hits' => 100,
        ]);
        return redirect(route('home'));

    }
}
