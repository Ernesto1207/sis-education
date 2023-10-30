<?php
// Calcula la fecha mínima permitida hace 10 años a partir de la fecha actual
$fechaMaxima = date('Y-m-d', strtotime('-10 years'));
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edicion de Alumnos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-center text-white text-2xl pt-5">Formulario de Edicion de Alumnos</h1>

                @if ($errors->any())
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                        role="alert">

                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info </span>
                                        <span class="font-medium"> Danger alert!
                                        </span>{{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif


                <div class="container max-w-full mx-auto  px-6">
                    <div class=" mx-auto px-6">
                        <div class="relative flex flex-wrap">
                            <div class="w-full relative">
                                <div class="md:mt-6">
                                    <form class="mt-3" method="POST" action="{{ route('alumnos.update', $alumno) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mx-auto max-w-lg ">
                                            <div class="grid grid-cols-2 gap-x-5">
                                                <div class="py-1">
                                                    <span class="px-1 text-sm text-gray-600 dark:text-white">DNI</span>
                                                    <input placeholder="" type="number" name="dni" id="dni"
                                                        class="form-input text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                                        value="{{ $alumno->dni }}">
                                                </div>
                                                <div class="py-1">
                                                    <span
                                                        class="px-1 text-sm text-gray-600 dark:text-white">Nombre</span>
                                                    <input placeholder="" type="text" name="nombres"
                                                        class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" value="{{$alumno->nombres}}">
                                                </div>
                                                <div class="py-1">
                                                    <span class="px-1 text-sm text-gray-600 dark:text-white">Apellido
                                                        Paterno</span>
                                                    <input placeholder="" type="text" name="apellido_paterno"
                                                        class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" value="{{$alumno->apellido_paterno}}">
                                                </div>
                                                <div class="py-1">
                                                    <span class="px-1 text-sm text-gray-600 dark:text-white">Apellido
                                                        Materno</span>
                                                    <input placeholder="" type="text" name="apellido_materno"
                                                        class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" value="{{$alumno->apellido_materno}}">
                                                </div>
                                                <div class="py-1">
                                                    <span
                                                        class="px-1 text-sm text-gray-600 dark:text-white">Genero</span>
                                                    <select id="genero" name="genero"
                                                        class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                                        required>
                                                        <option value="Masculino" {{ $alumno->genero === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                                        <option value="Femenino" {{ $alumno->genero === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="py-1">
                                                    <span class="px-1 text-sm text-gray-600 dark:text-white">Fecha de
                                                        Nacimiento</span>
                                                    <input placeholder="" type="date" max="<?php echo $fechaMaxima; ?>"" name="fecha_nacimiento"
                                                        class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" value="{{$alumno->fecha_nacimiento}}">
                                                </div>
                                                <div class="py-1">
                                                    <span
                                                        class="px-1 text-sm text-gray-600 dark:text-white">Ciudad</span>
                                                    <input placeholder="" type="text" name="ciudad"
                                                        class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" value="{{$alumno->ciudad}}">
                                                </div>
                                                <div class="py-1">
                                                    <span
                                                        class="px-1 text-sm text-gray-600 dark:text-white">Direccion</span>
                                                    <input placeholder="" type="text" name="direccion"
                                                        class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" value="{{$alumno->direccion}}">
                                                </div>
                                                <div class="py-1">
                                                    <span
                                                        class="px-1 text-sm text-gray-600 dark:text-white">Estado</span>
                                                    <select id="estado" name="estado"
                                                        class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                                                        required>
                                                        <option value="Activo" {{ $alumno->estado === 'Activo' ? 'selected' : '' }}>Activo</option>
                                                        <option value="Inactivo"  {{ $alumno->estado === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button
                                                class="mt-3 text-lg font-semibold bg-gray-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                                                Actualizar
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
