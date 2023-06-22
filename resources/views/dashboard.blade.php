<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-light-shadow hover:shadow-lighter-shadow transition duration-500 sm:rounded-lg text-center">
                @livewire('greeting-message')


                <div class="p-6 text-gray-900 dark:text-gray-100">
                @livewire('quotes-api')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
