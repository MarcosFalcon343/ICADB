<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class AuthController extends Controller
{

    public function registerFormCustomer()
    {
        return view('auth.register_customer');
    }

    public function registerFormEmployee()
    {
        return view('auth.register_employee');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerCustomer(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'CustNo' => 'required|unique:customers|max:8',
            'CustName' => 'required|max:50',
            'Address' => 'required|max:50',
            'Internal' => 'required|size:1',
            'Contact' => 'required|max:50',
            'Phone' => 'required|max:11',
            'City' => 'required|max:30',
            'State' => 'required|size:2',
            'ZipCode' => 'required|max:10',
        ]);

        DB::beginTransaction();

        try {
            $user = new User();
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->role = 'customer';
            $user->save();

            $customer = new Customer([
                'CustNo' => $data['CustNo'],
                'CustName' => $data['CustName'],
                'Address' => $data['Address'],
                'Internal' => $data['Internal'],
                'Contact' => $data['Contact'],
                'Phone' => $data['Phone'],
                'City' => $data['City'],
                'State' => $data['State'],
                'ZipCode' => $data['ZipCode'],
            ]);
            $customer->user_id = $user->id;
            $customer->save();

            DB::commit();

            return redirect()->route(route: 'customers.index')->with('success', 'Customer created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Ha ocurrido un error durante el registro.']); // Retornar con error
        }
    }

    public function registerEmployee(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'EmpNo' => 'required|unique:employees|max:8',
            'EmpName' => 'required|max:50',
            'Department' => 'required|max:25',
            'Email' => 'required|email|unique:employees|max:30',
            'Phone' => 'required|max:11',
            'MgrNo' => 'nullable|max:8',
            'role' => 'required|max:50',
        ]);

        DB::beginTransaction();

        try {
            $user = new User();
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->role = $data['role'];
            $user->save();

            $employee = new Employee([
                'EmpNo' => $data['EmpNo'],
                'EmpName' => $data['EmpName'],
                'Department' => $data['Department'],
                'Email' => $data['Email'],
                'Phone' => $data['Phone'],
                'MgrNo' => $data['MgrNo'],
            ]);
            $employee->user_id = $user->id;
            $employee->save();

            DB::commit();

            return redirect()->route(route: 'employees.index')->with('success', 'Employee created successfully');
            ;
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Ha ocurrido un error durante el registro.' + $e]); // Retornar con error
        }
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $data['username'],
            'password' => $data['password'],
        ];

        $remebmer = ($request->has('remember')) ? true : false;

        if (Auth::attempt($credentials, $remebmer)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        } else {
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
                'password' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }



}
