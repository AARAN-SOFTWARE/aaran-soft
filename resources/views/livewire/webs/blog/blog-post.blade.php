<div>

    <div class="container max-w-screen-xl p-5 ">
        <x-button.new/>
        <h1 class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl ">
            Welcome to My Blogs
        </h1>
        <div class=""><p class="text-xl text-center p-6 mt-34 hover:text-black-700">All the latest Laravel News posts.Beautiful handcrafted components  <br>
                Livewire components that will take your productivity to the next level</p>
        </div>
    </div>
    <div>
        @foreach($list as $Index => $row) @endforeach
    </div>

</div>
