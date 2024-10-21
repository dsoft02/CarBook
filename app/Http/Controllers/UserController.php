<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use App\Models\Car;
use App\Models\Lease;
use App\Models\User;
use App\Models\Contact;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        $pageTitle = 'My Profile';
        return view('user.profile', compact('user', 'pageTitle'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->phone = $request->input('phone');
        $admin->address = $request->input('address');

        if ($request->hasFile('profile_picture')) {
            if ($admin->profile_picture) {
                Storage::disk('public')->delete($admin->profile_picture);
            }

            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $admin->profile_picture = $profilePicturePath;
        }

        $admin->save();

        return back()->with('success', 'Profile updated successfully.');
    }



    public function updatePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Get the current authenticated user
        $admin = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->input('current_password'), $admin->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }

        // Update the password
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        // Redirect back with a success message
        return back()->with('success', 'Password updated successfully.');
    }

    public function contact()
    {
        $userEmail = Auth::user()->email;
        $contacts = Contact::where('email', $userEmail)->get();
        return view('user.contacts.index', compact('contacts'));
    }

    public function createContact(){
        return view('user.contacts.create');
    }

    public function storeContact(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'nullable|string|max:255', // Make name nullable
            'email' => 'nullable|email|max:255', // Make email nullable
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Use the authenticated user's details if name or email is empty
        $name = $request->name ?? Auth::user()->name;
        $email = $request->email ?? Auth::user()->email;

        // Ensure name and email are provided
        if (empty($name) || empty($email)) {
            return redirect()->back()->with('error', 'Name and email are required.');
        }

        // Create a new contact entry
        Contact::create([
            'name' => $name,
            'email' => $email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Redirect back with a success message
        return redirect()->route('user.contacts')->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }

    public function showContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('user.contacts.show', compact('contact'));
    }

    public function destroyContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('user.contacts')->with('success', 'Contact message deleted successfully.');
    }


}
