<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function index() {
        return view('programs.index',[
            'programs' => Programs::latest()->get(),
        ]);
    }

    public function show(Programs $program) {
        $relatedEpisodes = Programs::where('programs_name', $program->programs_name)->get();

        return view('programs.show', [
            'program' => $program,
            'episodes' => $relatedEpisodes
        ]);
    }


}
