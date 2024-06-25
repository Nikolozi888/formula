<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.news.index',[
            'news' => News::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(News $news)
    {
        return view('admin.news.create',[
            'news' => $news
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new News instance
        $news = new News();
    
        // Validate the request data
        $attributes = $request->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('news', 'slug')],
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'tag_id' => ['required', Rule::exists('tags', 'id')],
        ]);
    
        // Handle image upload
        $imageName = date('YmdHi').$request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images/all_image'), $imageName);
    
        // Set the image name in attributes
        $attributes['image'] = $imageName;
    
        // Create the news record
        News::create($attributes);
    
        // Redirect to the news index page
        return redirect()->route('admin.news.index');
    }
    

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Product $product)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(News $news)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('news', 'slug')->ignore($news->id)],
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'tag_id' => ['required', Rule::exists('tags', 'id')],
        ]);

        // Update attributes
        $news->update($attributes);

        // Handle thumbnail update if provided
        if (request()->hasFile('image')) {
            $imageName = date('YmdHi') . request()->file('image')->getClientOriginalName();
            request()->file('image')->move(public_path('images/all_image'), $imageName);
            $news->image = $imageName;
            $news->save();
        }

        return redirect()->route('admin.news.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return back();
    }
}