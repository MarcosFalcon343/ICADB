<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all(); // Obtén todos los clientes
        $headers = ['N°', 'Name', 'Address', 'Internal', 'Contact', 'Phone', 'City', 'State', 'Zip'];

        return view("catalogs/customers", compact('customers', 'headers'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $CustomerUser = User::find($customer->user_id);
        return view("customers/customer_edit", compact('customer', 'CustomerUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $data = $request->validate([
            'CustName' => 'required|max:50',
            'Address' => 'required|max:50',
            'Internal' => 'required|size:1',
            'Contact' => 'required|max:50',
            'Phone' => 'required|max:11',
            'City' => 'required|max:30',
            'State' => 'required|size:2',
            'ZipCode' => 'required|max:10',
            'username' => 'unique:users,username,' . $customer->user_id . ',id|max:50',
            'password' => 'nullable|min:8',
        ]);

        DB::beginTransaction();
        try {

            $CustomerUser = User::find($customer->user_id);
            $CustomerUser->username = $data['username'];
            if (!empty($data['password'])) {
                $CustomerUser->password = Hash::make($data['password']);
            }

            $CustomerUser->save();

            $customer->CustName = $data['CustName'];
            $customer->Address = $data['Address'];
            $customer->Internal = $data['Internal'];
            $customer->Contact = $data['Contact'];
            $customer->Phone = $data['Phone'];
            $customer->City = $data['City'];
            $customer->State = $data['State'];
            $customer->ZipCode = $data['ZipCode'];
            $customer->save();

            DB::commit();

            return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Error al actualizar el cliente: ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        DB::beginTransaction();
        try {
            $CustomerUser = User::find($customer->user_id);
            $customer->delete();
            $CustomerUser->delete();
            DB::commit();
            return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al eliminar el cliente: ' . $e->getMessage());
        }
    }
}
