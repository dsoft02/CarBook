<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarFeature;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = CarFeature::all();

        $title = 'Delete Feature!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.features.index', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:car_features',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Get the first error message
            $errorMessage = $validator->errors()->first();

            // Redirect back to the index with the error message
            return redirect()->route('admin.features.index')
                ->with('error', $errorMessage)
                ->withInput();
        }

        CarFeature::create($request->all());

        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $feature = CarFeature::findOrFail($id);

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:car_features,name,' . $feature->id,
            'status' => 'required|integer|in:0,1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Get the first error message
            $errorMessage = $validator->errors()->first();

            // Redirect back to the index with the error message
            return redirect()->route('admin.features.index')
                ->with('error', $errorMessage)
                ->withInput();
        }

        // Update the brand with the new data
        $feature->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        // Redirect back to the brand list with a success message
        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feature = CarFeature::findOrFail($id);
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Feature deleted successfully.');
    }
}
