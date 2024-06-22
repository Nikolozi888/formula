<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Phrase;
use App\Models\Programs;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            'news' => News::orderBy('created_at', 'asc')->take(4)->get(),
            'videos' => Video::orderBy('created_at', 'asc')->take(4)->get(),
            'phrases' => Phrase::orderBy('created_at', 'asc')->take(3)->get(),
            'programs' => Programs::orderBy('created_at', 'asc')->take(3)->get(),
        ]);      
    }
}
