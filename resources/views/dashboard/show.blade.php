<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Datos del Alumno') }}
        </h2>
    </x-slot>
    <div class="text-white rounded-lg p-6 shadow-md">
        <a href="{{ route('asignar-curso', ['id' => $alumno->id]) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Asignar
            Curso</a>
        <div class="flex flex-row gap-10 my-3">
            <p>nombre: {{ $alumno->nombres }}</p>
            <p>Apellido Paterno: {{ $alumno->apellido_paterno }}</p>
            <p>Apellido Materno: {{ $alumno->apellido_materno }}</p>
        </div>

        @if ($cursos->count() > 0)
            <div class="flex-1 rounded-lg shadow-xl mt-4 p-8">
                <h4 class="text-xl text-gray-900 dark:text-white font-bold">Calendario de Horarios de Cursos</h4>
                <div class="relative px-4 py-2">
                    <div class="grid grid-cols-6 gap-2 ">
                        <div class="text-center">Lunes</div>
                        <div class="text-center">Martes</div>
                        <div class="text-center">Miércoles</div>
                        <div class="text-center">Jueves</div>
                        <div class="text-center">Viernes</div>
                        <div class="text-center">Sábado</div>


                        <div class=" p-2 text-center flow-root text-gray-400">
                            @if ($cursosLunes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosLunes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center text-gray-400">
                            @if ($cursosMartes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosMartes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center text-gray-400">
                            @if ($cursosMiercoles->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosMiercoles as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class="p-2 text-center text-gray-400">
                            @if ($cursosJueves->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosJueves as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center text-gray-400">
                            @if ($cursosViernes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosViernes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center text-gray-400">
                            @if ($cursosSabado->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosSabado as $curso)
                                    <ul>
                                        <li class="text-gray-700">{{ ucfirst($curso->nombre) }}</li>
                                        <li class="text-gray-700">{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><br></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>


                    </div>
                </div>
            </div>
        @else
            <p class="italic mt-2">El alumno no está inscrito en ningún curso.</p>
        @endif


        <!-- Mostrar notas del alumno -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Notas del Alumno</h3>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 ">
                @if ($notas->count() > 0)
                    @foreach ($notas->groupBy('curso_id') as $cursoId => $notasPorCurso)
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Curso
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Notas
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalNotas = 0;
                                $contadorNotas = 0;
                            @endphp
                            @foreach ($notasPorCurso as $nota)
                                @php
                                    $totalNotas += $nota->valor;
                                    $contadorNotas++;
                                @endphp
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $notasPorCurso[0]->curso->nombre }}</th>
                                    <td class="px-6 py-4">{{ $nota->valor }}</td>
                                </tr>
                            @endforeach
                            @if ($contadorNotas > 0)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Promedio</th>
                                    <td class="px-6 py-4">{{ $totalNotas / $contadorNotas }}</td>
                                </tr>
                            @endif
                        </tbody>
                    @endforeach
                @else
                    <p>Sin Cursos asignados para tener notas</p>
                @endif
            </table>
        </div>
    </div>


</x-app-layout>
