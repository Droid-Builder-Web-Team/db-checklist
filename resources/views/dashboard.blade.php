<x-app-layout>
  <x-notifications />

  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
      <div
        class="overflow-hidden bg-white text-center shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
        @livewire('greeting-message')
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @livewire('quotes-api')
        </div>
      </div>
    </div>
  </div>

  <div class="py-3">
    <div class="col-span-2">
      <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
        <div
          class="overflow-hidden bg-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
          <div class="w-100 flex flex-1 flex-col gap-2 p-6 text-base text-gray-900 dark:text-gray-100">
            <p class="mb-2 text-center font-bold uppercase underline underline-offset-sm">My Todo List</p>
            <div x-data="{ modalVisible: false, open: false }">
              <button @click="modalVisible = true, open = true"
                class="group mx-auto my-2 flex w-fit items-center gap-3 rounded border border-gray-100 px-6 py-1 text-gray-100 transition-colors hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring active:bg-gray-100">
                Add New Item
                <i class="fa-solid fa-plus group-hover:rotate-45"></i>
              </button>

              <div x-show="modalVisible && open" class="modal-wrapper">
                <div
                  class="todo-modal bg-white shadow-light-shadow transition duration-500 hover:shadow-lighter-shadow dark:bg-gray-800 sm:rounded-lg">
                  <div class="w-100">
                    <div class="modal-header grid grid-cols-2">
                      <h3>Add a new item</h3>
                      <button class="close-button justify-self-end transition-colors"
                        @click="modalVisible = false, open = false">
                        <i class="fa-solid fa-x"></i>
                      </button>
                    </div>

                    <div class="form-item">
                      <label for="user_droid_id">Assign this item to a droid you're building
                        (optional):</label>
                      <div class="w-100">
                        <select name="user_droid_id">
                          <option value="" selected>Please select a droid to assign this item
                            to
                          </option>
                          <option>Test</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-item">
                      <label>Item Description:</label>
                      <textarea name="text" placeholder="Patch Death Star Exhaust Port..."></textarea>
                    </div>

                    <div class="button-wrapper justify-center">
                      <button
                        class="inline-block rounded border border-gray-100 px-6 py-1 text-gray-100 transition-colors hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring active:bg-gray-100"
                        @click="modalVisible = false, open = false">
                        Cancel
                      </button>

                      <button onclick="saveItem()"
                        class="inline-block rounded border border-gray-100 px-6 py-1 text-gray-100 transition-colors hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring active:bg-gray-100">
                        Save
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                @if (count($userTodo) > 0)
                  <ul class="custom-list custom-list--user-todo text-center" id="todo-list">
                    @foreach ($userTodo as $todoItem)
                      <li class="grid grid-cols-3 items-center justify-evenly odd:bg-gray-800 even:bg-gray-600">
                        <span class="list-item">{{ $todoItem->text }}</span>
                        @if ($todoItem->user_droid_id)
                          <span>{{ $todoItem->user_droid->mainframe_droid->name }}</span>
                        @else
                          <span>Not assigned to a build</span>
                        @endif
                        <div class="button-wrapper flex flex-row justify-center gap-4">
                          <button onclick="markAsComplete({{ $todoItem->id }})">
                            <i class="fa-solid fa-square-check text-2xl transition-colors hover:text-green-500"></i>
                          </button>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                @else
                  <div>
                    <p class="text-center">Hurray! You have nothing to do!</p>
                  </div>
                @endif
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
<script>
  function saveItem() {
    // Get the input values from the form
    let userDroidId = document.querySelector('select[name="user_droid_id"]').value;
    let itemDescription = document.querySelector('textarea[name="text"]').value;

    // Create the payload object
    let payload = {
      user_droid_id: userDroidId,
      text: itemDescription
    };

    // Send the AJAX request
    axios.post('/api/todo/store', payload)
      .then(response => {
        if (response.status === 201) {

          // Clear the input values
          document.querySelector('select[name="user_droid_id"]').value = '';
          document.querySelector('textarea[name="text"]').value = '';

          // Show a success notification
          showSuccessNotification();
          setTimeout(() => {
            location.reload();
          }, 2000);
        }
      })
      .catch(error => {
        // Show a failure notification
        showFailureNotification(error);
      });

    fetchUserTodoDebouncedWrapper();

  }

  function showSuccessNotification() {
    const notification = window.$wireui.notify({
      title: 'Item saved!',
      description: 'Your item was successfully added.',
      icon: 'success'
    });

  }

  function showFailureNotification(error) {
    const notification = window.$wireui.notify({
      title: 'Whoops! Something went wrong',
      description: 'There was an issue adding this item -' + ' ' + error,
      icon: 'error'
    });
  }

  function showSuccessCompleteNotification() {
    const notification = window.$wireui.notify({
      title: 'Item Completed',
      description: 'Your item was successfully completed.',
      icon: 'success'
    });

  }

  function showFailureCompleteNotification(error) {
    const notification = window.$wireui.notify({
      title: 'Whoops! Something went wrong',
      description: 'There was an issue completing this item -' + ' ' + error,
      icon: 'error'
    });
  }

  let fetchUserTodoDebounced = null;

  function fetchUserTodoDebouncedWrapper() {
    clearTimeout(fetchUserTodoDebounced);
    fetchUserTodoDebounced = setTimeout(() => {
      window.livewire.dispatch('fetchUserTodo');
    }, 300); // Adjust the debounce delay as needed
  }

  function markAsComplete(toDoItemId) {
    let payload = {
      todoItem: toDoItemId,
      completed: true,
    };

    axios.put(`/api/todo/update/${toDoItemId}`, payload)
      .then(response => {
        if (response.status === 200) {
          showSuccessCompleteNotification();
          setTimeout(() => {
            location.reload();
          }, 2000);
        }
      })
      .catch(error => {
        showFailureCompleteNotification();
      });

    fetchUserTodoDebouncedWrapper();
  }
</script>
