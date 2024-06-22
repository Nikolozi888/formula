<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    public function index() {
        return view('phrase.index',[
            'phrases' => Phrase::latest()->get(),
        ]);
    }

    public function show(Phrase $phrase) {
        return view('phrase.show',[
            'phrases' => Phrase::latest()->get(),
            'phrase' => $phrase,
        ]);
    }
}
