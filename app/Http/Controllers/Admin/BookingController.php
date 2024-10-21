<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Lease;
use Illuminate\Support\Facades\Http;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Lease::all();
        $pageTitle = 'All Bookings';
        return view('admin.bookings.index', compact('bookings', 'pageTitle'));
    }

    public function upcoming()
    {
        $pageTitle = 'Upcoming Bookings';
        $upcomingBookings = Lease::where('start_date', '>', now())->get();
        return view('admin.bookings.upcoming', compact('upcomingBookings', 'pageTitle'));
    }

    public function completed()
    {
        $pageTitle = 'Completed Bookings';
        $completedBookings = Lease::where('status', 'completed')->get();
        return view('admin.bookings.completed', compact('completedBookings', 'pageTitle'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Lease::findOrFail($id);

        return view('admin.bookings.show', compact('booking'));
    }

    public function cancel($id)
    {
        $booking = Lease::findOrFail($id);

        // Update the status to 'canceled'
        $booking->status = 'canceled';
        $booking->save();

        // Optionally, add a flash message to notify admin
        return back()->with('success', 'Booking has been canceled successfully.');
    }

    public function complete($id)
    {
        $booking = Lease::findOrFail($id);

        if ($booking->status !== 'completed' && $booking->status !== 'canceled') {
            $booking->status = 'completed';
            $booking->save();

            return back()->with('success', 'Booking marked as complete successfully.');
        }

        return back()->with('error', 'Unable to mark the booking as complete.');
    }

}
