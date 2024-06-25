
<div class="w-64 bg-blue-900 pb-20">
    <div class="p-5">
        <h1 class="text-2xl font-semibold"><a href="{{ route('admin.dashboard') }}">Admin Panel</a></h1>
        <p class="text-gray-300 mt-2">Welcome, Admin!</p>
    </div>
    <nav class="mt-5">
        <section>
            <h1 class="text-lg ml-5">News Section</h1>
            <section class="ml-5">
                <a href="{{ route('admin.news.index') }}" class="block py-2 px-4 text-base hover:bg-blue-800">All News</a>
                <a href="{{ route('admin.news.create') }}" class="block py-2 px-4 text-base hover:bg-blue-800">Add News</a>    
            </section>
        </section>

        <section class="mt-7">
            <h1 class="text-lg ml-5">Categories Section</h1>
            <section class="ml-5">
                <a href="{{ route('admin.categories.index') }}" class="block py-2 px-4 text-base hover:bg-blue-800">All Categories</a>
                <a href="{{ route('admin.categories.create') }}" class="block py-2 px-4 text-base hover:bg-blue-800">Add Categories</a>
            </section>
        </section>

        <section class="mt-7">
            <h1 class="text-lg ml-5">Programs Section</h1>
            <section class="ml-5">
                <a href="{{ route('admin.programs.index') }}" class="block py-2 px-4 text-base hover:bg-blue-800">All Programs</a>
                <a href="{{ route('admin.programs.create') }}" class="block py-2 px-4 text-base hover:bg-blue-800">Add Programs</a>
            </section>
        </section>

        <section class="mt-7">
            <h1 class="text-lg ml-5">Videos Section</h1>
            <section class="ml-5">
                <a href="{{ route('admin.videos.index') }}" class="block py-2 px-4 text-base hover:bg-blue-800">All Videos</a>
                <a href="{{ route('admin.videos.create') }}" class="block py-2 px-4 text-base hover:bg-blue-800">Add Videos</a>
            </section>
        </section>

        <section class="mt-7">
            <h1 class="text-lg ml-5">Phrase Section</h1>
            <section class="ml-5">
                <a href="{{ route('admin.phrases.index') }}" class="block py-2 px-4 text-base hover:bg-blue-800">All Phrase</a>
                <a href="{{ route('admin.phrases.create') }}" class="block py-2 px-4 text-base hover:bg-blue-800">Add Phrase</a>
            </section>
        </section>

        <section class="mt-7">
            <h1 class="text-lg ml-5">Tag Section</h1>
            <section class="ml-5">
                <a href="{{ route('admin.tags.index') }}" class="block py-2 px-4 text-base hover:bg-blue-800">All Tag</a>
                <a href="{{ route('admin.tags.create') }}" class="block py-2 px-4 text-base hover:bg-blue-800">Add Tag</a>
            </section>
        </section>

        <section class="mt-7">
            <h1 class="text-lg ml-5">Admins Section</h1>
            <section class="ml-5">
                <a href="{{ route('admin.admins.index') }}" class="block py-2 px-4 text-base hover:bg-blue-800">All Admins</a>
                <a href="{{ route('admin.admins.create') }}" class="block py-2 px-4 text-base hover:bg-blue-800">Add Admins</a>
           </section>
        </section>

    </nav>
</div>
