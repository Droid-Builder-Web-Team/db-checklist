<div>
    <!-- Render the user todo items -->
    <h2>User Todo List</h2>
    <ul>
        @foreach ($userTodo as $todoItem)
            <li>{{ $todoItem->title }}</li>
        @endforeach
    </ul>

    <!-- Render the user builds -->
    <h2>User Builds</h2>
    <ul>
        @foreach ($userBuilds as $build)
            <li>{{ $build->name }}</li>
        @endforeach
    </ul>

    <!-- Example button to complete a todo item -->
    <button wire:click="completeTodoItem(1)">Complete Todo Item</button>
</div>
