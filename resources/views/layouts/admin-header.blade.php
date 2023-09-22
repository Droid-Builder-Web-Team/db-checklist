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
