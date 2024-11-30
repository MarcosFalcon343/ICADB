<?php

namespace App\Http\Controllers;

use App\Models\ResourceTbl;
use App\Http\Requests\StoreResourceTblRequest;
use App\Http\Requests\UpdateResourceTblRequest;
use Illuminate\Support\Facades\DB;

class ResourceTblController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headers = ['N°', 'Name', 'Rate'];
        $resources = ResourceTbl::all();
        $resourceGlobal = new ResourceTbl();
        return view('catalogs.resources', compact('resources', 'headers', 'resourceGlobal'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceTblRequest $request)
    {
        $data = $request->validate([
            'ResNo' => 'required|max:8|unique:resource_tbls',
            'ResName' => 'required|max:50',
            'Rate' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $resource = new ResourceTbl();
            $resource->ResNo = $data['ResNo'];
            $resource->ResName = $data['ResName'];
            $resource->Rate = $data['Rate'];
            $resource->save();
            DB::commit();
            return redirect()->route('resources.index')->with('success', 'Resource created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('resources.index')->with('error', 'Resource creation failed');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourceTblRequest $request, ResourceTbl $resourceTbl)
    {
        $data = $request->validate([
            'ResNo' => 'nullable|max:8',
            'ResName' => 'required|max:50',
            'Rate' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $resourceTbl = ResourceTbl::find($data['ResNo']);
            $resourceTbl->ResName = $data['ResName'];
            $resourceTbl->Rate = $data['Rate'];
            $resourceTbl->save();
            DB::commit();
            return redirect()->route('resources.index')->with('success', 'Resource updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('resources.index')->with('error', 'Resource update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResourceTbl $resourceTbl)
    {
        DB::beginTransaction();
        try {
            $resourceTbl->delete();
            DB::commit();
            return redirect()->route('resources.index')->with('success', 'Resource deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('resources.index')->with('error', 'Resource deletion failed');
        }
    }
}
