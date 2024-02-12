<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class UserView extends Controller
{
    //
    public function home()
    {
        $news = News::orderBy('created_at', 'desc')->limit(5)->get();
        // dd($news);
        return view("home", ['news' => $news]);
    }
}
