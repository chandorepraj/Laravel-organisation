
@csrf
<!-- The Modal -->
<div class="modal" id="locationEditModal">
  <div class="modal-dialog">
    <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">Organisation Location Edit</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
    </div>
    <form action="{{ route('organisation_locations.update',$OrganisationLocation->id) }}" method="POST" id="locationEditForm">
    <!-- Modal body -->
    <div class="modal-body">    
        @csrf
        @method('put')
        <input type="hidden" value="{{ $OrganisationLocation->organisation_id}}" name="organisation_id" id="organisation_id">

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="address1">Address line 1</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $OrganisationLocation->address1}}" id="address1" name="address1" required />
                </div>
        </div>    
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="address2">Address line 2</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $OrganisationLocation->address2}}"  id="address2" name="address2" required />
                </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="city">City</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="city" name="city" value="{{ $OrganisationLocation->city}}" required />
                </div>
        </div> 
        <div class="row mb-3">
            <label for="country" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" name='country' id="country" required>
                    <option value="">-- Select Country --</option>
                    @foreach($countries as $id => $name)
                        <option value="{{ $id }}" {{ $OrganisationLocation->country == $id ? 'selected' : '' }}>{{ $name }}</option>
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
                        <option value="{{ $id }}" {{ $OrganisationLocation->country == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="phone">Phone</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $OrganisationLocation->phone}}"/>
                </div>
        </div>    
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="fax" >Fax</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="fax" name="fax" value="{{ $OrganisationLocation->fax}}"/>
                </div>
        </div>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
        <button type="submit" onclick="return save_organisation()" class="btn btn-primary">Save</button>
    </div>
    </form>
    </div>
  </div>
</div>