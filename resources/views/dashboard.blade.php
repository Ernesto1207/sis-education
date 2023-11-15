<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @can('administrador')
        <div class="flex flex-col justify-center items-center text-center pt-4">
            <div
                class="min-w-[375px] md:min-w-[700px] xl:min-w-[800px] mt-3 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 3xl:grid-cols-6">

                <div
                    class="relative flex flex-grow  flex-col items-center rounded-[10px] border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                    <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                        <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                            <span class="flex items-center text-brand-500 dark:text-white">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                    class="h-6 w-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                        <p class="font-dm text-sm font-medium text-gray-600">Alumnos</p>
                        <h4 class="text-xl font-bold text-navy-700 dark:text-white"> {{ $alumnos }} </h4>
                    </div>
                </div>


                <div
                    class="relative flex flex-grow  flex-col items-center rounded-[10px] border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                    <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                        <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                            <span class="flex items-center text-brand-500 dark:text-white">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                    class="h-7 w-7" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M4 9h4v11H4zM16 13h4v7h-4zM10 4h4v16h-4z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                        <p class="font-dm text-sm font-medium text-gray-600">Profesores</p>
                        <h4 class="text-xl font-bold text-navy-700 dark:text-white"> {{ $profesores }} </h4>
                    </div>
                </div>


                <div
                    class="relative flex flex-grow  flex-col items-center rounded-[10px] border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                    <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                        <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                            <span class="flex items-center text-brand-500 dark:text-white">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                    class="h-6 w-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M208 448V320h96v128h97.6V256H464L256 64 48 256h62.4v192z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                        <p class="font-dm text-sm font-medium text-gray-600">Cursos</p>
                        <h4 class="text-xl font-bold text-navy-700 dark:text-white"> {{ $cursos }} </h4>
                    </div>
                </div>

            </div>
        </div>
    @endcan


    @can('administrador')
        <div class="grid grid-cols-2 gap-20 pt-20">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-900 text-white">Grafico de Usuarios</div>
                <canvas class="" id="chartBar"></canvas>
            </div>

            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-900 text-white">Grafico de Asistencias</div>
                <canvas class="ml-20 mr-40" id="chartPie"></canvas>
            </div>
        </div>
    @endcan
    <x-section-border />

    @if (auth()->user()->can('profesor') || Auth::user()->can('alumno'))
        <div class="flex-1 bg-gray-800 text-white rounded-lg shadow-xl mt-4 p-8">
            <h4 class="text-xl  font-bold">Calendario de Horarios de Cursos</h4>
            <div class="relative px-4 py-5">
                <div class="grid grid-cols-6 gap-2">
                    <div class="text-center">Lunes</div>
                    <div class="text-center">Martes</div>
                    <div class="text-center">Miércoles</div>
                    <div class="text-center">Jueves</div>
                    <div class="text-center">Viernes</div>
                    <div class="text-center">Sábado</div>

                    @if ($alumnos)
                        <div class=" p-2 text-center flow-root ">
                            @if ($cursosLunes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosLunes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosMartes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosMartes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosMiercoles->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosMiercoles as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosJueves->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosJueves as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosViernes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosViernes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosSabado->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosSabado as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                    @endif

                    @if ($profesor)
                        <div class=" p-2 text-center flow-root ">
                            @if ($cursosLunes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosLunes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosMartes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosMartes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosMiercoles->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosMiercoles as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosJueves->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosJueves as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosViernes->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosViernes as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <div class=" p-2 text-center">
                            @if ($cursosSabado->isEmpty())
                                <p>Sin Asignar</p>
                            @else
                                @foreach ($cursosSabado as $curso)
                                    <ul>
                                        <li>{{ ucfirst($curso->nombre) }}</li>
                                        <li>{{ $curso->horario_entrada }}</li>
                                        <li>{{ $curso->horario_salida }}</li>
                                        <li><x-section-border /></li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

    @endcan

    @if (auth()->user()->can('profesor') || Auth::user()->can('alumno'))

    @endcan


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // grafico 1
        const meses = [
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
            "11",
            "12",
        ];
        const meses1 = [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
        ];

        const datos = {!! json_encode($datos) !!};

        const dataBarChart = {
            labels: meses1,
            datasets: [{
                label: "Alumnos",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: meses.map((mes) => datos[mes] || 0),
            }],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );


        // GRAFICO 2
        const ruta = '{{ route('dashboard') }}';

        const asistenciasCount = @json($asistenciasCount);

        const dataPie = {
            labels: ["Asistencias", "Tardanzas", "Faltas"],
            datasets: [{
                label: "",
                data: [asistenciasCount.Asistio, asistenciasCount.tardanzas, asistenciasCount.faltas],
                backgroundColor: [
                    "rgb(133, 105, 241)",
                    "rgb(164, 101, 241)",
                    "rgb(101, 143, 241)",
                ],
                hoverOffset: 4,
            }, ],
        };

        const configPie = {
            type: "pie",
            data: dataPie,
            options: {},
        };
        var chartBar = new Chart(document.getElementById("chartPie"), configPie);
    </script>
</x-app-layout>
