<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisation_location;
use App\Models\Country;
use App\Models\State;
use  App\Http\Requests\OrganisationLocationStoreRequest;
use App\Http\Requests\OrganisationLocationUpdateRequest;
use App\Http\Resources\OrganisationLocationResource;
use App\Models\User;

class OrganisationLocationController extends Controller
{
    //
    public function store(OrganisationLocationStoreRequest $request)
    {
        $validatedData = $request->validated();
        $organisation_location = Organisation_location::create($validatedData);

        return new OrganisationLocationResource($organisation_location);
    }
    public function update(OrganisationLocationUpdateRequest $request, Organisation_location $organisation_location)
    {
        $organisation_location->update($request->validated());

        return new OrganisationLocationResource($organisation_location);
    }
    public function destroy(Organisation_location $organisation_location)
    {
            $organisation_location->delete();

            return response()->json([
                'message' => 'Location deleted successfully'
            ]);
    }
}
