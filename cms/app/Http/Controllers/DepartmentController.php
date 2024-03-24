<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Department::query();

        if ($search) {
            $query->where('departmentName', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhereHas('parent', function ($query) use ($search) {
                    $query->where('departmentName', 'like', "%$search%");
                });
        } else {
            $query->orderBy('departmentId', 'desc');
        }

        $departments = $query->paginate(10);
//        admin
        if(auth()->user()->role == 'admin') {
            return view('admin.departments.index', compact('departments'));
        } else {
            return view('departments.index', compact('departments'));
        }

//        regular
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.departments.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'departmentName' => 'required|max:50',
            'address' => 'required|max:100',
            'email' => 'required|max:50',
//            'phone' => 'required|regex:/^\+[0-9]{10,15}$/',
            'phone' => 'required|max:15',
            'parentDepartmentId' => 'nullable|exists:departments,departmentId'
        ]);

        Department::create($validatedData);
        return redirect()->route('departments.index')->with('success', 'Đơn vị đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::find($id);
//        admin
        if(auth()->user()->role == 'admin') {    
            return view('admin.departments.show', compact('department'));
        } else {
            return view('departments.show', compact('department'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = Department::all();
        $department = Department::find($id);
        return view('admin.departments.edit', compact('department', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'departmentName' => 'required|max:50',
            'address' => 'required|max:100',
            'email' => 'required|max:50',
//            'phone' => 'required|regex:/^\+[0-9]{10,15}$/',
            'phone' => 'required|max:15',
            'parentDepartmentId' => 'nullable|exists:departments,departmentId'
        ]);

        $department = Department::find($id);
        $department->update($validatedData);
        return redirect()->route('departments.index')->with('success', 'Đơn vị đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::find($id);

        if ($department->employees->count() > 0) {
            return redirect()->back()->with('error', 'Đơn vị có nhân viên. Không thể xóa.');
        }

        if ($department->children->count() > 0) {
            return redirect()->back()->with('error', 'Đơn vị là đơn vị cấp trên. Không thể xóa.');
        }

        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Đơn vị đã được xóa thành công.');
    }
}
