<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\Organisation;
use App\Models\Organisation_location;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\OrganisationStoreRequest;
use App\Http\Requests\OrganisationUpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\OrganisationLocationStoreRequest;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $organisations = Organisation::with('user')->paginate(2);
        return view('organisation.index',compact('organisations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries = Country::pluck('name', 'id');
        $states = [];

        if(old('country')) {
            $states = State::where('country_id', old('country_id'))
                            ->pluck('name','id');
        }
        return view('organisation.create',compact('countries','states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganisationStoreRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
         $postData = array_merge($validatedData, [
            'created_by' => Auth::user()->id,
            'is_deleted' => '0',
        ]);

        $organisation = Organisation::create($postData);
        $this->savePrimaryLocation($organisation->id,$request);

        
        
        return redirect()->route('organisations.index')->with('success', 'Organisation created successfully.');
    }
    protected function savePrimaryLocation($organisation_id, $request)
    {
        // 2. Save locations
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
                'created_by' => Auth::user()->id,
                'is_deleted' => '0',
            ]);
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
    public function edit(Organisation $organisation)
    {
        //
        $countries = Country::pluck('name', 'id');
        $states = [];
        $organisation->load('organisation_location');
        return view('organisation.edit', compact('organisation','countries','states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganisationUpdateRequest $request, Organisation $organisation)
    {
        $request->validated();
        $organisation->update($request->all());
        return redirect()->route('organisations.index')->with('success', 'Organisation updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
