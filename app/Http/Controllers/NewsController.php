<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index() {
        return view('news.index',[
            'news' => News::orderBy('created_at', 'asc')->take(4)->get(),   
        ]);
    }

    public function show(News $post) {
        return view('news.show',[
            'post' => $post,
            'news' => News::orderBy('created_at', 'asc')->take(4)->get(),
        ]);
    }

}
