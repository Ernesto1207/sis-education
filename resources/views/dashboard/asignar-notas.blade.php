<x-app-layout>
    <form action="{{ route('asignar-nota') }}" method="POST">
        @csrf
        <label class="text-white" for="">DNI del Alumno:</label>
        <input class="" name="dni" id="dni" value="{{$dni}}" readonly>
        <p class="text-white">Nombre del Alumno: {{ $nombre }}</p>

        <label for="curso" class="text-white">Seleccionar Curso:</label>
        <select name="curso_id" id="curso_id" required>
            @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}">{{ $curso->nombre}}</option>
            @endforeach
        </select>

        <label for="nota" class="text-white">Nota:</label>
        <input type="text" name="valor" id="valor" required>

        <button type="submit" class="text-white">Asignar Nota</button>
    </form>
</x-app-layout>