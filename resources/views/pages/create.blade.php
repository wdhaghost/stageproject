<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Nouvelle page') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl w-full m-auto p-4 rounded-2xl">

        <div class="bg-secondary relative p-4 rounded-4xl">
            <a  class="block absolute top-4 right-8 text-white" href="{{route('dashboard')}}"><i class="fa-solid fa-arrow-left"></i> Retour</a>
            <form class="p-4" method="POST" action="{{ route('pages.store') }}">
                @csrf


                <div>
                    <x-input-label for="title" :value="__('Titre')" />

                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus maxlength="20" />

                </div>


                <div class="mt-8">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" class="block w-full h-64 rounded-2xl"></textarea>
                </div>


                <div class="flex flex-col mt-8">
                    <x-input-label for="order" :value="__('Ordre')" />
                    <select class="rounded-2xl" id="order" name="order">
                        <option value="1">1</option>
                        <?php $i=1?>
                        @foreach ($pages as $page)
                     <?php $i++?>
                        <option value="{{$i}}">{{$i}}</option>
                        @endforeach
                    </select>
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