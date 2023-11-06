<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Alumnos') }}
        </h2>
    </x-slot>

    <x-section-border />

    {{-- crear usuario --}}
    @if (auth()->user()->can('crear usuarios') ||
            auth()->user()->can('administrador'))
        <div x-data="{ modelOpen: false }">

            <button @click="modelOpen =!modelOpen"
                class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>

                <span>Crear Nueva Justificacion</span>
            </button>

            <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div
                    class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                        <div class="flex items-center justify-between space-x-4">
                            <h1 class="text-xl font-medium text-gray-800 ">Nueva Justificacion</h1>

                            <button @click="modelOpen = false"
                                class="text-gray-600 focus:outline-none hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>

                        {{-- <p class="mt-2 text-sm text-gray-500 ">
                                Add your teammate to your team and start work to get things done
                            </p> --}}

                        <form class="mt-5" method="POST" action="{{ route('justificaciones.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del
                                    Usuario</label>
                                <select name="alumno_id" id="alumno_id" class="form-select " required>
                                    @foreach ($alumnos as $alumno)
                                        <option value="{{ $alumno->id }}">{{ $alumno->nombres }}
                                            {{ $alumno->apellido_paterno }} {{ $alumno->apellido_materno }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="profesor_id" class=" block mb-2">Profesor:</label>
                                <select name="profesor_id" id="profesor_id" class="form-select" required>
                                    @foreach ($profesores as $profesor)
                                        <option value="{{ $profesor->id }}">{{ $profesor->nombres }}
                                            {{ $profesor->apellido_paterno }} {{ $profesor->apellido_materno }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="descripcion" class="block mb-2">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-textarea w-full" rows="4" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="descripcion" class="block mb-2">Imagen:</label>
                                <span class="text-gray-600">Opcional</span>
                                <input type="file" name="imagen" id="imagen" accept="image/*">
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar
                                    Parte de Conducta
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    <x-section-border />

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        DNI Alumno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombres
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellidos
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        DNI Profesor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombres
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellidos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Archivo
                    </th>
                    <th scope="col" class="px-9 py-3 ">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($justificaciones as $justificacion)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $justificacion->alumno->dni }}
                        </th>
                        <td class="px-6 py-4">
                            {{ ucfirst($justificacion->alumno->nombres) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ ucfirst($justificacion->alumno->apellido_paterno) }}
                            {{ ucfirst($justificacion->alumno->apellido_materno) }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $justificacion->profesores->dni }}
                        </td>
                        <td class="px-6 py-4">
                            {{ ucfirst($justificacion->profesores->nombres) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ ucfirst($justificacion->profesores->apellido_paterno) }}
                            {{ ucfirst($justificacion->profesores->apellido_materno) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $justificacion->descripcion }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $justificacion->imagen }}
                        </td>
                        {{-- Button actions --}}
                        <td class="flex items-center px-6 py-4 space-x-3">
                            @if (auth()->user()->can('editar usuarios') || auth()->user()->can('administrador'))
                            <div x-data="{ menuOpen: false, wideInfoModal: false}">
                                <button @click="wideInfoModal = !wideInfoModal"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-justificacion-id="{{ $justificacion->id }}"">
                                    Edit
                                </button>
                                <!-- start:: Wide Info Modal -->
                                    <div x-show="wideInfoModal" x-transition.opacity x-transition:enter.duration.100ms
                                    x-transition:leave.duration.300ms x-cloak
                                    class="fixed top-0 left-0 z-50 bg-black bg-opacity-70 h-screen w-full flex items-center justify-center">
                                    <div @click.away="wideInfoModal = false"
                                        class="relative w-5/6 md:w-3/4 lg:w-2/3 xl:w-1/2 bg-white p-10 rounded-lg shadow-xl dark:bg-gray-700 dark:border-gray-600">
                                        <span @click="wideInfoModal = false"
                                            class="absolute right-2 top-1 text-xl cursor-pointer hover:text-gray-600" title="Close">
                                            &#x2715
                                        </span>
                                        <div class="max-w-2xl mx-auto">
                                            <form method="POST" action="{{ route('justificaciones.update', $justificacion) }}" class="w-full max-w-md mx-auto">
                                                @csrf
                                                @method('PUT')
                                                <input id="alumno_id" name="alumno_id" type="text" value="{{$justificacion->alumno_id}}" class="hidden">
                                                <input id="profesor_id" name="profesor_id" type="text" value="{{$justificacion->profesor_id}}" class="hidden">
                                                <label for="descripcion" class="block mb-2 text-xl font-medium text-gray-900 dark:text-gray-900">Descripcion</label>
                                                <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    {{$justificacion->descripcion}}
                                                </textarea>
                                                <input type="file" name="imagen" id="imagen" accept="image/*" value="{{ $justificacion->imagen }}">
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end:: Wide Info Modal -->
                            </div>
                            @endcan
                            @if (auth()->user()->can('eliminar usuarios') || auth()->user()->can('administrador'))

                                <form action=" {{ route('justificaciones.destroy', $justificacion->id) }}"method="POST"
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

<script>
    // Espera a que el documento esté listo
    $(document).ready(function() {
        $('.edit-button').click(function() {
            var justificacion = $(this).data('justificacion-id');

            $.ajax({
                url: '{{ route("justificaciones.edit",$justificacion) }}' + justificacion,
                type: 'GET',
                success: function(response) {
                    $('#modal-body').html(response);
                    $('#editModal').modal('show');
                }
            });
        });
    });
</script>
</x-app-layout>
