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
                    <a href="#" class="block w-full md:w-auto text-black text-4xl font-bold text-center" aria-current="page"></a>
                </li>
                @endforeach

            </ul>
        </nav>
    </header>
    <h2 class="text-4xl">
        Accueil
    </h2>
    <section class="flex flex-col grow min-h-[400px]">


        <div id='slider' class="flex flex-nowrap gap-4 rounded-4xl w-full min-h-full h-[600px] scroll-smooth overflow-x-scroll no-scrollbar snap-x snap-mandatory">
            <div class="inline-block max-w-[600px] w-full  h-full grow-0 shrink-0 rounded-4xl snap-always snap-center ">
                <div class="w-full h-full rounded-4xl px-4 py-2">
                    <h3 class="slide-ttl">test</h3>
                    <p class="slide-txt">description</p>
                    <p>1</p>
                </div>
            </div>
            <div class="inline-block max-w-[600px] w-full  h-full grow-0 shrink-0 rounded-4xl snap-always snap-center">
                <div class="bg-secondary w-full h-full rounded-4xl px-4 py-2">
                    <h3 class="slide-ttl">test</h3>
                    <p class="slide-txt">description</p>
                    <p>1</p>
                </div>
            </div>
            <div class="inline-block max-w-[600px] w-full  h-full grow-0 shrink-0 rounded-4xl snap-always snap-center">
                <div class="bg-secondary w-full h-full rounded-4xl px-4 py-2">
                    <h3 class="slide-ttl">test</h3>
                    <p class="slide-txt">description</p>
                    <p>1</p>
                </div>
            </div>
            @if(!empty($page->articles))
            @foreach ($page->articles as $article)
            <div class="inline-block w-full h-full rounded-4xl snap-start">
                <div class="bg-secondary w-full  h-full rounded-4xl px-4 py-2">
                    <h3 class="slide-ttl">{{$article->title}}</h3>
                    <p class="slide-txt">{{$article->description}} </p>
                    <p>{{$article->order}}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>

    <section class="w-full flex flex-col items-center gap-4 p-4">
        <div class="w-full max-w-[1200px] h-4 rounded-4xl bg-black/50" id="scroll-bar">
            <div class="bg-black w-0 h-full rounded-4xl" id="progress-bar"></div>
        </div>
        <div class="flex justify-center w-full px-4 gap-[3rem]">
            <button class="w-12 h-12 text-black text-3xl"><i class="fa-sharp fa-solid fa-backward-step"></i></button>
            <button id="play-btn" class="w-12 h-12 text-black text-3xl lecture-btn hide"><i class="fa-sharp fa-solid fa-play"></i></button>
            <button id="pause-btn" class="w-12 h-12 text-black text-3xl lecture"><i class="fa-sharp fa-solid fa-pause"></i></button>
            <button class="w-12 h-12 text-black text-3xl"><i class="fa-sharp fa-solid fa-forward-step"></i></button>
        </div>
    </section>
</body>

</html>