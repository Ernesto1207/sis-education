    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight shadow-md rounded-lg">
                {{ __('Administracion de Usuarios') }}
            </h2>
        </x-slot>
        {{-- crear usuario --}}
        @can('crear usuarios')
            <div class="">
                <div x-data="{ modelOpen: false }">
                    <button @click="modelOpen =!modelOpen"
                        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>

                        <span>Crear Nuevo Usuario</span>
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
                                    <h1 class="text-xl font-medium text-gray-800 ">Nuevo Usuario</h1>

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

                                <form class="mt-5" method="POST" action="{{ route('usuarios.store') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del
                                            Usuario</label>
                                        <input type="text" name="name" id="name" class="form-input"
                                            value="{{ old('name') }}" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo
                                            Electrónico</label>
                                        <input type="email" name="email" id="email" class="form-input"
                                            value="{{ old('email') }}" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="password"
                                            class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-input" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="tipo_usuario"
                                            class="block text-gray-700 text-sm font-bold mb-2">Selecciona tu tipo de
                                            usuario:</label>
                                        <select name="tipo_usuario" id="tipo_usuario" class="form-control" required>
                                            <option value="">Selecciona una opción</option>
                                            <option value="Alumno">Alumno</option>
                                            <option value="Profesor">Profesor</option>
                                        </select>
                                    </div>

                                    <div class="mt-6">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear
                                            Usuario</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        {{-- end-user --}}
        <x-section-border />

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Creacion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Modificacion
                        </th>

                        <th scope="col" class="px-9 py-3 ">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->updated_at }}
                            </td>

                            <td class="flex items-center px-6 py-4 space-x-3">
                                {{-- @can('editar usuarios') --}}
                                <a href="{{ route('asignar.edit', $user) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                {{-- @endcan --}}
                                @can('eliminar usuarios')
                                    <form action="{{ route('asignar.destroy', $user) }}" method="POST"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer">
                                        @csrf
                                        @method('deleted')
                                        Remove
                                    </form>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $users->links() }}
        </div>

        <x-section-border />

    </x-app-layout>
