<x-layout>

    <section class="bg-gray-900 h-screen container mx-auto px-36 py-8">

        <h1 class="text-2xl text-white">ვიდეო</h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($videos as $video)
                <x-videos-card :video="$video" />
            @endforeach
            
            <!-- Repeat post cards as needed -->
        </div>

    </section>

</x-layout>