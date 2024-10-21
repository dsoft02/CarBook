<?php

namespace App\Http\Controllers;

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
        // Fetch bookings for the authenticated user
        $bookings = Lease::where('user_id', auth()->id())->get();
        $pageTitle = 'My Bookings';
        return view('user.bookings.index', compact('bookings', 'pageTitle'));
    }

    public function upcoming()
    {
        $pageTitle = 'Upcoming Bookings';
        // Fetch upcoming bookings for the authenticated user
        $upcomingBookings = Lease::where('user_id', auth()->id())
            ->where('start_date', '>', now())
            ->get();
        return view('user.bookings.upcoming', compact('upcomingBookings', 'pageTitle'));
    }

    public function completed()
    {
        $pageTitle = 'Completed Bookings';
        // Fetch completed bookings for the authenticated user
        $completedBookings = Lease::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->get();
        return view('user.bookings.completed', compact('completedBookings', 'pageTitle'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Car $car)
    {
        return view('user.bookings.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'pickup_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:pickup_date',
            'car_id' => 'required|exists:cars,id',
            'trx' => 'required|string',
        ]);

        // Verify the payment status with Paystack
        $paymentVerification = $this->verifyPayment($request->trx);

        if (!$paymentVerification['status'] || $paymentVerification['data']['status'] !== 'success') {
            return redirect()->route('user.booking.create', $request->car_id)
                             ->with('error', 'Payment verification failed. Please try again.');
        }

        // Create the lease record
        Lease::create([
            'car_id' => $request->car_id,
            'user_id' => auth()->id(),
            'start_date' => $request->pickup_date,
            'end_date' => $request->return_date,
            'total_price' => $paymentVerification['data']['amount'] / 100,
            'trx' => $request->trx,
            'status' => 'confirmed',
        ]);

        return redirect()->route('user.booking.create', $request->car_id)
                         ->with('success', 'Booking confirmed successfully!');
    }

    // Method to verify payment status with Paystack
    private function verifyPayment($transactionReference)
    {
        $paystackSecretKey = config('services.paystack.secret');
        $url = "https://api.paystack.co/transaction/verify/{$transactionReference}";

        $response = Http::withOptions(['verify' => false])->withToken($paystackSecretKey)->get($url);

        return $response->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Lease::findOrFail($id);

        return view('user.bookings.show', compact('booking'));
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
