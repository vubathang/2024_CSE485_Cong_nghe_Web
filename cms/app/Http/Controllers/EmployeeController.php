<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Employee::query();

        if ($search) {
            $query->where('fullName', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhere('position', 'like', "%$search%")
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('email', 'like', "%$search%");
                })
                ->orWhereHas('department', function ($query) use ($search) {
                    $query->where('departmentName', 'like', "%$search%");
                });
        } else {
            $query->orderBy('employeeId', 'desc');
        }

        $employees = $query->paginate(5);
        
        //regular
        if(auth()->user()->role == 'admin') {
            return view('admin.employees.index', compact('employees'));
        } else {
            return view('employees.index', compact('employees'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullName' => 'required|max:50',
            'address' => 'required|max:100',
            'email' => 'required|email|max:50',
            'phone' => 'required|max:15',
            'position' => 'required|max:50',
            'avatar' => 'nullable|max:100',
            'departmentId' => 'nullable|exists:departments,departmentId'
        ]);
        Employee::create($validatedData);
        return redirect()->route('employees.index')->with('success', 'Nhân viên đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        if(auth()->user()->role == 'admin') {
            return view('admin.employees.show', compact('employee'));
        } else {
            return view('employees.show', compact('employee'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = Department::all();
        $employee = Employee::find($id);
        return view('admin.employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'fullName' => 'required|max:50',
            'address' => 'required|max:100',
            'email' => 'required|email|max:50',
            'phone' => 'required|max:15',
            'position' => 'required|max:50',
            'avatar' => 'nullable|max:100',
            'departmentId' => 'nullable|exists:departments,departmentId'
        ]);
        Employee::where('employeeId', $id)->update($validatedData);
        return redirect()->route('employees.index')->with('success', 'Nhân viên đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::destroy($id);
        return redirect()->route('employees.index')->with('success', 'Nhân viên đã được xóa thành công.');
    }
}
