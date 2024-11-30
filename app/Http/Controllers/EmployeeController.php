<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all(); // Obtén todos los empleados
        $headers = ['N°', 'Name', 'Department', 'Email', 'Phone', 'Mgr'];
        return view("catalogs/employees", compact('employees', 'headers'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $EmployeeUser = User::find($employee->user_id);
        return view("employees/employee_edit", compact('employee', 'EmployeeUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validate([
            'EmpName' => 'required|max:50',
            'Department' => 'required|max:50',
            'Email' => 'required|email|max:50',
            'Phone' => 'required|max:11',
            'MgrNo' => 'nullable|max:8',
            'username' => 'unique:users,username,' . $employee->user_id . ',id|max:50',
            'password' => 'nullable|min:8',
        ]);
        DB::beginTransaction();
        try {
            $employeeUser = User::find($employee->user_id);
            $employeeUser->username = $data['username'];
            if (!empty($data['password'])) {
                $employeeUser->password = Hash::make($data['password']);
            }
            $employeeUser->role = $request->role;
            $employeeUser->save();

            $employee->EmpName = $data['EmpName'];
            $employee->Department = $data['Department'];
            $employee->Email = $data['Email'];
            $employee->Phone = $data['Phone'];
            $employee->MgrNo = $data['MgrNo'];
            $employee->save();

            DB::commit();
            return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return back()->with('error', 'Error updating employee');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->user_id == Auth::user()->id) {
            return redirect()->route('employees.index')->with('error', 'No puedes eliminarte a ti mismo.');
        }
        Db::beginTransaction();
        try {
            $EmployeeUser = User::find($employee->user_id);
            $employee->delete();
            $EmployeeUser->delete();
            DB::commit();
            return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error deleting employee');
        }
    }
}
