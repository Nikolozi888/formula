<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">All News</h2>
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.news.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add News
            </a>
        </div>
        <br>
        <section class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- News Card -->
                    @if ($news->count() > 0)
                        @foreach ($news as $post)
                            <x-news-card :post="$post" />
                        @endforeach

                        @else
                        <h2 class="text-xl font-semibold mb-4">No News yet, Check back later</h2>
                    @endif
                <!-- End News Card -->
            </div>
        </section>
    </div>
</x-admin_layout>