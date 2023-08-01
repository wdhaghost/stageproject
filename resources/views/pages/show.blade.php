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
                <button class="absolute text-3xl right-2 -bottom-4"><i class="fa-solid fa-ellipsis"></i></button>
            </div>
        </section>

    </section>
</x-layout.f-o>