<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  dark:text-gray-200 leading-tight shadow-md rounded-lg">
            {{ __('Usuarios y Roles') }} 
            {{-- <span class="uppercase">{{ $role->name }}</span> --}}
        </h2>
    </x-slot>

    <h2 class="font-semibold text-xl text-gray-800  dark:text-gray-200 leading-tight shadow-md rounded-lg">
        Nombre: <span class="uppercase">{{ $user->name }}</span>
    </h2>

    <div>
        {{-- {{ $permisos }} --}}
        <h5 class="dark:text-white">Lista de Roles</h5>
        {!! Form::model($user, ['route' => ['asignar.update', $user->id], 'method' => 'PUT']) !!}
        @foreach ($roles as $role)
            <div>
                <label class="text-white">
                    {!! Form::checkbox(' roles[]', $role->id, $user->hasAnyRole($role->id) ? : false, [
                        'class' =>
                            'appearance-none w-9 focus:outline-none checked:bg-blue-300 h-5 bg-gray-300 rounded-full before:inline-block before:rounded-full before:bg-blue-500 before:h-4 before:w-4 checked:before:translate-x-full shadow-inner transition-all duration-300 before:ml-0.5',
                    ]) !!}
                    <span class="ml-2 text-white">{{ $role->name }}</span>
                </label>
            </div>
        @endforeach
        {!! Form::submit('Asignar Roles', [
            'class' =>
                'mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800',
        ]) !!}
        {!! Form::close() !!}
    </div>
</x-app-layout>
