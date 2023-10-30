<x-app-layout>


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="h-full bg-gray-200 p-8">
                    <x-welcome />
                </div>
            </div>
        </div> --}}

    <div class="">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>
            <x-welcome/>
    </div>
</x-app-layout>
