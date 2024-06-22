<a href="/phrase/{{ $phrase->slug }}">

    <div class="overflow-hidden px-6 py-4 w-68 bg-gray-100 h-48 rounded-lg">
        <span class="text-xs text-gray-500">{{ $phrase->created_at->diffForHumans() }}</span>
        <h1 class="text-base mb-2 text-black">{{ $phrase->title }}</h1>
        <div class="flex items-center">
            <img class="w-16 rounded-full" src="{{ asset('images/all_image/' . $phrase->author_image) }}" alt="">
            <span class="text-sm text-gray-600">{{ $phrase->author_name }}</span>
        </div>
        <br>
        <div class="flex items-center">

            @admin
                <a href="/admin/phrases/{{ $phrase->id }}/edit" class="bg-yellow-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                
                <form action="/admin/phrases/{{ $phrase->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-5">Delete</button>
                
                </form>
                                
            @endadmin

        </div>
    </div>

</a>