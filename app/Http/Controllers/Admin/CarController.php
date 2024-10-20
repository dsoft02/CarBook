<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\SeatType;
use App\Models\CarFeature;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        $title = 'Delete Car!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::active()->get();
        $carModels = CarModel::active()->get();
        $seatTypes = SeatType::active()->get();
        $carFeatures = CarFeature::active()->get();
        return view('admin.cars.create', compact('brands', 'carModels', 'seatTypes','carFeatures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'car_model_id' => 'required|exists:car_models,id',
            'seat_type_id' => 'required|exists:seat_types,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'car_features' => 'array',
            'car_features.*' => 'exists:car_features,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $images = $this->handleImageUpload($request);

        $car = Car::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'car_model_id' => $request->car_model_id,
            'seat_type_id' => $request->seat_type_id,
            'year' => $request->year,
            'doors' => $request->doors,
            'color' => $request->color,
            'fuel_type' => $request->fuel_type,
            'mileage' => $request->mileage,
            'transmission' => $request->transmission,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
            'images' => json_encode($images),
        ]);

        // Attach the selected features to the car
        if ($request->has('car_features')) {
            $car->features()->attach($request->car_features);
        }

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::active()->get();
        $carModels = CarModel::active()->get();
        $seatTypes = SeatType::active()->get();
        $carFeatures = CarFeature::active()->get();
        $selectedFeatures = $car->features->pluck('id')->toArray();

        return view('admin.cars.edit', compact('car', 'brands', 'carModels', 'seatTypes', 'carFeatures', 'selectedFeatures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'car_model_id' => 'required|exists:car_models,id',
            'seat_type_id' => 'required|exists:seat_types,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'car_features' => 'array',
            'car_features.*' => 'exists:car_features,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $images = $this->handleImageUpload($request, json_decode($car->images, true));

        $car->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'car_model_id' => $request->car_model_id,
            'seat_type_id' => $request->seat_type_id,
            'year' => $request->year,
            'doors' => $request->doors,
            'color' => $request->color,
            'fuel_type' => $request->fuel_type,
            'mileage' => $request->mileage,
            'transmission' => $request->transmission,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
            'images' => json_encode($images),
        ]);

        // Sync the selected features with the car
        if ($request->has('car_features')) {
            $car->features()->sync($request->car_features);
        } else {
            $car->features()->detach();
        }

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);

        // Delete associated images
        if ($car->images) {
            $images = json_decode($car->images, true);
            if (is_array($images)) {
                foreach ($images as $imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }
            }
        }


        // Detach associated features from the pivot table
        $car->features()->detach();

        // Now delete the car itself
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }


    private function handleImageUpload($request, $existingImages = [])
    {
        $images = $existingImages;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('cars', 'public');
                $images[] = $path;
            }
        }

        return $images;
    }

    public function getModels($brandId)
    {
        $models = CarModel::where('brand_id', $brandId)->pluck('name', 'id');
        return response()->json($models);
    }

}
