<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col h-screen w-screen bg-main p-4">
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
    <section class="flex justify-between flex-col  grow min-h-[400px]">
        <h2 class="text-4xl">
            Accueil
        </h2>

        <div id='slider' class="flex flex-nowrap content-center gap-4 rounded-4xl w-full min-h-[400px] h-[600px] scroll-smooth overflow-x-scroll no-scrollbar snap-x snap-mandatory">
            @foreach ($pages as $page)
            <div class="inline-block w-full max-w-[600px] max-h-[400px] grow-0 shrink-0 rounded-4xl snap-always snap-start">
                <div class="bg-secondary w-full  h-full rounded-4xl p-8">
                    <h3 class="text-white mb-4 font-bold text-[2rem]">{{$page->title}}</h3>
                    <p class="text-white">{{$page->description}} </p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="w-full flex flex-col items-center gap-4 p-4">
        <div class="w-full max-w-[1200px] h-4 rounded-4xl bg-black/50" id="scroll-bar">
            <div class="bg-black w-0 h-full rounded-4xl" id="progress-bar"></div>
        </div>
        <div class="flex justify-center w-full px-4 gap-[3rem]">
            <button class="w-12 h-12 text-black text-3xl"><i class="fa-sharp fa-solid fa-backward-step"></i></button>
            <button id="play-btn" class="hidden w-12 h-12 text-black text-3xl lecture-btn "><i class="fa-sharp fa-solid fa-play"></i></button>
            <button id="pause-btn" class="w-12 h-12 text-black text-3xl lecture"><i class="fa-sharp fa-solid fa-pause"></i></button>
            <button class="w-12 h-12 text-black text-3xl"><i class="fa-sharp fa-solid fa-forward-step"></i></button>
        </div>
    </section>

</body>

</html>