<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Nouvel Article') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl w-full m-auto p-4 rounded-2xl">

        <div class="bg-secondary relative p-4 rounded-4xl">
            <a class="block absolute top-4 right-8 text-white" href="{{route('pages.index')}}"><i class="fa-solid fa-arrow-left"></i> Retour</a>
            <form class="p-4" method="POST" action="{{ route('articles.store') }}">
                @csrf
                <div>
                    <x-input-label for="title" :value="__('Page')" />
                    <select class="rounded-2xl"name="page" id="page-id">
                        @foreach ($pages as $page)
                        <option value="{{$page->id}}">{{$page->title}}</option>
                        @endforeach       
                    </select>
                </div>

                <div class="mt-8">
                    <x-input-label for="title" :value="__('Titre')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
                </div>

                <div class="mt-8">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" class="block w-full h-64 rounded-2xl"></textarea>
                </div>
                
                <div class="flex flex-col text-white mt-8">
                    <label for="link">Image de l'article</label>
                    <input class="text white rounded-2xl p-2" type="file" accept="image/png, image/jpeg" name="link" id="link">
                </div>
                
                <div class="flex flex-col items-center justify-end mt-8">
                    <x-primary-button>
                        {{ __('Ajouter') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>