<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeatType;
use Illuminate\Support\Facades\Validator;

class SeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seattypes = SeatType::all();

        $title = 'Delete Seat Type!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.seat-types.index', compact('seattypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:seat_types',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Get the first error message
            $errorMessage = $validator->errors()->first();

            // Redirect back to the index with the error message
            return redirect()->route('admin.seat-types.index')
                ->with('error', $errorMessage)
                ->withInput();
        }

        SeatType::create($request->all());

        return redirect()->route('admin.seat-types.index')->with('success', 'Seat Type created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seattype = SeatType::findOrFail($id);

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:seat_types,name,' . $seattype->id,
            'status' => 'required|integer|in:0,1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Get the first error message
            $errorMessage = $validator->errors()->first();

            // Redirect back to the index with the error message
            return redirect()->route('admin.seat-types.index')
                ->with('error', $errorMessage)
                ->withInput();
        }

        // Update the brand with the new data
        $seattype->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        // Redirect back to the list with a success message
        return redirect()->route('admin.seat-types.index')->with('success', 'Seat type updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seattype = SeatType::findOrFail($id);
        $seattype->delete();

        return redirect()->route('admin.seat-types.index')->with('success', 'Seat type deleted successfully.');
    }
}
