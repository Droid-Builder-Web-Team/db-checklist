<x-app-layout>
    <x-notifications/>

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

    <div class="py-3">
        <div class="col-span-2">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-light-shadow hover:shadow-lighter-shadow transition duration-500 sm:rounded-lg">
                    <div class="p-6 w-100 flex flex-1 flex-col gap-2 text-gray-900 dark:text-gray-100 text-base">
                        <p class="uppercase underline underline-offset-sm text-center font-bold mb-2">My Todo List</p>
                        <div x-data="{ modalVisible: false, open: false }">
                            <button
                                @click="modalVisible = true, open = true"
                                class="w-fit mx-auto my-2 px-6 py-1 flex items-center gap-3 group transition-colors text-gray-100 border border-gray-100 rounded hover:bg-gray-100 hover:text-gray-900 active:bg-gray-100 focus:outline-none focus:ring"
                            >
                                Add New Item
                                <i class="fa-solid fa-plus group-hover:rotate-45"></i>
                            </button>

                            <div x-show="modalVisible && open" class="modal-wrapper">
                                <div
                                    class="todo-modal bg-white dark:bg-gray-800 shadow-light-shadow hover:shadow-lighter-shadow transition duration-500 sm:rounded-lg">
                                    <div class="w-100">
                                        <div class="modal-header grid grid-cols-2">
                                            <h3>Add a new item</h3>
                                            <button class="justify-self-end close-button transition-colors"
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
                                            <textarea name="text"
                                                      placeholder="Patch Death Star Exhaust Port..."></textarea>
                                        </div>

                                        <div class="button-wrapper justify-center">
                                            <button
                                                class="inline-block px-6 py-1 transition-colors text-gray-100 border border-gray-100 rounded hover:bg-gray-100 hover:text-gray-900 active:bg-gray-100 focus:outline-none focus:ring"
                                                @click="modalVisible = false, open = false">
                                                Cancel
                                            </button>

                                            <button
                                                onclick="saveItem()"
                                                class="inline-block px-6 py-1 transition-colors text-gray-100 border border-gray-100 rounded hover:bg-gray-100 hover:text-gray-900 active:bg-gray-100 focus:outline-none focus:ring">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                @if(count($userTodo) > 0)
                                    <ul class="custom-list custom-list--user-todo text-center">
                                        @foreach ($userTodo as $todoItem)
                                            <li class="grid grid-cols-3 items-center justify-evenly even:bg-gray-600 odd:bg-gray-800">
                                                <span class="list-item">{{ $todoItem->text }}</span>
                                                @if($todoItem->user_droid_id)
                                                    <span>{{$todoItem->user_droid->mainframe_droid->name}}</span>
                                                @else
                                                    <span>Not assigned to a build</span>
                                                @endif
                                                <div class="button-wrapper flex flex-row justify-center gap-4">
                                                    <button wire:click="completeTodoItem(1)">
                                                        <i class="fa-solid fa-square-check transition-colors text-2xl hover:text-green-500"></i>
                                                    </button>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <div><p class="text-center">Hurray! You have nothing to do!</p></div>
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

        console.log("User authenticated:", {{ auth()->check() }});

        // Send the AJAX request
        axios.post('/api/todo/store', payload)
            .then(response => {
                if (response.status === 201) {
                    console.log('yes');
                    // Clear the input values
                    document.querySelector('select[name="user_droid_id"]').value = '';
                    document.querySelector('textarea[name="text"]').value = '';

                    // Fetch the updated user todo list
                    Livewire.emit('fetchUserTodo');

                    // Show a success notification
                    showSuccessNotification();

                    // Call the closeModal() method in the Livewire component
                    Livewire.emit('closeModal');
                }
            })
            .catch(error => {
                // Show a failure notification
                showFailureNotification(error);
            });
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
</script>
