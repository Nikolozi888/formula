<x-layout>

    <section class="container mx-auto px-36 py-8">

        <h1 class="text-2xl">ახალი ამბები</h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            @if ($news->count() > 0)

                @foreach ($news as $post)
                    <x-news-card :post="$post" />
                @endforeach

            @else
                <h1 class="text-2xl font-semibold text-red-500">ახალი ამბები არ არის</h1>
            @endif


            <!-- Repeat post cards as needed -->
        </div>

    </section>

</x-layout>