<x-layout.f-o>

    <h2 class="text-4xl p-4">
        {{$actualpage->title}}
    </h2>

    <section class="flex flex-col justify-between grow min-h-[400px] p-4">
        <div id='slider' class="flex flex-nowrap content-center gap-4 rounded-4xl w-full min-h-[400px] h-[600px] scroll-smooth overflow-x-scroll no-scrollbar snap-x snap-mandatory">
            @foreach ($articles as $article)
            <div class="w-full h-full max-w-[600px] max-h-[600px] grow-0 shrink-0 rounded-4xl snap-always snap-start">
                <div class="bg-secondary w-full  h-full rounded-4xl p-8">
                    <h3 class="text-white mb-4 font-bold text-[2rem]">{{$article->title}}</h3>
                    <p class="text-white">{{$article->description}} </p>
                </div>
            </div>
            @endforeach
        </div>

        <section class="w-full flex flex-col  items-center gap-4 p-4">
            <div class="w-full max-w-[1200px] h-4 rounded-4xl bg-black/50" id="scroll-bar">
                <div class="bg-black w-0 h-full rounded-4xl" id="progress-bar"></div>
            </div>
            <div class="flex justify-center w-full max-w-[1200px] relative px-4 gap-[3rem]">
                @if (@isset($prevpage))
                <button class="w-12 h-12 text-black text-3xl">
                    <a href="{{route('pages.show',$prevpage->id)}}">
                        <i class="fa-sharp fa-solid fa-backward-step"></i>
                    </a>
                </button>
                @else
                <button class="w-12 h-12 text-black text-3xl">
                    <i class="fa-sharp fa-solid fa-backward-step"></i>
                </button>
                @endif
                <button id="play-btn" class="hidden w-12 h-12 text-black text-3xl lecture-btn "><i class="fa-sharp fa-solid fa-play"></i></button>
                <button id="pause-btn" class="w-12 h-12 text-black text-3xl lecture"><i class="fa-sharp fa-solid fa-pause"></i></button>
                <button class="w-12 h-12 text-black text-3xl">
                    @if (@isset($nextpage))
                    <a href="{{route('pages.show',$nextpage->id)}}">
                        <i class="fa-sharp fa-solid fa-forward-step"></i>
                    </a>
                    @else
                    <i class="fa-sharp fa-solid fa-forward-step"></i>
                    @endif
                </button>
                <button id="modal-btn" class="absolute text-3xl right-2 -bottom-4"><i class="fa-solid fa-ellipsis"></i></button>
            </div>
        </section>
        
    </section>
    <div id="modal" class=" hidden flex flex-col justify-between absolute  top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 bg-black text-white  md:w-[600px] w-[300px] h-[500px] rounded-xl px-3 pt-7 pb-3">
        <button id="close-modal-btn" class="absolute right-4 top-4 text-xl"><i class="fa-solid fa-xmark"></i></button>
        <div class="h-full flex flex-col gap-4">
            <p class="font-bold">Coordonnées</p>
            <ul class="flex flex-col gap-7">
                <a class="font-light block" href="tel:0689134447">06 89 13 44 47</a>
                <a class="font-light block" href="https://www.google.com/maps/place/157+Bd+de+Strasbourg,+76600+Le+Havre/" target="_blank">157 Boulevard de Strasbourg,<br> 76610 Le Havre</a>
                <a class="font-light block" href="mailto:contact@senar.fr">Contact@senar.fr</a>
            </ul>

        </div>
        <div class=" flex gap-4">
            <a class="text-3xl" href="https://https://www.facebook.com/senar972" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a class="text-3xl" href="https://www.tiktok.com/@senar972" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            <a class="text-3xl" href="https://www.instagram.com/senar972/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a class="text-3xl" href="https://www.youtube.com/@Senar972" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
</x-layout.f-o>