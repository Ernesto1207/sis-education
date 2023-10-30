<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edicion de Alumnos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-center text-white text-2xl m-50">Formulario de Edicion de Alumnos</h1>


                @if ($errors->any())
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                        role="alert">

                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info </span>
                                        <span class="font-medium"> Danger alert!
                                        </span>{{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="container mx-auto p-4">
                    <form method="POST" action="{{ route('cursos.update',$curso) }}" class="w-full max-w-md mx-auto">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nombre"
                                class="block text-gray-700 dark:text-white font-bold mb-2">Nombre:</label>
                            <input type="text" class="form-input w-full" id="nombre" name="nombre" value="{{$curso->nombre}}">
                        </div>

                        <div class="mb-4">
                            <label for="descripcion"
                                class="block text-gray-700 dark:text-white font-bold mb-2">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" rows="4"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">{{$curso->descripcion}}</textarea>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Editar Curso
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
