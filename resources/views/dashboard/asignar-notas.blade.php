<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar Nota a ') }}
        </h2>
    </x-slot>

    {{-- <form action="{{ route('asignar-nota') }}" method="POST">
        @csrf
        <label class="text-white" for="">DNI del Alumno:</label>
        <input class="" name="dni" id="dni" value="{{ $dni }}" readonly>
        <p class="text-white">Nombre del Alumno: {{ $nombre }}</p>

        <label for="curso" class="text-white">Seleccionar Curso:</label>
        <select name="curso_id" id="curso_id" required>
            @foreach ($cursosDelAlumno as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
            @endforeach
        </select>

        <label for="nota" class="text-white">Nota:</label>
        <input type="text" name="valor" id="valor" required>

        <button type="submit" class="text-white">Asignar Nota</button>
    </form> --}}


    <!-- component -->
    <div class="text-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <form action="{{ route('asignar-nota') }}" method="POST">
            @csrf
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                        for="grid-first-name">
                        Dni
                    </label>
                    <input
                    class="text-white appearance-none block w-full bg-transparent border border-red rounded py-3 px-4 mb-3" name="dni" id="dni" value="{{ $dni }}" readonly>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                        for="grid-last-name">
                        Nombres
                    </label>
                    <p
                        class="text-white appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                        {{ $nombre }}
                        {{ $apellidoP }}
                        {{ $apellidoM }}
                    </p>


                </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                        for="grid-state">
                        Curso
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-transparent border py-3 px-4 pr-8 rounded"
                            name="curso_id" id="curso_id" required>
                            @foreach ($cursosDelAlumno as $curso)
                                <option class="bg-gray-900" value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="Nota">
                        Nota
                    </label>
                    <input class="appearance-none block w-full bg-transparent rounded py-3 px-4" type="text"
                        name="valor" id="valor" placeholder="0 - 20">
                </div>
            </div>

            <div class="-mx-3 my-5 md:flex mb-2 items-center justify-center ">
                <button
                    class=" flex shadow w-32 border-blue-600 border-2 rounded-full focus:outline-none focus:border-blue-600 px-4 py-2 text-blue-600 hover:bg-blue-600 hover:text-white" type="submit">
                    <span>Asignar Nota</span>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
