<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Facility;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headers = ['N°', 'Facility N°', 'Name'];
        $locations = Location::all();
        $locationGlobal = new Location();
        $facilities = Facility::all();

        return view('catalogs.locations', compact('locations', 'headers', 'locationGlobal', 'facilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $data = $request->validate([
            'LocNo' => 'required|max:8|unique:locations',
            'FacNo' => 'required|max:8',
            'LocName' => 'required|max:50',
        ]);

        DB::beginTransaction();
        try {
            $location = new Location();
            $location->LocNo = $data['LocNo'];
            $location->FacNo = $data['FacNo'];
            $location->LocName = $data['LocName'];
            $location->save();
            DB::commit();
            return redirect()->route('locations.index')->with('success', 'Location created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('locations.index')->with('error', 'Location creation failed');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request)
    {
        $data = $request->validate([
            'LocNo' => 'nullable|max:8',
            'FacNo' => 'nullable|max:8',
            'LocName' => 'required|max:50',
        ]);

        DB::beginTransaction();
        try {
            $location = Location::find($data['LocNo']);
            $location->FacNo = $data['FacNo'];
            $location->LocName = $data['LocName'];
            $location->save();
            DB::commit();
            return redirect()->route('locations.index')->with('success', 'Location updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->route('locations.index')->with('error', 'Location update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        DB::beginTransaction();
        try {
            $location->delete();
            DB::commit();
            return redirect()->route('locations.index')->with('success', 'Location deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('locations.index')->with('error', 'Location deletion failed');
        }
    }
}
