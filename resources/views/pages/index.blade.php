<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight">
            {{ __('Dashboard - Pages') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl w-full m-auto p-4 rounded-2xl">

        <div class="flex flex-col bg-secondary relative p-4 rounded-4xl">
        @foreach ($pages as $page)
        <div class="flex w-full justify-between">
            <h3 class="text-white">{{$page->title}}</h3>
            <a href="{{route('pages.edit',$page->id)}}">Modifier</a>
            <a href="{{route('pages.destroy',$page->id)}}">Supprimer</a>
        </div>
        @endforeach
        </div>

    </div>
</x-app-layout>