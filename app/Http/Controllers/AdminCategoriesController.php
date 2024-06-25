<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCategoriesController extends Controller
{
    public function index() {
        return view('admin.categories.index',[
            'categories' => Category::latest()->get(),
        ]);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories,slug'
        ]);
    
        Category::create($attributes);
    
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category) {

        return view('admin.categories.edit',[
            'category' => $category
        ]);

    }

    public function update(Category $category) {

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category->id)],
        ]);

        $category->update($attributes);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category) {

        $category->delete();

        return back();

    }
    
}
