<header class="flex justify-between items-center mb-8">
    <h1 class="text-5xl font-bold">Senar</h1>
    <button id="burger-btn" class="lg:hidden"><i class="text-4xl fa sharp fa-solid fa-bars"></i></button>
    <nav id='nav' class="hidden lg:block bg-third md:bg-transparent w-full md:w-auto h-full md:h-auto absolute top-0 left-0 mt-16 md:mt-0 p-6 md:p-0  md:relative">
        <ul class="flex flex-col md:flex-row justify-start items-center gap-12">
            @foreach ($pages as $page)
            <li class="w-full md:w-auto">
                <a href="{{route('pages.show',$page->id)}}" class="block text-black text-4xl font-semibold text-center" aria-current="page">{{$page->title}}</a>
            </li>
            @endforeach
        </ul>
    </nav>
</header>