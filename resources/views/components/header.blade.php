<header class="bg-black text-white">
    <div class="container mx-auto px-4 py-2">
        <!-- First Section -->
        <div class="p-36 flex justify-between items-center py-2">
            <a href="{{ route('home') }}">
                <div class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/40" alt="Website Icon" class="h-10 w-10">
                    <div class="text-2xl font-bold">ფორმულა</div>
                </div>
            </a>
            <div class="flex items-center space-x-4">
                <div class="flex space-x-2 items-center">
                    <select class="bg-black text-white border border-white rounded p-1">
                        <option>EN</option>
                        <option>FR</option>
                        <option>ES</option>
                    </select>
                </div>
                @admin
                        <h1>you are Registered, <a class="text-red-500" href="{{ route('admin.profile.index') }}">Profile</a></h1>
                    @else
                        <button>live</button>
                @endadmin
            </div>
        </div>
        <!-- Second Section -->
        <div class="p-36 flex justify-between items-center py-2">
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('news.index') }}" class="text-lg hover:text-gray-300">ყველა სიახლე</a></li>
                    <li><a href="{{ route('programs.index') }}" class="text-lg hover:text-gray-300">გადაცემები</a></li>
                    <li><a href="{{ route('videos.index') }}" class="text-lg hover:text-gray-300">ვიდეო</a></li>
                    <li>
                        <select id="categorySelect" class="bg-black text-white border border-white rounded p-1 text-lg" onchange="redirectToCategory()">
                            <option disabled selected>კატეგორიები</option>
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ route('categories.index',$category->slug) }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li><a href="{{ route('phrases.index') }}" class="text-lg hover:text-gray-300">ფრაზები</a></li>
                </ul>
            </nav>
            <div class="relative">
                <input type="text" class="bg-white text-black rounded-full pl-4 pr-8 py-2 focus:outline-none" placeholder="Search...">
                <svg class="w-5 h-5 absolute right-2 top-2.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.9 14.32a7.5 7.5 0 111.42-1.42l4.36 4.36a1 1 0 01-1.42 1.42l-4.36-4.36zM10 15.5a5.5 5.5 0 100-11 5.5 5.5 0 000 11z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
</header>


<script>
    function redirectToCategory() {
        const selectElement = document.getElementById('categorySelect');
        const selectedValue = selectElement.value;
        if (selectedValue) {
            window.location.href = selectedValue;
        }
    }
</script>