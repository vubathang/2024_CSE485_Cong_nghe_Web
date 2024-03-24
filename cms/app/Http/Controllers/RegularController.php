<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegularController extends Controller
{
    public function home() {
        return view('home');
    }
     
    public function profile()
    {        
        $user = User::where('id', @auth()->user()->id)->first();
        $departments = Department::all();
        return view('profile', compact('user', 'departments'));
    }

    public function updateProfile(Request $request) {
        if($request->password && $request->newPassword) {
            $validatedUser = $request->validate([
                'password' => 'required',
                'newPassword' => 'required'
            ]);
            $user = User::find(auth()->user()->id);
            
            if (Hash::check($validatedUser['password'], $user->password)) {
                $user->password = Hash::make($validatedUser['newPassword']);
                $user->save();
            } else {
                return redirect()->route('users.index')->with('error', 'Mật khẩu không đúng');
            }
        }

        $validatedEmployee = $request->validate([
            'fullName' => 'required|max:50',
            'address' => 'required|max:100',
            'phone' => 'required|max:15',
            'position' => 'required|max:50',
            'departmentId' => 'required'
        ]);

        $avatar = $request->file('avatar');
        if ($avatar) {
            $employeeId = auth()->user()->employeeId;
            $avatarName = 'avatar' . $employeeId . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatars'), $avatarName);
            Employee::where('employeeId', @auth()->user()->employeeId)
            ->update(['avatar' => $avatarName]);
        }

        Employee::where('employeeId', @auth()->user()->employeeId)
        ->update($validatedEmployee);
        return redirect()->route('profile')->with('success', 'Cập nhật thành công');
    }
}
