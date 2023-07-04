<?php

namespace App\Http\Controllers;

use App\Models\UserDroid;
use App\Models\UserToDo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

        return view('dashboard', [
            'userTodo' => $userTodo,
            'userBuilds' => $userBuilds,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
