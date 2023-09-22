<x-app-layout>
  <x-notifications />

  <x-slot name="header">
    <h2 class="pb-2 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Admin Dashboard') }}
    </h2>
    <div class="flex flex-row items-center gap-4">
      <h3 class="text-lg font-medium leading-tight text-gray-800 dark:text-gray-200">Quick Links:</h3>
      <x-nav-link href="{{ route('create_droid') }}" :active="request()->routeIs('create_droid')"
        class="text-gray-800 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit dark:text-gray-200">
        {{ __('New Droid') }}
      </x-nav-link>
      <x-nav-link href="{{ route('create_droid') }}" :active="request()->routeIs('create_droid')"
        class="text-gray-800 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit dark:text-gray-200">
        {{ __('User Management') }}
      </x-nav-link>
      <x-nav-link href="{{ route('create_droid') }}" :active="request()->routeIs('create_droid')"
        class="text-gray-800 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit dark:text-gray-200">
        {{ __('Tickets') }}
      </x-nav-link>
      <x-nav-link href="{{ route('create_droid') }}" :active="request()->routeIs('create_droid')"
        class="text-gray-800 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit dark:text-gray-200">
        {{ __('Logs') }}
      </x-nav-link>
    </div>
  </x-slot>

  <div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
      <div class="pb-2 text-4xl uppercase text-gray-800 dark:text-white">Quick Stats</div>
      <div class="grid grid-cols-3 gap-6">
        <div
          class="overflow-hidden bg-white p-6 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
          <div class="text-xl text-gray-800 dark:text-white">
            Total Users: {{ $userCount }}
          </div>
        </div>
        <div
          class="overflow-hidden bg-white p-6 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
          <div class="text-xl text-gray-800 dark:text-white">
            Total Builds: {{ $buildCount }}
          </div>
        </div>
        <div
          class="overflow-hidden bg-white p-6 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
          <div class="text-xl text-gray-800 dark:text-white">
            Total Droids: {{ $droidCount }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
      <div class="pb-2 text-4xl uppercase text-gray-800 dark:text-white">Users</div>
      <div
        class="overflow-hidden bg-white p-6 shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800">
        @livewire('users-table')
      </div>
    </div>
</x-app-layout>
