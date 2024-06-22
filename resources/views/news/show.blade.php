<x-layout>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap mx-4">
            <!-- Main Content -->
            <div class="w-2/5">
                <div class="flex">
                    <p class="bg-red-700 text-white m-1 p-1 font-semibold text-sm rounded-sm"><a href="/categories/{{ $post->category->slug }}">{{ $post->category->title }}</a></p>
                    <p class="bg-black font-semibold text-white m-1 p-1 text-sm rounded-sm"><a href="/tags/{{ $post->tag->title }}">{{ $post->tag->title }}</a></p>
                </div>

                <h1 class="text-2xl font-semibold mb-4">{{ $post->title }}</h1>
                <p class="text-gray-600 mb-4">{{ $post->created_at->diffForHumans() }}</p>
                <img class="w-full h-80 object-cover mb-4" src="https://via.placeholder.com/800x400" alt="Main Image">
                <p class="text-gray-700 leading-relaxed">{{ $post->description }}</p>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-1/3 px-5">
                <!-- Sidebar Card -->
                @foreach ($news as $post)
                    <x-news-card :post="$post" />
                @endforeach
                
                <!-- Add more sidebar cards as needed -->
            </div>
        </div>

</x-layout>