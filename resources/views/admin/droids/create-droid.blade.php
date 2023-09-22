<x-app-layout>
  <x-notifications />

  <x-slot name="header">
    <h2 class="pb-2 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Admin Dashboard') }}
    </h2>
    <div class="flex flex-row gap-4">
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
      <div
        class="overflow-hidden bg-white text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
        <div class="pt-6 text-2xl text-gray-900 dark:text-gray-100">
          New Mainframe Droid Form
        </div>

        <div class="p-6 text-gray-900 dark:text-gray-100">
          Please fill out the form below to create a new droid.
        </div>

        {{-- Form Start --}}
        <div class="grid grid-cols-4">
          <div class="col-span-4 col-start-1 p-6">
            <form wire:submit="storeDroid">
              <div class="overflow-hidden shadow sm:rounded-md">
                <div
                  class="border border-white bg-white px-4 py-5 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="name" class="p-6 uppercase text-gray-900 dark:text-gray-100">Name</label>
                      <input type="text" wire:model.live="name" id="name"
                        class="mt-1 block w-full border-white bg-white text-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow focus:border-gray-400 focus:ring-gray-400 dark:bg-gray-800 sm:rounded-lg">
                      @error('name')
                        <span class="block pt-4 capitalize text-red-400">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="description"
                        class="p-6 uppercase text-gray-900 dark:text-gray-100">Description</label>
                      <input type="text" wire:model.live="description" id="description"
                        class="mt-1 block w-full border-white bg-white text-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow focus:border-gray-400 focus:ring-gray-400 dark:bg-gray-800 sm:rounded-lg">
                      @error('description')
                        <span class="block pt-4 capitalize text-red-400">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="display_image" class="p-6 uppercase text-gray-900 dark:text-gray-100">Image</label>
                      <input type="file" wire:model.live="display_image" id="display_image"
                        class="mt-1 block w-full border-white bg-white text-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow focus:border-gray-400 focus:ring-gray-400 dark:bg-gray-800 sm:rounded-lg">
                      @error('display_image')
                        <span class="block pt-4 capitalize text-red-400">{{ $message }}</span>
                      @enderror
                    </div>



                    <div class="col-span-6 sm:col-span-3">
                      <label for="version" class="p-6 uppercase text-gray-900 dark:text-gray-100">Version</label>
                      <input type="text" wire:model.live="version" id="version"
                        class="mt-1 block w-full border-white bg-white text-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow focus:border-gray-400 focus:ring-gray-400 dark:bg-gray-800 sm:rounded-lg">
                      @error('version')
                        <span class="block pt-4 capitalize text-red-400">{{ $message }}</span>
                      @enderror
                    </div>

                    <button type="submit"
                      class="col-span-6 inline-flex justify-center rounded-md border border border-transparent bg-gray-400 px-4 py-2 text-sm font-medium uppercase text-white shadow-light-shadow shadow-md transition duration-500 hover:border-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                      Submit
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
