<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asistencias') }}
        </h2>
    </x-slot>
    <div class="container mx-auto dark:text-white">
        <h2 class="text-2xl font-semibold mb-4">Buscar Asistencia</h2>
        <form action="{{ route('asistencia.index') }}" method="GET" class="mb-4">
            @csrf
            <div class="flex items-center space-x-4">
                <div class="w-1/2">
                    <input type="text"
                        class="w-full border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring focus:ring-indigo-200 dark:text-zinc-950"
                        id="search" name="search" placeholder="DNI o Nombre">
                </div>
                <button type="submit"
                    class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200">
                    Buscar
                </button>
            </div>
        </form>

        <h3 class="text-xl font-semibold mb-4">Resultados de la búsqueda:</h3>

    </div>
    <x-section-border />
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        DNI
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombres
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellido Paterno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellido Materno
                    </th>

                    <th scope="col text-center" class="px-9 py-3 ">
                        Estado
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($asistencias as $asistencia)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $asistencia->alumno->dni }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $asistencia->alumno->nombres }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $asistencia->alumno->apellido_paterno }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $asistencia->alumno->apellido_materno }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $asistencia->estado }}
                        </td>
                        {{-- <p class="text-white"> {{$asistencia}} </p> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{-- {{ $asistencias->links() }} --}}
    </div>
</x-app-layout>
