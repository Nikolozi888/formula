<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">All Phrases</h2>
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.phrases.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add Phrase
            </a>
        </div>
        <br>

        <section class="container mx-auto px-36 py-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
                @if ($phrases->count() > 0)
                    @foreach ($phrases as $phrase)
                        <x-phrase-card-home :phrase="$phrase" />
                    @endforeach

                    @else
                    <h2 class="text-xl font-semibold mb-4">No Phrases yet, Check back later</h2>
                @endif
    
            </div>
        
        </section>


    </div>


</x-admin_layout>