<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminVideosController extends Controller
{
    public function index() {
        return view('admin.videos.index',[
            'videos' => Video::latest()->get()
        ]);
    }

    public function create() {
        return view('admin.videos.create');
    }

    public function store(Request $request) {
        // Validate the request data
        $attributes = $request->validate([
            'slug' => 'required|unique:videos,slug',
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
    
        Video::create($attributes);
    
        return redirect()->route('admin.videos.index');
    }



    public function edit(Video $video)
    {
        return view('admin.videos.edit', [
            'video' => $video
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Video $video, Request $request)
    {

        $attributes = $request->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('videos', 'slug')->ignore($video->id)],
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

        $video->update($attributes);

        return redirect()->route('admin.videos.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return back();
    }
}
