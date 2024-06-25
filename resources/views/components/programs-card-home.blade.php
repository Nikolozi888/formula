<div class="overflow-hidden w-80 h-96 flex">
    <img class="w-3/5 h-full object-cover" src="https://via.placeholder.com/400x300" alt="Post Thumbnail">
    <div class="full m-5">
        <h2 class="mt-2 text-xl font-semibold text-white">{{ $program->title }}</h2>
        <h2 class="mt-2 text-xs text-gray-400">{{ $program->description }}</h2>
        <div class="flex items-center justify-between p-2 w-16 bg-red-500 mt-28">
            <a href="{{ route('programs.show',$program->slug) }}" class="text-sm text-white">watch</a>
        </div>
    </div>
</div>