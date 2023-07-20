<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Product;
use App\Rules\Uppercase;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Select * from cars
        // $cars = Car::all()->toArray();

        $cars = Car::all();
        // $cars = json_decode($cars);

        // $cars = Car::where('name', '=', "MG")
        //     ->get();


        // $cars = Car::chunk(2, function ($cars) {
        //     foreach ($cars as $car) {
        //         print_r($car);
        //     }
        // });

        // var_dump($cars);

        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Methods wee can use on $request

        //guessExtension()
        //getMimeType()
        //store()
        //asStore()
        //storePublicly()
        //move()
        //getClientOriginalName()
        //getClientMMimeType()
        //guessClientEExtension()
        //getSize()
        //getError()
        //isValid()

        // $request->file('image')->store();

        $request->validate([
            'name' => 'required',
            'founded' => 'required|integer|min:0|max:2021',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        $originalImageName = $request->image->getClientOriginalName();
        $newImageName = time() . '-' . $request->name . '.' . 'jpg';
        $destinationPath = public_path('/images');
        $request->image->move($destinationPath, $newImageName);

        // dd($newImageName);
        //If it's valid, it will process
        //If it's not valid, throw a validationException

        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        // var_dump($car->productionDate);
        // var_dump($car->production);

        $products = Product::find($id);
        // print_r($products);

        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);

        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateValidationRequest $request, $id)
    {
        $request->validated();
        $car = Car::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'founded' => $request->input('founded'),
                'description' => $request->input('description')
            ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect('/cars');
    }
}
