<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">Edit Tag</h2>
        <a href="{{ route('admin.tags.edit',$tag->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Return to default</a>
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

        <form class="mb-8" action="{{ route('admin.tags.update',$tag->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <input type="hidden" name="id" value="{{ $tag->id }}">
            
            <div class="mb-4">
                <label for="title" class="block text-yellow-300 font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter New Category Name"
                class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $tag->title }}">
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Tag
                </button>
            </div>
        </form>
    </div>
</x-admin_layout>