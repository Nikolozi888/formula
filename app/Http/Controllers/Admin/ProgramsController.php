<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProgramsController extends Controller
{
    public function index() {
        return view('admin.programs.index',[
            'programs' => Programs::latest()->get()
        ]);
    }

    public function create() {
        return view('admin.programs.create');
    }

    public function store(Request $request) {
        // Validate the request data
        $attributes = $request->validate([
            'programs_name' => 'required',
            'slug' => 'required|unique:programs,slug',
            'title' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'sometimes|mimes:mp4,avi,mkv|max:20480',
            'description' => 'required',
        ]);
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = date('YmdHi').$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/all_image'), $imageName);
            $attributes['image'] = $imageName;
        }
    
        // Handle the video upload
        if ($request->hasFile('video')) {
            $videoName = date('YmdHi').$request->file('video')->getClientOriginalName();
            $request->video->move(public_path('videos/all_video'), $videoName);
            $attributes['video'] = $videoName;
        }
    
        Programs::create($attributes);
    
        return redirect()->route('admin.programs.index');
    }



    public function edit(Programs $program)
    {
        return view('admin.programs.edit', [
            'program' => $program
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Programs $program, Request $request)
    {

        $attributes = $request->validate([
            'programs_name' => 'required',
            'title' => 'required',
            'slug' => ['required', Rule::unique('programs', 'slug')->ignore($program->id)],
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'sometimes|mimes:mp4,avi,mkv|max:20480',
        ]);

        // image 
        if ($request->hasFile('image')) {
            $imageName = date('YmdHi').$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/all_image'), $imageName);
            $attributes['image'] = $imageName;
        }

        // video
        if ($request->hasFile('video')) {
            $videoName = date('YmdHi').$request->file('video')->getClientOriginalName();
            $request->video->move(public_path('videos/all_video'), $videoName);
            $attributes['video'] = $videoName;
        }

        $program->update($attributes);

        return redirect()->route('admin.programs.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programs $program)
    {
        $program->delete();

        return back();
    }
    
}
