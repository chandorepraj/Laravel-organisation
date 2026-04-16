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
                    <form action="{{ route('organisations.update',$organisation->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="organisation_name">Organisation Name</label>
                          <div class="col-sm-10">
                            <input type="text" value="{{ $organisation->organisation_name}}" class="form-control" id="organisation_name" name="organisation_name" required/>
                          </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="organisation_type">Organisation Type</label>
                          <div class="col-sm-10">
                            <select class="form-control" id="organisation_type" name="organisation_type" required>
                                <option>Select</option>
                                <option value="Practice" {{$organisation->organisation_type == 'Practice' ? 'selected' : ''}}>Practice</option>
                            </select>
                          </div>
                    </div>  
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="npi">NPI</label>
                          <div class="col-sm-10">
                            <input type="text" value="{{ $organisation->npi}}" class="form-control" id="npi" name="npi" />
                          </div>
                    </div> 
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="voip_number">VOIP</label>
                          <div class="col-sm-10">
                            <input type="text" value="{{ $organisation->voip_number}}" class="form-control" id="voip_number" name="voip_number" />
                          </div>
                    </div>                          
                    <div class="row ">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    </form>
                    <div class="divider text-start-center">
                        <div class="divider-text">Location</div>
                    </div>
                    <div class="row">
                        <div class="col-span-full mb-1">
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
        data-bs-target="#locationModal">Add Location</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="olocationsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Address1</th>
                            <th>Address2</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Phone</th>
                            <th>Fax</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                </div>
                </div>
            </div>
        </div>          
    </div>
</div>
<div id="editLocationModal">
</div>
@include('organisation.organisation-location-modal')   
@push('scripts')
<script>
var oLocationDatatableUrl = "{{ route('organisation_locations.datatable',$organisation->id) }}";
</script>
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<!-- jQuery (already in Sneat) -->

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/js/organisation_location.js') }}"></script>
<script src="{{ asset('assets/js/location.js') }}"></script>

@endpush 
@endsection
