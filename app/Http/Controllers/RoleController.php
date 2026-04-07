<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::with('user')->paginate(2);
        return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
         $postData = array_merge($validatedData, [
            'created_by' => Auth::user()->id,
            'is_deleted' => '0',
        ]);

        Role::create($postData);
    
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
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
    public function edit(Role $role)
    {
        //
        return view('role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $request->validated();
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Role::findOrFail($id)->delete();
        return response()->json([
            'canDelete' => true,
            'message' => 'Role deleted successfully.'
        ]);
    }
    public function checkDelete(Request $request)
    {
        Role::findOrFail($request->id)->delete();
        return response()->json([
            'canDelete' => true,
            'message' => 'Role deleted successfully.'
        ]);
    }
    public function datatable()
    {
        $roles = Role::query();

        return DataTables::of($roles)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editUrl = route('roles.edit', $row->id);
                $deleteBtn = '<button class="btn btn-sm btn-danger deleteRole" data-id="'.$row->id.'">Delete</button>';

                $editBtn = '<a href="'.$editUrl.'" class="btn btn-sm btn-primary me-1">Edit</a>';

                

                return $editBtn.$deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
