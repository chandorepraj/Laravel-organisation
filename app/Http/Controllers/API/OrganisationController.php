<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrganisationStoreRequest;
use App\Http\Requests\OrganisationUpdateRequest;
use App\Http\Requests\OrganisationLocationStoreRequest;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\Organisation;
use App\Models\Organisation_location;
use App\Http\Resources\OrganisationResource;
use App\Http\Resources\OrganisationLocationResource;



class OrganisationController extends Controller
{
    //
     public function index()
    {
        $organisations = Organisation::with('user')->get();
        return OrganisationResource::collection($organisations);
    }
    public function show($id)
    {
        $organisation = Organisation::with([
            'user',
            'organisation_location'
        ])->findOrFail($id);

        return new OrganisationResource($organisation);
    }
    public function store(OrganisationStoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['created_by'] = $request['created_by'];
        $validatedData['is_deleted'] = 0;
        $organisation = Organisation::create($validatedData);
        $this->savePrimaryLocation($organisation->id,$request);
        return new OrganisationResource($organisation);
    }
    protected function savePrimaryLocation($organisation_id, $request1)
    {
        // 2. Save locations
        $request = $request1['organisation_location'];
        Organisation_location::create([
                'organisation_id' => $organisation_id,
                'address1' => $request['address1'],
                'address2' => $request['address2'],
                'city' => $request['city'],
                'state' => $request['state'],
                'country' => $request['country'],
                'phone' => $request['phone'],
                'fax' => $request['fax'],
                'is_primary' => 1,
                'created_by' => $request['created_by'],
                'is_deleted' => '0',
            ]);
    }
    public function update(OrganisationUpdateRequest $request, Organisation $organisation)
    {
        $organisation->update($request->validated());

        return new OrganisationResource($organisation);
    }
    public function destroy(Organisation $organisation)
    {
            $organisation->delete();

            return response()->json([
                'message' => 'Organisation deleted successfully'
            ]);
    }
}
