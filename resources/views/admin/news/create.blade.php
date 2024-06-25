<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">Add News</h2>
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form class="mb-8" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="category_id" class="block text-yellow-300 font-bold mb-2">Category</label>
                <select class="text-black w-48 p-1 rounded-lg" name="category_id" id="category_id">
                    <option selected="" disabled="">Select Category</option>
                    @foreach (\App\Models\Category::all() as $category)
                        <option class="text-black" value="{{ $category->id }}"
                            {{ old('category_id', $news->category_id) == $category->id ? 'selected' : '' }}
                            >{{ ucwords( $category->title) }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-4">
                <label for="tag_id" class="block text-yellow-300 font-bold mb-2">Tag</label>
                <select class="text-black w-48 p-1 rounded-lg" name="tag_id" id="tag_id">
                    <option selected="" disabled="">Select Tag</option>
                    @foreach (\App\Models\Tag::all() as $tag)
                        <option class="text-black" value="{{ $tag->id }}"
                            {{ old('tag_id', $news->tag_id) == $tag->id ? 'selected' : '' }}
                            >{{ ucwords( $tag->title) }}</option>
                    @endforeach

                </select>
            </div>
            
            <div class="mb-4">
                <label for="slug" class="block text-yellow-300 font-bold mb-2">Slug</label>
                <input type="text" id="slug" name="slug" placeholder="Enter Slug"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('slug') }}">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-yellow-300 font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter Title"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title') }}">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-yellow-300 font-bold mb-2">Image</label>
                <input type="file" id="image" name="image"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-yellow-300 font-bold mb-2">Description</label>
                <textarea id="description" name="description" placeholder="Enter description"
                    class="resize-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add News
                </button>
            </div>
        </form>
    </div>
</x-admin_layout>