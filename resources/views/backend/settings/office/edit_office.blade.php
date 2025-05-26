<div class="modal fade" id="editOffice" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('update.offices') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Office</h3>
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="office_acronym" class="bold">Acronym of Office:</label>
                            <input type="text" name="office_acronym" id="office_acronym" class="form-control">
                            @error('office_acronym')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="bold">Office Code:</label>
                            <input type="text" name="office_code" id="office_code" class="form-control">
                            @error('office_code')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="bold">Office/Hospital Name:</label>
                        <input type="text" name="office_name" id="office_name" class="form-control">
                        @error('office_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="bold">Office/Hospital In-Charge Name:</label>
                        <input type="text" name="office_incharge" id="office_incharge" class="form-control">
                        @error('office_incharge')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="bold">Office/Hospital In-Charge Position:</label>
                        <input type="text" name="office_position" id="office_position" class="form-control">
                        @error('office_position')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="bold">Office/Hospital:</label>
                        <select name="office_type" id="office_type" class="form-control">
                            <option value="" selected disable>Select Type:</option>
                            <option value="1">Office</option>
                            <option value="2">Hospital</option>
                        </select>
                        @error('office_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>