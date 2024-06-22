<x-layout>
    <div class="bg-gray-900 flex justify-center items-center">
        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-center">
                <!-- Main Content -->
                <div class="w-2/5">
                    <video class="w-full h-80 object-cover mb-4" controls>
                        <source src="{{ asset('videos/all_video/' . $video->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p class="text-white text-lg leading-relaxed">{{ $video->title }}</p>
                    <br>
                    <hr>
                    <br>
                    <p class="text-gray-500 text-base leading-relaxed">{{ $video->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-gray-900 h-screen container mx-auto px-36 py-8">
        <h1 class="text-2xl text-white">სხვა ვიდეოები</h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($videos as $key => $videoItem)
                @if($videoItem->id !== $video->id)
                    <x-videos-card :video="$videoItem" />
                @endif
            @endforeach
            <!-- Repeat post cards as needed -->
        </div>
    </section>
</x-layout>
