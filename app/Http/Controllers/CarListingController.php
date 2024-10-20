<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\SeatType;
use App\Models\CarFeature;
use App\Models\Lease;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class CarListingController extends Controller
{
    public function index(Request $request)
    {
        $pageTitle = "All Cars";
        // Initialize query
        $query = Car::query();

        // Filter by car name
        if ($request->filled('car_name')) {
            $query->where('name', 'like', '%' . $request->input('car_name') . '%');
        }

        // Filter by price
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        // Filter by brand
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->input('brands'));
        }

        //Filter by featured cars
        if ($request->get('featured')) {
            $query->where('is_featured', 1);
        }


        // Get filtered cars
        $cars = $query->paginate(12)->appends($request->query()); // Adjust the pagination as needed

        // Get all brands for the filter options
        $brands = Brand::all();

        return view('car.index', compact('cars', 'brands'));
    }

    public function show($id)
    {
        // Retrieve the car by its ID
        $car = Car::with('ratings.user')->findOrFail($id);
        $carFeatures = CarFeature::active()->get();

        return view('car.show', compact('car', 'carFeatures'));
    }

    public function checkAvailability(Request $request)
    {
        $carId = $request->car_id;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $isAvailable = !Lease::where('car_id', $carId)
            ->whereIn('status', ['confirmed', 'pending'])
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhereRaw('? BETWEEN start_date AND end_date', [$startDate])
                      ->orWhereRaw('? BETWEEN start_date AND end_date', [$endDate]);
            })
            ->exists();

        return response()->json(['available' => $isAvailable]);
    }


}
