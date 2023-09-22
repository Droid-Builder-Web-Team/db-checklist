<x-app-layout>
  <x-notifications />

  <x-admin-header />

  <div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
      <div
        class="overflow-hidden bg-white text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
        <div class="pt-6 text-2xl text-gray-900 dark:text-gray-100">
          New Mainframe Droid Form
        </div>

        <div class="p-6 text-gray-900 dark:text-gray-100">
          Please fill out the form below to create a new droid.
        </div>

        {{-- Form --}}
        <div class="grid grid-cols-4">
          <div class="col-span-4 col-start-1 p-6">
            @livewire('new-droid-registration')
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
