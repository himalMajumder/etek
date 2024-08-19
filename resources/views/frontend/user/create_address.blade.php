@extends('frontend.user_master')


 <!-- Other head elements -->
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery Migrate -->
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>
    <!-- Select2 Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Magnific Popup Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />



@section('content')
    <div class="col-lg-12 col-xl-9 col-12">
        <div class="dashboard-address mgTop24">


            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="manage-address-modal-haeder modal-header">
                        <div class="manage-address-modal-title modal-title h4">
                            Add new address
                        </div>
                        <div class="btn-close manage-address-modal-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <form action="{{ route('address.store') }}" method="post">
                        @csrf
                        <div class="manage-address-modal-body add-address-modal-body modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Full name</label><input type="text" required=""
                                            placeholder="ex: Jhon Smith" name="full-name" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Mobile number</label><input type="tel" required="" name="number"
                                            placeholder="ex: 01234567890" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address</label><input type="text" required="" name="address"
                                            placeholder="ex: House no. / building / street / area" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group select-style-2">
                                        <label>Select city</label>
                                        <select name="city_id" id="citySelect" class="hero-search-filter-select" required>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group select-style-2">
                                        <label>Select area</label>
                                        <select name="area_id" id="areaSelect" class="select2 hero-search-filter-select" required>
                                            @foreach ($upazilas as $upazila)
                                                <option value="{{ $upazila->id }}">{{ $upazila->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group select-style-2">
                                        <label>Set address for</label>
                                        <div class="set-address">
                                            <div class="single-set-address">
                                                <input type="checkbox" class="btn-check" id="btncheck1"
                                                    autocomplete="off" />
                                                <label class="btn btn-outline-primary" for="btncheck1">Shipping
                                                    address</label>
                                            </div>
                                            <div class="single-set-address">
                                                <input type="checkbox" class="btn-check" id="btncheck2"
                                                    autocomplete="off" />
                                                <label class="btn btn-outline-primary" for="btncheck2">Billing
                                                    address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="manage-address-modal-footer"
                            style="
                                    border-top: 1px solid var(--border-color);
                                    padding-top: 16px;
                                ">
                            <button type="button" class="theme-btn" data-bs-dismiss="modal" aria-label="Close">
                                Cancel
                            </button>
                            <button type="submit" class="theme-btn primary">
                                Save address
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
















@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script>
    $(document).ready(function() {
        // Initialize select2
        $('#citySelect').select2();
        $('#areaSelect').select2();

        $('#citySelect').on('change', function() {
            var cityId = $(this).val();
            if(cityId) {
                $.ajax({
                    url: '{{ url('/get-areas') }}/' + cityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#areaSelect').empty();
                        $.each(data, function(key, value) {
                            $('#areaSelect').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                        // Trigger change event to update select2
                        $('#areaSelect').trigger('change');
                    }
                });
            } else {
                $('#areaSelect').empty();
            }
        });
    });
</script>
@endsection
