<x-app-layout>
  <x-notifications />

  <x-slot name="header">
    <h2 class="pb-2 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Admin Dashboard') }}
    </h2>
    <div class="flex flex-row gap-4">
      <h3 class="text-lg font-medium leading-tight text-gray-800 dark:text-gray-200">Quick Links:</h3>
      <a href=""
        class="text-gray-800 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit dark:text-gray-200">New
        Droid</a>
      <a href=""
        class="text-gray-800 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit dark:text-gray-200">Link
        ???</a>
      <a href=""
        class="text-gray-800 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit dark:text-gray-200">Link
        ????</a>
      <a href=""
        class="text-gray-800 underline decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit dark:text-gray-200">Logs</a>
    </div>
  </x-slot>

  <div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
      <div class="pb-2 text-4xl uppercase text-white">Quick Stats</div>
      <div class="grid grid-cols-3 gap-6">
        <div
          class="overflow-hidden bg-white p-6 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
          <div class="text-xl text-white">
            Total Users: {{ $userCount }}
          </div>
        </div>
        <div
          class="overflow-hidden bg-white p-6 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
          <div class="text-xl text-white">
            User Droids: 1
          </div>
        </div>
        <div
          class="overflow-hidden bg-white p-6 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
          <div class="text-xl text-white">
            Total Droids: 1
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
      <div class="pb-2 text-4xl uppercase text-white">Users</div>
      <div
        class="overflow-hidden bg-white p-6 text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
        <table class="w-100 table-auto border-collapse border text-white">
          <thead>
            <tr>
              <th class="border">User</th>
              <th class="border">Date Registered</th>
              <th class="border">Last Online</th>
              <th class="border">Confirmed</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="border">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
              <td class="border">Malcolm Lockyer</td>
              <td class="border">1961</td>
              <td class="border">No</td>

            </tr>
            <tr>
              <td class="border">Witchy Woman</td>
              <td class="border">The Eagles</td>
              <td class="border">1972</td>
              <td class="border">Yes</td>

            </tr>
            <tr>
              <td class="border">Shining Star</td>
              <td class="border">Earth, Wind, and Fire</td>
              <td class="border">1975</td>
              <td class="border">Yes</td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
</x-app-layout>
