<?php
$fechaMaxima = date('Y-m-d', strtotime('-10 years'));
?>
<x-app-layout>
    <form method="POST" action="{{ route('alumnos.store') }}" class="dark:bg-gray-800 p-4 rounded-lg shadow-md">
        @csrf
        <div class="shadow-md text-white rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-2">

                <input type="hidden" name="user_id" value="{{ $user->id }}"
                    class="appearance-none block w-full border rounded py-3 px-4 mb-3">

                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                        Nombre
                        de
                        Usuario:
                    </label>
                    <p
                        class="text-gray-800 dark:text-gray-300 appearance-none block w-full border rounded py-3 px-4 mb-3">
                        {{ $user->name }}</p>

                </div>
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                        Correo
                        Electrónico:
                    </label>
                    <p
                        class="text-gray-800 dark:text-gray-300 appearance-none block w-full border rounded py-3 px-4 mb-3">
                        {{ $user->email }}</p>
                </div>
            </div>
        </div>



        <!-- component -->
        <div class="shadow-md rounded px-8 text-white pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
                <!-- DNI -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                        DNI
                    </label>
                    <input class="appearance-none block w-full  bg-transparent border rounded py-3 px-4 mb-3"
                        type="text" placeholder="78945612" id="dni" name="dni" required>
                </div>
                <!-- Nombres -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide   text-xs font-bold mb-2" for="grid-last-name">
                        Nombres
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4" id="nombres"
                        name="nombres" type="text" placeholder="Nombres" required>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <!-- Apellido Paterno -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                        Apellido Paterno
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4 mb-3"
                        id="apellido_paterno" name="apellido_paterno" type="text" placeholder="Apellido Paternone"
                        required>
                </div>

                <!-- Apellido Materno -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                        Apellido Materno
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4"
                        id="apellido_materno" name="apellido_materno" type="text" placeholder=" Apellido Materno"
                        required>
                </div>

            </div>

            <div class="-mx-3 md:flex mb-6">
                <!-- Grado -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                        Grado
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4 mb-3"
                        id="grado" name="grado" type="text" placeholder="Grado" required>
                </div>

                <!-- Seccion -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                        Seccion
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4" id="seccion"
                        name="seccion" type="text" placeholder="Seccion">
                </div>

            </div>

            <div class="-mx-3 md:flex mb-2">

                <!-- Fecha de Nacimiento -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-city">
                        Fecha de Nacimiento
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4" id="grid-city"
                        type="date" id="fecha_nacimiento" name="fecha_nacimiento" max="<?php echo $fechaMaxima; ?>" required>
                </div>

                <!-- Género -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                        Género
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-transparent border  py-3 px-4 pr-8 rounded"
                            id="genero" name="genero" required>
                            <option class="bg-gray-900"value="Masculino">Masculino</option>
                            <option class="bg-gray-900" value="Femenino">Femenino</option>
                        </select>
                    </div>
                </div>

                <!-- Ciudad -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-zip">
                        Ciudad
                    </label>
                    <input class="appearance-none block w-full  bg-transparent  border  rounded py-3 px-4"
                        id="grid-zip" type="text" id="ciudad" name="ciudad" required>
                </div>

            </div>
            <div class="-mx-3 md:flex mb-2">
                <!-- Dirección -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-city">
                        Dirección
                    </label>
                    <input class="appearance-none block w-full bg-transparent border rounded py-3 px-4" id="grid-city"
                        type="text" id="direccion" name="direccion" required>
                </div>

                <!-- Estado -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                        Estado
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-transparent border  py-3 px-4 pr-8 rounded"
                            id="estado" name="estado" required>
                            <option class="bg-gray-900" value="Activo">Activo</option>
                            <option class="bg-gray-900" value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex items-center justify-center mb-2">
                <div class=" px-3 py-10">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Alumno
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
