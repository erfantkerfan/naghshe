<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
    {
        $articles = Article::where('category_id','=',$id)->get();
        $category = Category::FindOrFail($id);
        $category->hits ++;
        $category->save();
        return view('articles')->with(['articles'=>$articles]);
    }
    function delete($id)
    {
        $category = Category::FindOrFail($id);
        $category->delete();
        return redirect(route('home'));
    }
    public function clear_hits($id)
    {
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
