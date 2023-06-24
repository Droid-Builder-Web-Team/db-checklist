<?php

namespace App\Http\Livewire;

use App\Models\UserDroid;
use App\Models\UserToDo;
use Livewire\Component;

class UserTodoList extends Component
{
    public $open = false;
    public $modalVisible = false;
    public $state;
    public $newItemDescription;

    public function completeTodoItem($todoItemId)
    {
        $todoItem = UserToDo::findOrFail($todoItemId);
        $todoItem->completed = true;
        $todoItem->save();

        // Perform any other necessary actions

        // Re-render the component
        $this->render();
    }

    public function render()
    {
        $userTodo = UserToDo::where('user_id', auth()->user()->id)
            ->where('completed', '0')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->with(['userDroid', 'userDroid.mainframeDroid'])
            ->get();

        $userBuilds = UserDroid::where('user_id', auth()->user()->id)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->with(['userToDo', 'mainframeDroid'])
            ->get();

        return view('livewire.user-todo-list', [
            'userTodo' => $userTodo,
            'userBuilds' => $userBuilds,
        ]);
    }

    public function saveNewItem()
    {
        // Validation if required
        $this->validate([
            'newItemDescription' => 'required|string',
        ]);

        // Save the new item to the database
        $userTodo = new UserToDo();
        $userTodo->user_id = auth()->user()->id;
        $userTodo->description = $this->newItemDescription;
        $userTodo->completed = false;
        $userTodo->save();

        // Clear the input field and close the modal
        $this->newItemDescription = '';
        $this->closeModal();

        // Refresh the user todo list
        $this->fetchUserTodo();
    }

    public function closeModal()
    {
        $this->modalVisible = false;
        $this->open = false;
    }
}
