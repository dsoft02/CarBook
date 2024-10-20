<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function activeUsers()
    {
        $users = User::where('status', 1)->get();
        return view('admin.users.active', compact('users'));
    }

    public function inactiveUsers()
    {
        $users = User::where('status', 0)->get();
        return view('admin.users.inactive', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'profile_picture' => 'nullable|image|max:5120',
            'role' => 'required|in:admin,customer,staff',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->role = $request->role;

        // Handle profile picture upload if present
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'profile_picture' => 'nullable|image|max:5120', // Max size 5MB
            'status' => 'required|boolean',
            'role' => 'required|in:admin,customer,staff',
        ]);

        $user = User::findOrFail($id);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];
        $user->status = $validatedData['status'];
        $user->role = $validatedData['role'];

        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User deactivated successfully.');
    }

    public function reactivate($id)
    {
         $user = User::findOrFail($id);
        $user->status = 1;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User reactivated successfully.');
    }


}
