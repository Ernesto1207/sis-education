<?php
$fechaMaxima = date('Y-m-d', strtotime('-10 years'));
?>
<x-app-layout>
    <form method="POST" action="{{ route('alumnos.store') }}">
        @csrf
        
        <p>id: {{$user->id}} </p>
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <p>Nombre: {{ $user->name }}</p>
        <p>Correo Electrónico: {{ $user->email }}</p>
        <!-- DNI -->
        <div class="form-group">
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" class="form-control" value="{{ old('dni') }}" required>
        </div>

        <!-- Nombres -->
        <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" class="form-control" value="{{ old('nombres') }}"
                required>
        </div>

        <!-- Apellido Paterno -->
        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control"
                value="{{ old('apellido_paterno') }}" required>
        </div>

        <!-- Apellido Materno -->
        <div class="form-group">
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" class="form-control"
                value="{{ old('apellido_materno') }}">
        </div>

        <!-- Género -->
        <div class="form-group">
            <label for="genero">Género:</label>
            <select id="genero" name="genero" class="form-control" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" max="<?php echo $fechaMaxima; ?>" class="form-control"
                value="{{ old('fecha_nacimiento') }}" required>
        </div>

        <!-- Ciudad -->
        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" class="form-control" value="{{ old('ciudad') }}"
                required>
        </div>

        <!-- Dirección -->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}"
                required>
        </div>

        <!-- Estado -->
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" class="form-control" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar Alumno</button>
        </div>
    </form>

</x-app-layout>
