<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar Curso a ') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-4">
        @if (session('success'))
            <div class="bg-green-200 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('asignar-curso', ['id' => $alumno->id]) }}" method="POST"
            class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
            @csrf
            <div class="mb-4">
                <label for="alumno_id" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Alumno:</label>
                <select name="alumno_id" id="alumno_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-indigo-500">
                    @if ($alumno)
                        <option value="{{ $alumno->id }}">{{ $alumno->nombres }} {{ $alumno->apellido_paterno }}
                            {{ $alumno->apellido_materno }} </option>
                    @else
                        <option value="" disabled>No se encontró el alumno</option>
                    @endif
                </select>
            </div>
            <div class="mb-4">
                <label for="curso_id" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Curso:</label>
                {{-- <select name="curso_id" id="curso_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-indigo-500">
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }} {{$curso->horario_entrada}}</option>
                    @endforeach
                </select> --}}
                <select name="curso_id" id="curso_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-indigo-500"
                    onchange="actualizarHorario()">
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" data-horario="{{ $curso->horario_entrada }}">
                            {{ $curso->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="horario" class="form-label">Horario:</label>
                <input type="time" name="horario" id="horario" class="form-control"
                    value="{{ $curso->horario_entrada }}">
            </div>

            <button type="submit"
                class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline-indigo active:bg-indigo-700">
                Asignar Curso
            </button>
        </form>
    </div>
    <script>
        function actualizarHorario() {
            var cursoSelect = document.getElementById('curso_id');
            var horarioInput = document.getElementById('horario');

            // Obten el valor del horario desde el atributo 'data-horario' del elemento seleccionado
            var horarioSeleccionado = cursoSelect.options[cursoSelect.selectedIndex].getAttribute('data-horario');

            // Actualiza el valor del input del horario con el horario seleccionado
            horarioInput.value = horarioSeleccionado;
        }
    </script>

</x-app-layout>
