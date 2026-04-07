<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Organisation_location;
use App\Models\Country;
use App\Models\State;
use  App\Http\Requests\OrganisationLocationStoreRequest;
use App\Http\Requests\OrganisationLocationUpdateRequest;
use App\Models\User;


class OrganisationLocationController extends Controller
{
    //
    public function datatable()
    {
        $olocations = Organisation_location::query(['country','state','user']);
        return DataTables::of($olocations)
            ->addIndexColumn()
            ->addColumn('created_by', function ($row) {
                return $row->user->name ;
            })
            ->addColumn('action', function ($row) {
                $deleteBtn = '<button class="btn btn-sm btn-danger deleteOLocation" data-id="'.$row->id.'">Delete</button>';

                $editBtn = '<a href="#" data-id="'.$row->id.'" class=" editOrganisation btn btn-sm btn-primary me-1">Edit</a>';

                

                return $editBtn." ".$deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function destroy($id)
    {
        $location = Organisation_location::findOrFail($id);
        $count = Organisation_location::where('organisation_id', $location->organisation_id)->count();

        if ($count <= 1) {
            return response()->json([
                'error' => 'At least one location is required for organisation.'
            ], 422);
        }
        $location->delete();
        return response()->json(['success' => true]);

    }
    public function store(OrganisationLocationStoreRequest $request)
    {
        $validatedData = $request->validated();
         $postData = array_merge($validatedData, [
            'created_by' => Auth::user()->id,
            'is_deleted' => '0',
        ]);

        Organisation_location::create($postData);       
        return response()->json([
            'message' => 'Location added successfully.'
        ]);
    }
    public function edit(Organisation_location $OrganisationLocation)
    {
        //
        $countries = Country::pluck('name', 'id');
        $states = State::where('country_id', $OrganisationLocation->country)
                    ->pluck('name','id');
        return view('organisation.organisation-location-edit-modal',compact('OrganisationLocation','countries','states'));
    }
    public function update(OrganisationLocationUpdateRequest $request, Organisation_location $OrganisationLocation)
    {
        $request->validated();
        $OrganisationLocation->update($request->all());
        return response()->json([
            'message' => 'Location updated successfully.'
        ]);
    }
}
