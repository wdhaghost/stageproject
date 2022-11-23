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
    <header class="container flex flex-wrap justify-between mb-8">
        <h1 class="text-5xl font-bold">Senar</h1>
        <button id="burger-btn" class="burger-btn"><i class="fa sharp fa-solid fa-bars"></i></button>
        <nav id='nav' class="hidden bg-dark-900 absolute mt-14 md:block  ">
            <ul class="nav-list flex flex-col">
                @foreach ($pages as $page)
                <li class="nav-itm"> <a class="nav-link" href="">{{ $page->title }}</a></li>
                @endforeach
                <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
        </li>
            </ul>
        </nav>
    </header>
    <h2 class="main-ttl">
        
    </h2>
    <section class="main-section">


        <div id='slider' class="slider">
           @foreach ($pages as $page)
            <div class="slide">
                <div class="slide-content">
                    <h3 class="slide-ttl">{{$page->title}}</h3>
                    <p class="slide-txt">{{$page->description}} </p>
                    <p>{{$page->order}}</p>
                </div>
            </div>
            
            @endforeach
        </div>
    </section>

    <section class="handler-section">
        <div class="progress-container" id="scroll-bar">
            <div class="progress-bar" id="progress-bar"></div>
            <!-- <input id="progress-bar" class="progress-bar" type="range" min="O" max="100" value="0" name="progress-bar"> -->
        </div>
        <div class="handler-btns">
            <button class="handler-btn"><i class="fa-sharp fa-solid fa-backward-step"></i></button>
            <button id="play-btn" class="handler-btn lecture-btn hide"><i class="fa-sharp fa-solid fa-play"></i></button>
            <button id="pause-btn" class="handler-btn lecture"><i class="fa-sharp fa-solid fa-pause"></i></button>
            <button class="handler-btn"><i class="fa-sharp fa-solid fa-forward-step"></i></button>
        </div>
    </section>
</body>

</html>