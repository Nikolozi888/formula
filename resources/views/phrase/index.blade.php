<x-layout>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-6 mx-36">ფრაზები</h1>

        @foreach ($phrases as $phrase)
            <x-phrase-card :phrase="$phrase" />
        @endforeach

    </div>

</x-layout>