<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">Edit Program</h2>
        <a href="{{ route('admin.programs.edit',$program->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Return to default</a>
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

        <form class="mb-8" method="POST" action="{{ route('admin.programs.update',$program->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="hidden" name="id" value="{{ $program->id }}">

            <div class="mb-4">
                <label for="slug" class="block text-yellow-300 font-bold mb-2">Slug</label>
                <input type="text" id="slug" name="slug" placeholder="Enter Slug"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $program->slug }}">
            </div>
            <div class="mb-4">
                <label for="programs_name" class="block text-yellow-300 font-bold mb-2">Program name</label>
                <input type="text" id="programs_name" name="programs_name" placeholder="Enter Program name"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $program->programs_name }}">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-yellow-300 font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter Title"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $program->title }}">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-yellow-300 font-bold mb-2">Image</label>
                <input type="file" id="image" name="image"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ asset('images/all_image/' . $program->image) }}">
                
                <br>
                <br>

                <img src="{{ asset('images/all_image/' . $program->image) }}" alt="Product Image" class="rounded-xl max-w-md">

            </div>

                <br>

                <div class="mb-4">
                    <label for="video" class="block text-yellow-300 font-bold mb-2">video</label>
                    <input type="file" id="video" name="video"
                        class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ asset('videos/all_video/' . $program->video) }}">
                    
                    <br>
                    <br>
    
                    <img src="{{ asset('videos/all_video/' . $program->video) }}" alt="Product Image" class="rounded-xl max-w-md">
    
                </div>

                <br>

            <div class="mb-4">
                <label for="description" class="block text-yellow-300 font-bold mb-2">Description</label>
                <textarea id="description" name="description" placeholder="Enter description"
                    class="resize-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $program->description }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Program
                </button>
            </div>
        </form>
    </div>
</x-admin_layout>