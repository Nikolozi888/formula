<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">Edit Phrase</h2>
        <a href="{{ route('admin.phrases.edit',$phrase->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Return to default</a>
        <br>
        <br>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mb-8" method="POST" action="{{ route('admin.phrases.update',$phrase->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="hidden" name="id" value="{{ $phrase->id }}">

            <div class="mb-4">
                <label for="slug" class="block text-yellow-300 font-bold mb-2">Slug</label>
                <input type="text" id="slug" name="slug" placeholder="Enter Slug"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $phrase->slug }}">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-yellow-300 font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter Title"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $phrase->title }}">
            </div>
            <div class="mb-4">
                <label for="author_image" class="block text-yellow-300 font-bold mb-2">Author Image</label>
                <input type="file" id="author_image" name="author_image"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ asset('images/all_image/' . $phrase->author_image) }}">
                
                <br>
                <br>

                <img src="{{ asset('images/all_image/' . $phrase->author_image) }}" alt="Product Image" class="rounded-xl max-w-md">

            </div>
                <br>

            <div class="mb-4">
                <label for="author_name" class="block text-yellow-300 font-bold mb-2">Author Name</label>
                <input type="text" id="author_name" name="author_name" placeholder="Enter Author Name"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $phrase->author_name }}">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-yellow-300 font-bold mb-2">Description</label>
                <textarea id="description" name="description" placeholder="Enter description"
                    class="resize-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $phrase->description }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Phrase
                </button>
            </div>
        </form>
    </div>
</x-admin_layout>