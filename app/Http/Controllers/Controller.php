<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function about()
    {
        return view('about');
    }

    public function assistant()
    {
        if (Auth::user()->id != 1){
            abort(403);
        }
        $user = User::withTrashed()->Find(2);
        if($user->trashed()){
            $user->restore();
        }else{
            $user->delete();
        }
        return back();
    }
}
