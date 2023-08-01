
<x-layout.f-o>
    <section class="flex flex-col justify-between   min-h-[400px]">

        <div id='slider' class="flex flex-nowrap content-center gap-4 p-4 rounded-4xl w-full min-h-[400px] h-[600px] scroll-smooth overflow-x-scroll no-scrollbar snap-x snap-mandatory">
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
    
</x-layout.f-o>
