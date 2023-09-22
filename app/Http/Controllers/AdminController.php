<?php

namespace App\Http\Controllers;

use App\Models\MainframeDroid;
use App\Models\User;
use App\Models\UserDroid;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCount = User::whereNull('deleted_at')->count();
        $buildCount = UserDroid::whereNull('deleted_at')->count();
        $droidCount = MainframeDroid::whereNull('deleted_at')->count();

        $users = User::whereNull('deleted_at')->get();
        return view('admin', [
            'userCount' => $userCount,
            'buildCount' => $buildCount,
            'droidCount' => $droidCount,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createDroid()
    {
        return view('admin/droids/create-droid');
    }

    public function droidManagement()
    {
        return view('admin/droids/droid-management');
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