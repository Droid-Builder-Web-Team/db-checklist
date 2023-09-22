<x-app-layout>
  <x-notifications />

  <x-admin-header />

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
