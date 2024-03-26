<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register() {
        $departments = Department::all();
        return view('auth/register', compact('departments'));
    }

    public function registerSave(Request $request)
    {

        $validatedData = $request->validate([
            'fullName' => 'required|max:50',
            'address' => 'required|max:100',
            'phone' => 'required|max:15',
            'position' => 'required|max:50',
            'avatar' => 'nullable|max:100',
            'departmentId' => 'nullable|exists:departments,departmentId'
        ]);
        
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed'
            ])->validate();
            
        $employee = Employee::create($validatedData);
        $employeeId = $employee->employeeId;

        $user = [
            'email' => $request['email'],
            'password' => Hash::make($request->password),
            'role' => 'regular',
            'employeeId' => $employeeId
        ];

        User::create(
            $user
        );



        return redirect()->route('login');
    }

    public function login() {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin/home');
        } else {
            return redirect()->route('home');
        }
        // return redirect()->route('dashboard');
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->forget('role');
        $request->session()->forget('username');

        return redirect('/login');
    }
}
