
@csrf
<!-- The Modal -->
<div class="modal" id="locationModal">
  <div class="modal-dialog">
    <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">Organisation Location</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
    </div>
    <form action="{{ route('organisation_locations.store') }}" method="POST" id="locationForm">
    <!-- Modal body -->
    <div class="modal-body">
    
        @csrf
        <input type="hidden" value="{{ $organisation->id}}" name="organisation_id" id="organisation_id">

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
                        <option value="{{ $id }}" {{ old('country') == $id ? 'selected' : '' }}>{{ $name }}</option>
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
                        <option value="{{ $id }}" {{ old('state') == $id ? 'selected' : '' }}>{{ $name }}</option>
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