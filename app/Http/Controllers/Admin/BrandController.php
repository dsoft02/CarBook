<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();

        $title = 'Delete Brand!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:brands',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Get the first error message
            $errorMessage = $validator->errors()->first();

            // Redirect back to the index with the error message
            return redirect()->route('admin.brands.index')
                ->with('error', $errorMessage)
                ->withInput();
        }

        Brand::create($request->all());

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'status' => 'required|integer|in:0,1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Get the first error message
            $errorMessage = $validator->errors()->first();

            // Redirect back to the index with the error message
            return redirect()->route('admin.brands.index')
                ->with('error', $errorMessage)
                ->withInput();
        }

        // Update the brand with the new data
        $brand->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        // Redirect back to the brand list with a success message
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}
