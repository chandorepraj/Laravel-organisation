@extends('layouts.app')
@section('title', 'Organisations')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Organisations /</span> Create</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('organisations.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="organisation_name">Organisation Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="organisation_name" name="organisation_name" required/>
                          </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="organisation_type">Organisation Type</label>
                          <div class="col-sm-10">
                            <select class="form-control" id="organisation_type" name="organisation_type" required>
                                <option>Select</option>
                                <option>Practice</option>
                            </select>
                          </div>
                    </div>  
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="npi">NPI</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="npi" name="npi" />
                          </div>
                    </div> 
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="voip_number">VOIP</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="voip_number" name="voip_number" />
                          </div>
                    </div>       
                    <div class="divider text-start-center">
                        <div class="divider-text">Location</div>
                      </div> 
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="address1">Address line 1</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="address1" name="address1" required />
                          </div>
                    </div>    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="address2">Address line 2</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="address2" name="address2" required />
                          </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="city">City</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="city" name="city" required />
                          </div>
                    </div> 
                    <div class="row mb-3">
                        <label for="country" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <select class="form-control" name='country' id="country" required>
                                <option value="">-- Select Country --</option>
                                @foreach($countries as $id => $name)
                                    <option value="{{ $name }}" {{ old('country') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="state" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                            <select class="form-control" name='state' id="state" required>
                                <option value="">-- Select State --</option>
                                @foreach($states as $id => $name)
                                    <option value="{{ $name }}" {{ old('state') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="phone">Phone</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" />
                          </div>
                    </div>    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="fax">Fax</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="fax" name="fax" />
                          </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>          
    </div>
</div>              

@push('scripts')
<script src="{{ asset('assets/js/location.js') }}"></script>
@endpush
@endsection