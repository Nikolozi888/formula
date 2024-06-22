<x-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="p-8 rounded-lg mx-36">
            <h1 class="text-2xl font-semibold mb-4">{{ $phrase->title }}</h1>
            <div class="flex items-center mb-4">
                <img class="w-32 h-32 rounded-full mr-4" src="{{ asset('images/all_image/' . $phrase->author_image) }}" alt="Profile Image">
                <div>
                    <p class="text-gray-800 font-medium">{{ $phrase->author_name }}</p>
                    <p class="text-gray-600 text-sm">{{ $phrase->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <blockquote class="text-gray-700 mb-4">
                {{ $phrase->description }}
            </blockquote>
            <div class="flex space-x-2 mb-4">
                <a href="#" class="text-gray-600">
                    <svg class="w-6 h-6 inline" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 2.01H6c-2.21 0-4 1.79-4 4v12c0 2.21 1.79 4 4 4h12c2.21 0 4-1.79 4-4v-12c0-2.21-1.79-4-4-4zM7 10H9v7H7V10zM8 7.75c-.83 0-1.5-.67-1.5-1.5S7.17 4.75 8 4.75 9.5 5.42 9.5 6.25 8.83 7.75 8 7.75zM17 17h-2v-3.59c0-2.17-2.5-2-2.5 0V17h-2v-7h2v.78C13.5 9.57 17 9.5 17 13.41V17z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-600">
                    <svg class="w-6 h-6 inline" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.04c-5.52 0-10 4.48-10 10 0 4.41 2.88 8.16 6.84 9.5.5.08.68-.22.68-.48 0-.24-.01-.87-.01-1.71-2.78.61-3.37-1.17-3.37-1.17-.45-1.14-1.11-1.45-1.11-1.45-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.91 1.52 2.37 1.08 2.94.82.09-.66.35-1.08.63-1.33-2.22-.25-4.56-1.11-4.56-4.93 0-1.09.39-1.98 1.03-2.68-.1-.26-.45-1.28.1-2.67 0 0 .84-.27 2.75 1.02A9.49 9.49 0 0112 6.9c.85.003 1.71.11 2.51.33 1.9-1.29 2.74-1.02 2.74-1.02.56 1.39.21 2.41.1 2.67.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.68-4.57 4.93.36.31.67.92.67 1.85 0 1.33-.01 2.4-.01 2.72 0 .27.18.57.69.47C19.13 20.2 22 16.44 22 12.04c0-5.52-4.48-10-10-10z"/>
                    </svg>
                </a>
            </div>
        </div>

        <hr>

        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-semibold mb-6 mx-36">ასევე ნახეთ</h1>

            @foreach ($phrases as $key => $p)
                @if($p->id !== $phrase->id)
                    <x-phrase-card :phrase="$p" />
                @endif
            @endforeach

        </div>
    </div>
</x-layout>
