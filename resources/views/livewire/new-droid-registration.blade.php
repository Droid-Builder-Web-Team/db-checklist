<div>
  <form wire:submit.prevent>
    <div class="overflow-hidden shadow sm:rounded-md">
      <div
        class="border border-white bg-white px-4 py-5 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-3">
            <label for="name" aria-autocomplete="name"
              class="p-6 uppercase text-gray-900 dark:text-gray-100">Name</label>
            <input type="text" wire:model.live="newDroidForm.name" id="name"
              class="mt-1 block w-full border-white bg-white text-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow focus:border-gray-400 focus:ring-gray-400 dark:bg-gray-800 sm:rounded-lg">
            @error('name')
              <span class="block pt-4 capitalize text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="description" class="p-6 uppercase text-gray-900 dark:text-gray-100">Description</label>
            <input type="text" wire:model.live="newDroidForm.description" id="description"
              class="mt-1 block w-full border-white bg-white text-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow focus:border-gray-400 focus:ring-gray-400 dark:bg-gray-800 sm:rounded-lg">
            @error('description')
              <span class="block pt-4 capitalize text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="display_image" class="p-6 uppercase text-gray-900 dark:text-gray-100">Image</label>
            <input type="file" wire:model.live="newDroidForm.display_image" id="display_image"
              class="mt-1 block w-full border-white bg-white text-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow focus:border-gray-400 focus:ring-gray-400 dark:bg-gray-800 sm:rounded-lg">
            @error('display_image')
              <span class="block pt-4 capitalize text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="version" class="p-6 uppercase text-gray-900 dark:text-gray-100">Version</label>
            <input type="text" wire:model.live="newDroidForm.version" id="version"
              class="mt-1 block w-full border-white bg-white text-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow focus:border-gray-400 focus:ring-gray-400 dark:bg-gray-800 sm:rounded-lg">
            @error('version')
              <span class="block pt-4 capitalize text-red-400">{{ $message }}</span>
            @enderror
          </div>

          <button wire:click="storeDroid"
            class="col-span-6 inline-flex justify-center rounded-md border border border-transparent bg-gray-400 px-4 py-2 text-sm font-medium uppercase text-white shadow-light-shadow shadow-md transition duration-500 hover:border-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
            Submit
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
