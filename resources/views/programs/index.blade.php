<x-layout>

    <div class="bg-gray-900 w-screen h-screen">

        <section class="container mx-auto px-36 py-8">
            
            <h1 class="text-2xl text-white">გადაცემები</h1>
            <br>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6">
                
                @foreach ($programs as $program)
                    <x-programs-card :program="$program" />
                @endforeach
                <!-- Repeat post cards as needed -->
            </div>

    </section>
    </div>

</x-layout>