<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $currentAdmin = auth()->user();

        $admins = User::where('role', 'admin')
                    ->where('id', '!=', $currentAdmin->id) // Exclude the current admin
                    ->latest()
                    ->get();

        return view('admin.admins.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'address' => 'required',
            'password' => 'required|min:7|max:255',
        ]);
        
        $attributes['role'] = 'admin';

        $attributes['password'] = Hash::make($request->password);

        // Create a new user record with validated attributes
        User::insert($attributes);

        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        return view('admin.admins.edit',[
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'phone' => 'required|unique:users,phone,' . $admin->id,
            'address' => 'required',
            'password' => 'nullable|min:7|max:255',
        ]);
        
        $attributes['role'] = 'admin';

        $admin->update($attributes);

        return redirect()->route('admin.admins.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return back();
    }
}
