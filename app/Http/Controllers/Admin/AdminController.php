<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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


class AdminController extends Controller
{
    public function dashboard(){
        $pageTitle = 'Admin Dashboard';
        $latestBookings = Lease::latest()->limit(5)->get();
        $recentCars = Car::latest()->limit(5)->get();
        $totalBookings = Lease::count();
        $featuredCars = Car::where('is_featured', 1)->count();
        $totalCars = Car::count();
        $activeUsers = User::where('status', 1)->count();

        return view('admin.dashboard', compact('pageTitle', 'latestBookings', 'recentCars', 'totalBookings', 'featuredCars', 'totalCars', 'activeUsers'));
    }

    public function profile(){
        $admin = Auth::user();
        $pageTitle = 'My Profile';
        return view('admin.profile', compact('admin', 'pageTitle'));
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
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function showContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroyContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contacts')->with('success', 'Contact message deleted successfully.');
    }
}
