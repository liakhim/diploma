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
        $sort = $request->get('sort');
        $filter = $request->get('category');
        if (isset($filter)) {
            $places = ($sort === 'desc')
                ? Location::where('group_id', $filter)->orderByDesc('rating')->get()
                : Location::where('group_id', $filter)->orderBy('rating')->get();
        } else {
            $places = ($sort === 'desc')
                ? Location::all()->sortByDesc('rating')
                : Location::all()->sortBy('rating');
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
        if( $request->hasFile('file')){
            // Имя и расширение файла
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Расширение
            $extention = $request->file('file')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "main_image/".$filename."_".time().".".$extention;
            // Сохраняем файл
            $path = $request->file('file')->storeAs('public/locations', $fileNameToStore);
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
                'image_url' => $fileNameToStore
            ]);
            $location->save();
        }
        return redirect('admin/places/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $location = Location::find($request->get('location_id'));
        if( $request->hasFile('file')) {
            // Имя и расширение файла
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Расширение
            $extention = $request->file('file')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "main_image/" . $filename . "_" . time() . "." . $extention;
            // Сохраняем файл
            $path = $request->file('file')->storeAs('public/locations', $fileNameToStore);
            $location->image_url = $fileNameToStore;
        }
        $location->name = $request->get('name');
        $location->group_id = $request->get('group_id');
        $location->address = $request->get('address');
        $location->rating = $request->get('rating');
        $location->description = $request->get('description');
        $location->concept = $request->get('concept');
        $location->tag = $request->get('tag');
        $location->min_guest_quantity = $request->get('min_guest_quantity');
        $location->max_guest_quantity = $request->get('max_guest_quantity');
        $location->budget = $request->get('budget');
        $location->time_open = $request->get('time_open');
        $location->time_close = $request->get('time_close');
        $location->phone = $request->get('phone');
//            $location = new Location([
//                'name' => $request->get('name'),
//                'group_id' => $request->get('group_id'),
//                'address' => $request->get('address'),
//                'rating' => 0,
//                'description' => $request->get('description'),
//                'concept' => $request->get('concept'),
//                'tag' => $request->get('tag'),
//                'min_guest_quantity' => $request->get('min_guest_quantity'),
//                'max_guest_quantity' => $request->get('max_guest_quantity'),
//                'budget' => $request->get('budget'),
//                'time_open' => $request->get('time_open'),
//                'time_close' => $request->get('time_close'),
//                'phone' => $request->get('phone'),
//            ]);
        $location->save();
        return 'success';
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
//    public function edit(Location $location)
//    {
//        //
//    }

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
