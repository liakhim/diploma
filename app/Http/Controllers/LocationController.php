<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('category');
        if (isset($filter)) {
            $places = Location::where('group_id', $filter)->get();
        } else {
            $places = Location::all();
        }
        return view('places', ['places' => $places, 'filter' => $filter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $location = new Location([
            'name' => $request->get('name'),
            'group_id' => $request->get('group_id'),
            'address' => $request->get('address'),
            'rating' => 0,
            'description' => $request->get('description'),
            'concept' => $request->get('concept'),
            'tag' => $request->get('tag'),
            'min_guest_quantity' => $request->get('min_guest_quantity'),
            'max_guest_quantity' => $request->get('max_guest_quantity'),
            'budget' => $request->get('budget'),
            'time_open' => $request->get('time_open'),
            'time_close' => $request->get('time_close'),
            'phone' => $request->get('phone'),
        ]);
        $location->save();
        return success;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
