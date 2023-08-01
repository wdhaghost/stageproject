<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col justify-between h-screen w-screen bg-main overflow-hidden">
    <header class="flex justify-between items-center mb-8 p-4">
        <h1 class="text-5xl font-bold">Senar</h1>
        <button id="burger-btn" class="lg:hidden"><i class="text-4xl fa sharp fa-solid fa-bars"></i></button>
        <nav id='nav' class="hidden absolute z-40 lg:block lg:relative bg-third lg:bg-transparent  w-full lg:w-auto h-full lg:h-auto lg: top-0 left-0 mt-16 lg:mt-0 p-6 lg:p-0  ">
            <ul class="flex flex-col lg:flex-row justify-start items-center gap-12">
                @foreach ($pages as $page)
                <li class="w-full md:w-auto">
                    <a href="{{route('pages.show',$page->id)}}" class="block text-white lg:text-black text-4xl font-semibold text-center" aria-current="page">{{$page->title}}</a>
                </li>
                @endforeach

            </ul>
        </nav>
    </header>
    {{$slot}}
    <footer id="footer" class="bg-black relative left-0 -bottom-10 transition-all w-full p-4">
        <button id="arrow-up" class="absolute transition-all text-3xl left-0 right-0 -top-8 mx-auto"><i class="fa-solid fa-chevron-up"></i></button>
        <p class="text-white text-center ">Copyright 2023 @ SENAR</p>
    </footer>
</body>

</html>