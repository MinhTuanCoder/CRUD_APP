<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::latest()->paginate(7);

        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'location' => 'required|max:255',
        ]);
        if($validatedData ->fails()){
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
        

        $department = new department;
        $department->name = $request->name;
        $department->location = $request->location;

        $department->save();
        return redirect()->route('departments.index')->with('success', 'department Data has been updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {

        return view('edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'location' => 'required|max:255',
        ]);
        if($validatedData ->fails()){
            return redirect()->back()->withInput()->withErrors($validatedData);
        }
         $department = Department::find($request->hidden_id);
        $department->name  = $request->name;
        $department->location = $request->location;
         $department->save();
        return redirect()->route('departments.index')->with('success', 'department data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
         $department->delete();
        return redirect()->route('departments.index')->with('success','department data deleted successfully');
    }
    public function confirmDelete($id)
    {
        $department  = Department::find($id);
        return view('delete', ['department' => $department]);
    }
    
}
