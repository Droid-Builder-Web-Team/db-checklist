<?php

namespace App\Http\Livewire;

use App\Models\UserDroid;
use App\Models\UserToDo;
use Illuminate\Http\Request;
use Livewire\Component;

class UserTodoList extends Component
{
    public $open = false;
    public $modalVisible = false;
    public $state;
    public $newItemDescription;
    protected $listeners = ['closeModal'];
    public $userTodo;
    public $userBuilds;

    public function update($todoItemId)
    {
        $todoItem = UserToDo::findOrFail($todoItemId);
        $todoItem->completed = true;
        $todoItem->save();
        $this->render();
    }


public function render()
{
    $userId = auth()->user()->id;
    
    // Fetch user todo items and user builds
    $userTodo = UserToDo::where('user_id', $userId)
        ->where('completed', '0')
        ->whereNull('deleted_at')
        ->orderBy('created_at', 'desc')
        ->with(['userDroid', 'userDroid.mainframeDroid'])
        ->get();

    $userBuilds = UserDroid::where('user_id', $userId)
        ->whereNull('deleted_at')
        ->orderBy('created_at', 'desc')
        ->with(['userToDo', 'mainframeDroid'])
        ->get();

    // Set the fetched data to component properties
    $this->userTodo = $userTodo;
    $this->userBuilds = $userBuilds;

    return view('livewire.user-todo-list', [
        'userTodo' => $userTodo,
        'userBuilds' => $userBuilds,
    ]);
}

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_droid_id' => 'nullable',
            'text' => 'required',
        ]);

        $todoItem = new UserToDo();
        $todoItem->user_id = auth()->user()->id;
        $todoItem->user_droid_id = $validatedData['user_droid_id'];
        $todoItem->text = $validatedData['text'];
        $todoItem->save();

        // Emit an event to notify the component that a new item was added
        // $this->emit('closeModal');

        return response()->json($todoItem, 201);
    }

    public function closeModal()
    {
        $this->modalVisible = false;
        $this->open = false;
    }

    public function fetchUserTodo()
    {
        dd('it hits the function');
        $this->userTodo = UserToDo::where('user_id', auth()->user()->id)
            ->where('completed', '0')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->with(['userDroid', 'userDroid.mainframeDroid'])
            ->get();
    }
}