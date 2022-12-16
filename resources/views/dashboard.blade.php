<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="bg-secondary h-full rounded-2xl">
        <ul class="bg-third flex items-center justify-between flex-nowrap w-full p-4 text-white rounded-xl">
            <li class="bg-main px-4 py-2 rounded-xl"><a href="{{route('dashboard')}}" class="  text-center font-bold ">Pages</a> </li>
            <li><a href="{{route('articles.index')}}" class="px-4 py-2 text-center rounded-xl">Articles</a></li>
            <li><a href="{{route('socials.index')}}" class="px-4 py-2 text-center rounded-xl">Réseaux</a></li>
        </ul>
        <div class="flex flex-col justify-between items-center p-4">
            <div class="w-full flex flex-col items-start gap-6">
                @foreach ($pages as $page)
                <li class="w-full flex justify-between items-center text-white">
                    <p>{{$page->title}}</p>
                    <div class="flex gap-4" >
                        <a class="block bg-main rounded-xl px-4 py-2" href="{{route('pages.edit',$page->id)}}">Modifier</i></a>
                        <form action="{{route('pages.destroy',$page->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="sumbit" class="block bg-red-600 rounded-xl px-4 py-2" href="{{route('pages.destroy',$page->id)}}">Supprimer</button>
                            
                        </form>
                    </div>
                </li>
                @endforeach
            </div>
            <a href="{{route('pages.create')}}" class="block bg-third px-[3rem] py-4 text-center text-white rounded-2xl">Nouvelle page</a>
        </div>
    </div>
</x-app-layout>