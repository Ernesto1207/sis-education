<x-app-layout>
    <form method="POST" action="{{ route('dni.validar') }}">
        @csrf
        <label class="text-white" for="dni">Ingrese el DNI del alumno:</label>
        <input type="text" name="dni" id="dni" required>
        <button class="text-white" type="submit">Validar DNI</button>
    </form>
</x-app-layput>