<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carmodels = CarModel::all();
        //$brands = Brand::all();
        $brands = Brand::active()->get();
        $title = 'Delete Car Model!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.carmodels.index', compact('carmodels','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'brand_id' => 'required|exists:brands,id',
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('car_models')->where(function ($query) use ($request) {
                    return $query->where('brand_id', $request->brand_id);
                }),
            ],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Get the first error message
            $errorMessage = $validator->errors()->first();

            // Redirect back to the index with the error message
            return redirect()->route('admin.models.index')
                ->with('error', $errorMessage)
                ->withInput();
        }

        CarModel::create($request->all());

        return redirect()->route('admin.models.index')->with('success', 'Car model created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carmodel = CarModel::findOrFail($id);

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'brand_id' => 'required|exists:brands,id',
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('car_models')->where(function ($query) use ($request) {
                    return $query->where('brand_id', $request->brand_id);
                })->ignore($carmodel->id),
            ],
            'status' => 'required|integer|in:0,1',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Get the first error message
            $errorMessage = $validator->errors()->first();

            // Redirect back to the index with the error message
            return redirect()->route('admin.models.index')
                ->with('error', $errorMessage)
                ->withInput();
        }

        // Update the brand with the new data
        $carmodel->update([
            'brand_id' => $request->input('brand_id'),
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        // Redirect back to the brand list with a success message
        return redirect()->route('admin.models.index')->with('success', 'Car model updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carmodel = CarModel::findOrFail($id);
        $carmodel->delete();

        return redirect()->route('admin.models.index')->with('success', 'Car model deleted successfully.');
    }
}
