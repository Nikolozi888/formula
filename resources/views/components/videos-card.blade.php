<a href="/video/{{ $video->slug }}">

    <div class="overflow-hidden w-72">
        <img class="w-full h-48 object-cover" src="{{ asset('images/all_image/' . $video->image) }}" alt="Post Thumbnail">
        <div class="p-4">
            <div class="flex items-center justify-between">
                <span class="text-xs text-white">{{ $video->created_at->diffForHumans() }}</span>
            </div>
            <h2 class="mt-2 text-base font-semibold text-white">{{ $video->title }}</h2>

            <div class="flex">

                @admin
                <a href="/admin/videos/{{ $video->id }}/edit" class="bg-yellow-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                
                <form action="/admin/videos/{{ $video->id }}" method="POST">
                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-5">Delete</button>
                
                </form>
                                
                @endadmin
    
            </div>
        </div>
    </div>

</a>