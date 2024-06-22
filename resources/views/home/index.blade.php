<x-layout>

    <section class="container mx-auto px-36 py-8">

        <h1 class="text-2xl">ახალი ამბები</h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
            @foreach ($news as $post)
                <x-news-card :post="$post" />
            @endforeach

            <!-- Repeat post cards as needed -->
        </div>
    
    </section>
    
    <!-- 111111111111111111111111111111111111111111111 -->
    
    <section class="bg-gray-900 container mx-auto px-36 py-8">
    
        <h1 class="text-2xl text-white">ვიდეო</h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
            @foreach ($videos as $video)
                <x-videos-card :video="$video" />
            @endforeach
            <!-- Repeat post cards as needed -->
        </div>
    
    </section>
    
    
    <section class="container mx-auto px-36 py-8">
    
        <h1 class="text-2xl">ფრაზა</h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
            @foreach ($phrases as $phrase)
                <x-phrase-card-home :phrase="$phrase" />
            @endforeach

        </div>
    
    </section>
    
    
    <section class="bg-gray-900 container mx-auto px-36 py-8">
    
        <h1 class="text-2xl text-white">გადაცემები</h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    
            @foreach ($programs as $program)
                <x-programs-card-home :program="$program" />
            @endforeach
            <!-- Repeat post cards as needed -->
        </div>
    
    </section>

</x-layout>