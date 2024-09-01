<?php

namespace App\Http\Controllers;

use App\Models\trip;
use App\Models\category;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alltrips =trip::all();
        return view("dashboard/trips/index", ['trips'=>$alltrips]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcat= category::all();
        return view('dashboard/trips/create',['categories'=>$allcat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        trip::create([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'capacity'=>$request->input('capacity'),
            'price'=>$request->input('price'),
            'start_at'=>$request->input('start_at'),
            'end_at'=>$request->input('end_at'),
            'cat_id'=>$request->input('cat_id'),
        ]);
        return to_route('trips.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(trip $trip)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trip $trip)
    {

        $allcat= category::all();
        return view('dashboard/trips/edit',['categories'=>$allcat , 'trip'=>$trip]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trip $trip)
    {
        $trip->update([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'capacity'=>$request->input('capacity'),
            'price'=>$request->input('price'),
            'start_at'=>$request->input('start_at'),
            'end_at'=>$request->input('end_at'),
            'cat_id'=>$request->input('cat_id'),

        ]);
        return to_route('trips.index',['trips'=>$trip]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trip $trip)
    {
        $trip->delete();
        return to_route('trips.index');
    }
}
