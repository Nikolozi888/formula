<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    public function index() {
        return view('admin.tags.index',[
            'tags' => Tag::latest()->get(),
        ]);
    }

    public function create() {
        return view('admin.tags.create');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'title' => 'required',
        ]);
    
        Tag::create($attributes);
    
        return redirect()->route('admin.tags.index');
    }

    public function edit(Tag $tag) {

        return view('admin.tags.edit',[
            'tag' => $tag
        ]);

    }

    public function update(Tag $tag) {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $tag->update($attributes);

        return redirect()->route('admin.tags.index');
    }

    public function destroy(Tag $tag) {

        $tag->delete();

        return back();

    }
}
