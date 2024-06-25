<x-layout>
    <div class="bg-gray-900 flex justify-center items-center">
        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-center">
                <!-- Main Content -->
                <div class="w-2/5">
                    <video class="w-full h-80 object-cover mb-4" controls>
                        <source src="{{ asset('videos/all_video/' . $program->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p class="text-white text-lg leading-relaxed">{{ $program->title }}</p>
                </div>
            </div>
            <br>
            <hr>
        </div>
    </div>

    <section class="bg-gray-900 container mx-auto px-36 py-8">
        <h1 class="text-2xl text-white">სხვა ეპიზოდები</h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($episodes as $key => $episode)
                @if($episode->id !== $program->id)
                    <a href="{{ route('programs.show',$episode->id) }}">
                        <div class="overflow-hidden w-72">
                            <img class="w-full h-48 object-cover" src="{{ asset('images/all_image/' . $episode->image) }}" alt="Post Thumbnail">
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-white">{{ $episode->created_at->diffForHumans() }}</span>
                                </div>
                                <h2 class="mt-2 text-base font-semibold text-white">{{ $episode->title }}</h2>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </section>
</x-layout>
