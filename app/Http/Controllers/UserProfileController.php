<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }
    public function view_create()
    {
        $user = Auth::user();

        $createdUsers = User::where('createdBy', $user->id)->get();

        return view('admin.create-user', compact('user', 'createdUsers'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => '1234',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-user')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'createdBy' => auth()->id(),
            'role' => $request->role ?? 'staff',
        ]);

        return redirect()->route('create-user')->with('success', 'User created successfully');
    }
}
