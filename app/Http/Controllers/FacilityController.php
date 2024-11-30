<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use Illuminate\Support\Facades\DB;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headers = ['N°', 'Name'];
        $facilities = Facility::all();
        $facilityGlobal = new Facility();
        return view('catalogs.facilities', compact('facilities', 'headers', 'facilityGlobal'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilityRequest $request)
    {
        $data = $request->validate([
            'FacNo' => 'required|max:50|unique:facilities',
            'FacName' => 'required|max:50',
        ]);

        DB::beginTransaction();
        try {
            $facility = new Facility();
            $facility->FacNo = $data['FacNo'];
            $facility->FacName = $data['FacName'];
            $facility->save();
            DB::commit();
            return redirect()->route('facilities.index')->with('success', 'Facility created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('facilities.index')->with('error', 'Facility creation failed');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilityRequest $request)
    {
        // Valida los datos
        $data = $request->validate([
            'FacNo' => 'nullable|max:50',
            'FacName' => 'required|max:50',
        ]);

        DB::beginTransaction();
        try {
            // Busca la instalación y actualiza sus datos
            $facility = Facility::findOrFail($data['FacNo']);
            $facility->FacName = $data['FacName'];
            $facility->save();

            DB::commit(); // Asegúrate de confirmar la transacción
            return redirect()->route('facilities.index')->with('success', 'Facility updated successfully!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->route('facilities.index')->with('error', 'Facility not found.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Captura cualquier otra excepción
            return redirect()->route('facilities.index')->with('error', 'Facility update failed: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        DB::beginTransaction();
        try {
            $facility->delete();
            DB::commit();
            return redirect()->route('facilities.index')->with('success', 'Facility deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('facilities.index')->with('error', 'Facility deletion failed');
        }
    }
}
