<a href="{{ route('programs.show',$program->slug) }}">

    <div class="overflow-hidden w-48 h-96">
        <img class="w-full h-3/5 object-cover" src="{{ asset('images/all_image/' . $program->image) }}" alt="Post Thumbnail">
        <div class="p-4">
            <h2 class="text-base font-semibold text-white">{{ $program->title }}</h2>
        </div>

        <div class="flex">

            @admin
            <a href="{{ route('admin.programs.edit',$program->id) }}" class="bg-yellow-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
            
            <form action="{{ route('admin.programs.destroy',$program->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-5">Delete</button>
            
            </form>
                            
            @endadmin

        </div>
    </div>

</a>