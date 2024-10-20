<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Car;

class SiteController extends Controller
{
    public function index(){
        $pageTitle = '';

        $featuredCars = Car::where('is_featured', 1)->take(6)->get();
        $latestCars = Car::orderBy('created_at', 'desc')->take(6)->get();

        return view('home', compact('pageTitle', 'featuredCars', 'latestCars'));
    }

    public function about(){
        $pageTitle = 'About Us';
        return view('about', compact('pageTitle'));
    }

    public function contact(){
        $pageTitle = 'Contact Us';
        return view('contact', compact('pageTitle'));
    }

    public function storeContact(Request $request)
        {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'message' => 'required|string',
            ]);

            // Create a new contact entry
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
        }
}
