<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Alumnos') }}
        </h2>
    </x-slot>
    <x-section-border />

    <form action="{{ route('alumnos.index') }}" method="GET" class="mb-4">
        @csrf
        <div class="flex items-center space-x-4">
            <div class="w-1/2">
                <input type="text"
                    class="w-full border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring focus:ring-indigo-200 dark:text-zinc-950"
                    id="search" name="search" placeholder="DNI o Nombre" >
            </div>
            <button type="submit"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200">
                Buscar
            </button>
        </div>
    </form>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        DNI
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nombres
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Apellido Paterno
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Apellido Materno
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Genero
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Fecha de Nacimiento
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Ciudad
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Direccion
                    </th>
                    <th scope="col" class="px-9 py-3  text-center">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Grado
                    </th>
                    <th scope="col" class="px-9 py-3  text-center">
                        Seccion
                    </th>
                    <th scope="col" class="px-9 py-3  text-center">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $alumno->dni }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->nombres }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->apellido_paterno }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->apellido_materno }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->genero }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->fecha_nacimiento }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->ciudad }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->direccion }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->estado }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->grado }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $alumno->seccion }}
                        </td>

                        <td class="flex items-center px-6 py-4 space-x-3">
                            @if (auth()->user()->can('editar usuarios') ||
                                    auth()->user()->can('administrador'))
                                <a href=" {{ route('alumnos.edit', $alumno) }} "
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            @endcan
                            <form action="{{ route('alumnos.show', ['alumno' => $alumno->id]) }}" method="GET">
                                <button type="submit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver
                                    Perfil</button>
                            </form>
                            @if (auth()->user()->can('eliminar usuarios') ||
                                    auth()->user()->can('administrador'))
                                <form action=" {{ route('alumnos.destroy', $alumno->id) }} " method="POST"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Remove</button>
                                </form>
                            @endcan

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="pagination">
    {{ $alumnos->links() }}
</div>

<x-section-border />
</x-app-layout>
