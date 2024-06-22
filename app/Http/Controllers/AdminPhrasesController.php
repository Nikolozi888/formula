<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPhrasesController extends Controller
{
    public function index() {
        return view('admin.phrases.index',[
            'phrases' => Phrase::latest()->get(),
        ]);
    }

    public function create() {
        return view('admin.phrases.create');
    }

    public function store(Request $request) {

        $attributes = $request->validate([
            'slug' => ['required', Rule::unique('phrases', 'slug')],
            'author_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'author_name' => 'required',
            'description' => 'required',
        ]);

        $imageName = date('YmdHi').$request->file('author_image')->getClientOriginalName();  

        $attributes['author_image'] = $request->author_image->move(public_path('images/all_image'), $imageName);

        $attributes['author_image'] = $imageName;

        Phrase::create($attributes);

        return redirect('/admin/phrases');

    }

    public function edit(Phrase $phrase)
    {
        return view('admin.phrases.edit', [
            'phrase' => $phrase
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phrase $phrase)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'slug' => ['required', Rule::unique('phrases', 'slug')->ignore($phrase->id)],
            'description' => 'required',
            'author_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the phrase attributes
        $phrase->update($attributes);

        // Handle author image update if provided
        if ($request->hasFile('author_image')) {
            $imageName = date('YmdHi') . $request->file('author_image')->getClientOriginalName();
            $request->file('author_image')->move(public_path('images/all_image'), $imageName);
            $phrase->author_image = $imageName;
            $phrase->save();
        }

        return redirect('/admin/phrases');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phrase $phrase)
    {
        $phrase->delete();

        return back();
    }
}
