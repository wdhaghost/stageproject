<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="bg-secondary h-full rounded-2xl md:flex ">
        <ul class="bg-third flex md:flex-col md:gap-6 items-center justify-between md:justify-start flex-nowrap w-full md:w-auto p-6 text-white rounded-xl">
            <li class=" px-4 py-2 rounded-xl"><a href="{{route('dashboard')}}" class=" font-bold ">Pages</a> </li>
            <li class="bg-main px-4 py-2 rounded-xl"><a href="{{route('articles.index')}}">Articles</a></li>
            
        </ul>
        <div class="flex flex-col justify-between items-center md:w-full p-6">
            <ul class="w-full flex flex-col items-start gap-6">
                @foreach ($articles as $article)
                <li class="w-full flex justify-between items-center text-white">
                    @if (@isset($article->page->title))
                    <p>{{$article->page->title}}</p>
                    @endif
                    <p>{{$article->title}}</p>
                    <div class="flex gap-4">
                        <a class="block bg-main rounded-xl px-4 py-2" href="{{route('articles.edit',$article->id)}}">Modifier</i></a>
                        <form action="{{route('articles.destroy',$article->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="sumbit" class="block bg-red-600 rounded-xl px-4 py-2" href="{{route('articles.destroy',$article->id)}}">Supprimer</button>

                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
            <a href="{{route('articles.create')}}" class="block bg-third px-[3rem] py-4 text-center text-white rounded-2xl">Nouvel article</a>
        </div>
    </div>
</x-app-layout>