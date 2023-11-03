<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot> --}}
    <div class="h-full bg-gray-200 p-8">
        <div class="bg-white rounded-lg shadow-xl pb-8">

            <div class="w-full h-[250px]">
                <img src="{{ asset('profile/image/profile-background.jpg') }}"
                    class="w-full h-full rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <img src="{{ Auth::user()->profile_photo_url }}" class="w-40 border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl">
                        @if ($alumnos)
                            {{ ucfirst($alumnos->nombres) }}
                            {{ ucfirst($alumnos->apellido_paterno) }}
                        @endif
                        @if ($profesor)
                            {{ ucfirst($profesor->nombres) }}
                            {{ ucfirst($profesor->apellido_paterno) }}
                        @endif
                    </p>
                    <span class="bg-blue-500 rounded-full p-1" title="Verified">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                </div>
                <p class="text-gray-700">

                    @if ($alumnos)
                        {{ Auth::user()->email }}
                    @endif
                    @if ($profesor)
                        {{ Auth::user()->email }}
                    @endif
                </p>
                <p class="text-sm text-gray-500">

                    @if ($alumnos)
                        {{ Str::ucfirst($alumnos->direccion) }},
                        {{ Str::ucfirst($alumnos->ciudad) }}
                    @endif
                    @if ($profesor)
                        {{ Str::ucfirst($profesor->direccion) }},
                        {{ Str::ucfirst($profesor->ciudad) }}
                    @endif
                </p>
            </div>


        </div>

        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col 2xl:w-1/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Información personal</h4>
                    <ul class="mt-2 text-gray-700">
                        <li class="flex border-y py-2">
                            <span class="font-bold w-36">Datos Completos: </span>
                            <span class="text-gray-700">
                                @if ($alumnos)
                                    {{ ucfirst($alumnos->nombres) }}
                                    {{ ucfirst($alumnos->apellido_paterno) }}
                                    {{ ucfirst($alumnos->apellido_materno) }}
                                @endif
                                @if ($profesor)
                                    {{ ucfirst($profesor->nombres) }}
                                    {{ ucfirst($profesor->apellido_paterno) }}
                                    {{ ucfirst($profesor->apellido_materno) }}
                                @endif
                            </span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-36">Cumpleaños:</span>
                            <span class="text-gray-700">
                                @if ($alumnos)
                                    <?php
                                    $fechaOriginal = ucfirst($alumnos->fecha_nacimiento);
                                    $fechaFormateada = date('d/m/Y', strtotime($fechaOriginal));
                                    ?>
                                    {{ date('d/m/Y', strtotime($fechaFormateada)) }}
                                @endif

                                @if ($profesor)
                                    <?php
                                    $fechaOriginal = ucfirst($profesor->fecha_nacimiento);
                                    $fechaFormateada = date('d/m/Y', strtotime($fechaOriginal));
                                    ?>
                                    {{ date('d/m/Y', strtotime($fechaFormateada)) }}
                                @endif
                            </span>
                        </li>

                        <li class="flex border-b py-2">
                            <span class="font-bold w-36">Unido:</span>
                            <span class="text-gray-700">
                                @if ($alumnos)
                                    <?php
                                    $fechaHoraOriginal = $alumnos->created_at;
                                    $fechaHoraFormateada = date('H:i:s d/m/Y', strtotime($fechaHoraOriginal));
                                    ?>
                                    {{ $fechaHoraFormateada }}
                                @endif

                                @if ($profesor)
                                    <?php
                                    $fechaHoraOriginal = $profesor->created_at;
                                    $fechaHoraFormateada = date('H:i:s d/m/Y', strtotime($fechaHoraOriginal));
                                    ?>
                                    {{ $fechaHoraFormateada }}
                                @endif
                            </span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-36">Móvil:</span>
                            <span class="text-gray-700">
                                @if ($alumnos)
                                    {{ $alumnos->telefono }}
                                    <span> Dato no Obtenido</span>
                                @else
                                @endif

                                @if ($profesor)
                                    {{ ucfirst($profesor->telefono) }}
                                @endif
                            </span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-36">Email:</span>
                            <span class="text-gray-700">
                                @if ($alumnos)
                                    {{ Auth::user()->email }}
                                @endif
                                @if ($profesor)
                                    {{ Auth::user()->email }}
                                @endif
                            </span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-36">Ubicación:</span>
                            <span class="text-gray-700">
                                @if ($alumnos)
                                    {{ ucfirst($alumnos->direccion) }}
                                    ,
                                    {{ ucfirst($alumnos->ciudad) }}
                                @endif
                                @if ($profesor)
                                    {{ ucfirst($profesor->direccion) }}
                                    ,
                                    {{ ucfirst($profesor->ciudad) }}
                                @endif
                            </span>
                        </li>
                        {{-- <li class="flex border-b py-2">
                            <span class="font-bold w-24">Languages:</span>
                            <span class="text-gray-700">English, Spanish</span>
                        </li> --}}

                    </ul>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Registro de actividades</h4>
                    <div class="relative px-4">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary">
                        </div>

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12">
                                <div class="w-3.5 h-3.5 bg-primary rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Profile informations changed.</p>
                                <p class="text-xs text-gray-500">3 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                    </div>
                </div>

                <!-- start::Calendar -->
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Calendario de Horarios de Cursos</h4>
                    <div class="relative px-4 py-2">
                        <div class="grid grid-cols-6 gap-2">
                            <div class="text-center">Lunes</div>
                            <div class="text-center">Martes</div>
                            <div class="text-center">Miércoles</div>
                            <div class="text-center">Jueves</div>
                            <div class="text-center">Viernes</div>
                            <div class="text-center">Sábado</div>

                            @if ($alumnos)
                                <div class="bg-gray-100 p-2 text-center flow-root ">
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

                                <div class="bg-gray-100 p-2 text-center">
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

                                <div class="bg-gray-100 p-2 text-center">
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

                                <div class="bg-gray-100 p-2 text-center">
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

                                <div class="bg-gray-100 p-2 text-center">
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

                                <div class="bg-gray-100 p-2 text-center">
                                    @if ($cursosSabado->isEmpty())
                                        <p>Sin Asignar</p>
                                    @else
                                        @foreach ($cursosSabado as $curso)
                                            <ul>
                                                <li>{{ ucfirst($curso->nombre) }}</li>
                                                <li>{{ $curso->horario_entrada }}</li>
                                                <li>{{ $curso->horario_salida }}</li>
                                                <li><br></li>
                                            </ul>
                                        @endforeach
                                    @endif
                                </div>
                            @endif

                            @if ($profesor)
                                <div class="bg-gray-100 p-2 text-center flow-root ">
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

                                <div class="bg-gray-100 p-2 text-center">
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

                                <div class="bg-gray-100 p-2 text-center">
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

                                <div class="bg-gray-100 p-2 text-center">
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

                                <div class="bg-gray-100 p-2 text-center">
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

                                <div class="bg-gray-100 p-2 text-center">
                                    @if ($cursosSabado->isEmpty())
                                        <p>Sin Asignar</p>
                                    @else
                                        @foreach ($cursosSabado as $curso)
                                            <ul>
                                                <li>{{ ucfirst($curso->nombre) }}</li>
                                                <li>{{ $curso->horario_entrada }}</li>
                                                <li>{{ $curso->horario_salida }}</li>
                                                <li><br></li>
                                            </ul>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
