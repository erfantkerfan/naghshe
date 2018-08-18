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

    public function __construct()
    {
        if (env('APP_SECURE')) {
            if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off") {
                $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//                header('HTTP/1.1 301 Moved Permanently');
                header('Location: ' . $redirect);
                exit();
            }
        }
    }
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
