<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Validacion de Alumno') }}
        </h2>
    </x-slot>

    {{-- <div class=" flex items-center justify-center ">
        <div class="">
            <form method="POST" action="{{ route('dni.validar') }}">
                @csrf
                <label class="text-white" for="dni">Ingrese el DNI del alumno:</label>
                <input type="text" name="dni" id="dni" required>
                <button class="text-white" type="submit">Validar DNI</button>
            </form>
        </div>
    </div> --}}

    <div class="mt-10 flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div>
                <h2 class=" text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Valida el DNI del Alumno
                </h2>
            </div>
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-4">
                    {{ session('error') }}
                </div>
            @endif

            <form class="mt-8 space-y-6" method="POST" action="{{ route('dni.validar') }}">
                @csrf

                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="dni" class="sr-only">DNI del Alumno</label>
                        <input id="dni" name="dni" type="text" autocomplete="dni" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4
                        border border-transparent text-sm font-medium rounded-md text-white
                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-indigo-500">
                        Validar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layput>
