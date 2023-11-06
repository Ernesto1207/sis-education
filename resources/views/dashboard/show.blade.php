<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Datos del Alumno') }}
        </h2>
    </x-slot>
    <div class="bg-white rounded-lg p-6 shadow-md">
        <a href="{{ route('asignar-curso', ['id' => $alumno->id]) }}" class="text-blue-500 hover:underline">Asignar
            Curso</a>

        <p>nombre: {{ $alumno->nombres }}</p>
        <p>Apellido Paterno: {{ $alumno->apellido_paterno }}</p>
        <p>Apellido Materno: {{ $alumno->apellido_materno }}</p>

        <h3 class="text-xl font-semibold mt-6 mb-2">Cursos del Alumno</h3>
        @if ($cursos->count() > 0)
            <ul>
                @foreach ($alumno->cursos as $curso)
                    <li class=" ml-6">
                        <span class="font-semibold">Curso:</span> {{ $curso->nombre }}
                    </li>
                    <li class=" ml-6">
                        <span class="font-semibold">Dia:</span> {{ $curso->dias_semana }}
                    </li>
                    <li class=" ml-6">
                        <span class="font-semibold">Horario:</span> {{ $curso->pivot->horario }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="italic mt-2">El alumno no está inscrito en ningún curso.</p>
        @endif


        <!-- Mostrar notas del alumno -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Notas del Alumno</h3>
        {{-- @if ($notas->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $nota)
                        <tr>
                            <td>{{ $nota->curso->nombre }}</td>
                            <td>{{ $nota->valor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Este alumno no tiene notas asignadas.</p>
        @endif --}}

        {{-- <h1 class=" text-3xl">{{ $alumno->nombre }}</h1> --}}

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 ">

                @foreach ($notas->groupBy('curso_id') as $cursoId => $notasPorCurso)
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Curso
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Notas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Promedio
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notasPorCurso as $nota)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $notasPorCurso[0]->curso->nombre }} </th>
                                <td class="px-6 py-4">{{ $nota->valor }} <br> as</td>
                                <td class="px-6 py-4">Promedio</td>
                            </tr>
                        @endforeach
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>


</x-app-layout>
