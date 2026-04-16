<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;


class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
    }
    public function show(Role $role)
    {
        return new RoleResource($role);
    }
    public function store(RoleStoreRequest $request)
    {
        $validatedData = $request->validated();
        $role = Role::create($validatedData);

        return new RoleResource($role);
    }
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->update($request->validated());

        return new RoleResource($role);
    }
    public function destroy(Role $role)
    {
            $role->delete();

            return response()->json([
                'message' => 'Role deleted successfully'
            ]);
    }
}
