<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Liste des voitures
            </h2>

            @auth
            <a href="{{ route('cars.create') }}" class="dark:text-white px-4 py-2 focus:outline rounded-lg bg-blue-900">
                {{ __('Ajouter une nouvelle voiture') }}
            </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($cars as $car)
                <div class="p-4 text-white">
                    <div class="flex justify-between">
                        <div class="my-auto">
                            {{$car->name}}
                        </div>
                        <div class="my-auto mx-2">
                            {{$car->status ? 'Disponible' : 'Indisponible'}}
                        </div>
                        @auth
                        <div class="flex">
                            <a href="{{ route('cars.edit', $car) }}"
                                class="dark:text-white mx-2 px-4 py-2 focus:outline rounded-lg bg-blue-900">
                                {{ __('Modifier') }}
                            </a>
                            <form method="POST" action="{{ route('cars.destroy', $car) }}"
                                class="dark:text-white mx-2 px-4 py-2 focus:outline rounded-lg bg-blue-900" x-data>
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button>
                                    {{ __('Supprimer') }}
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
                @endforeach
                <div class="w-full p-1">
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>