<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.show_profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('sessions.create');
    }

    public function store() {

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect()->route('admin.profile.index');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $admin = auth()->user();

        return view('admin.profile.edit_profile',[
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::findOrfail(auth()->id());

        $attributes = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|unique:users,phone,' . $user->id,
            'address' => 'required',
            'password' => 'nullable|min:7|max:255',
        ]);

        $attributes['role'] = 'admin';

        $user->update($attributes);

        return redirect()->route('admin.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
