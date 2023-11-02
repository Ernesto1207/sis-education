<?php
$fechaMaxima = date('Y-m-d', strtotime('-18 years'));
?>
<x-app-layout>
    <div class="">
        <form method="POST" action="{{ route('profesores.store') }}"
            class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
            @csrf

            <p class="text-gray-800 dark:text-gray-300">ID: {{ $user->id }}</p>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <p class="text-gray-800 dark:text-gray-300">Nombre: {{ $user->name }}</p>
            <p class="text-gray-800 dark:text-gray-300">Correo Electrónico: {{ $user->email }}</p>

            <!-- DNI -->
            <div class="mb-4">
                <label for="dni" class="block text-gray-700 dark:text-gray-300">DNI:</label>
                <input type="text" id="dni" name="dni" class="form-input" value="{{ old('dni') }}"
                    required>
            </div>

            <!-- Nombres -->
            <div class="mb-4">
                <label for="nombres" class="block text-gray-700 dark:text-gray-300">Nombres:</label>
                <input type="text" id="nombres" name="nombres" class="form-input" value="{{ old('nombres') }}"
                    required>
            </div>

            <!-- Apellido Paterno -->
            <div class="mb-4">
                <label for="apellido_paterno" class="block text-gray-700 dark:text-gray-300">Apellido Paterno:</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-input"
                    value="{{ old('apellido_paterno') }}" required>
            </div>

            <!-- Apellido Materno -->
            <div class="mb-4">
                <label for="apellido_materno" class="block text-gray-700 dark:text-gray-300">Apellido Materno:</label>
                <input type="text" id="apellido_materno" name="apellido_materno" class="form-input"
                    value="{{ old('apellido_materno') }}">
            </div>

            <!-- Género -->
            <div class="mb-4">
                <label for="genero" class="block text-gray-700 dark:text-gray-300">Género:</label>
                <select id="genero" name="genero" class="form-select" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Femenino">38 tipos de gays</option>
                </select>
            </div>

            <!-- email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 dark:text-gray-300">Email:</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
            </div>

             <!-- telefono -->
             <div class="mb-4">
                <label for="telefono" class="block text-gray-700 dark:text-gray-300">Telefono:</label>
                <input type="number" id="telefono" name="telefono" class="form-input" required>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-4">
                <label for="fecha_nacimiento" class="block text-gray-700 dark:text-gray-300">Fecha de
                    Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" max="<?php echo $fechaMaxima; ?>"
                    class="form-input" value="{{ old('fecha_nacimiento') }}" required>
            </div>

            <!-- Ciudad -->
            <div class="mb-4">
                <label for="ciudad" class="block text-gray-700 dark:text-gray-300">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" class="form-input" value="{{ old('ciudad') }}"
                    required>
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="direccion" class="block text-gray-700 dark:text-gray-300">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-input" value="{{ old('direccion') }}"
                    required>
            </div>

            <!-- Estado -->
            <div class="mb-4">
                <label for="estado" class="block text-gray-700 dark:text-gray-300">Estado:</label>
                <select id="estado" name="estado" class="form-select" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-700">Guardar
                    Alumno</button>
            </div>
        </form>
    </div>

</x-app-layout>
