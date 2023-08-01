<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="bg-secondary h-full rounded-2xl md:flex ">
        <ul class="bg-third flex md:flex-col md:gap-6 items-center justify-between md:justify-start flex-nowrap w-full md:w-auto p-6 text-white rounded-xl">
            <li class="bg-main px-4 py-2 rounded-xl"><a href="{{route('dashboard')}}" class=" font-bold ">Pages</a> </li>
            <li><a href="{{route('articles.index')}}" class="px-4 py-2 rounded-xl">Articles</a></li>
        </ul>
        <div class="flex flex-col justify-between items-center md:w-full p-6">
            <ul class="w-full flex flex-col items-start gap-6">
                @foreach ($pages as $page)
                <li class="w-full flex justify-between items-center text-white">
                    <div class="flex gap-2">
                        <p>{{$page->order}}</p>
                        <p>{{$page->title}}</p>
                    </div>

                    <div class="flex gap-4">
                        <a class="block bg-main rounded-xl px-4 py-2" href="{{route('pages.edit',$page->id)}}">Modifier</i></a>
                        <form action="{{route('pages.destroy',$page->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="sumbit" class="block bg-red-600 rounded-xl px-4 py-2" href="{{route('pages.destroy',$page->id)}}">Supprimer</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
            <a href="{{route('pages.create')}}" class="block bg-third px-[3rem] py-4 text-center text-white rounded-2xl">Nouvelle page</a>
        </div>
    </div>
</x-app-layout>