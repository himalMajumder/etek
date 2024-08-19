@extends('frontend.user_master')

@section('content')
    <div class="col-lg-12 col-xl-9 col-12">
        <div class="dashboard-address mgTop24">
            <div class="dashboard-head-widget style-2" style="margin: 0">
                <h5 class="dashboard-head-widget-title">Address</h5>
                <div class="dashboard-head-widget-btn">

                    <a href="{{route('create.address.new')}}">
                    <button data-bs-toggle="modal" data-bs-target="#aaa" class="theme-btn secondary-btn icon-right btn btn-primary">
                        <i class="fi-rr-plus"></i>Add new address
                    </button></a>

                </div>
            </div>

            <div class="dashboard-address-widget">
                @foreach ($addresses as $address)
                    <div class="address-card">
                        <div class="address-card-head">
                            <div class="address-card-head-title">
                                <div class="address-card-head-icon">
                                    <img alt="#" src="{{ asset('user/assets/img/icons/' . ($address->address_type == 'Home' ? 'home.svg' : 'briefcase.svg')) }}" />
                                </div>
                                <h4>{{ $address->address_type }} address</h4>
                            </div>
                            <div class="address-card-head-menu dropdown">
                                <button type="button" id="dropdownMenuButton{{ $loop->index }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fi-rs-menu-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $loop->index }}">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editNewAddress" data-id="{{ $address->slug }}">Edit address</a>
                                    <a class="dropdown-item" href="#">Duplicate address</a>
                                    <a class="dropdown-item" href="{{ route('address.destroy', $address->slug) }}">Remove address</a>
                                </div>
                            </div>
                        </div>
                        <ul class="address-card-content-list">
                            <li><span>Address line</span><strong>{{ $address->address }}</strong></li>
                            <li><span>District/City</span><strong>{{ $address->city }}</strong></li>
                            <li><span>State/Region</span><strong>{{ $address->state }}</strong></li>
                            <li><span>Postal code</span><strong>{{ $address->post_code }}</strong></li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Add New Address Modal -->
    {{-- @include('frontend.modals.add_address') --}}
    {{-- <div class="manage-address-modal add-address-modal modal fade" id="addNewAddress" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="manage-address-modal-header modal-header">
                    <h4 class="manage-address-modal-title modal-title">Add new address</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('address.store') }}" method="post">
                    @csrf
                    <div class="manage-address-modal-body modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Full name</label>
                                    <input type="text" id="fullName" name="full-name" class="form-control" placeholder="ex: John Smith" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="mobileNumber">Mobile number</label>
                                    <input type="tel" id="mobileNumber" name="number" class="form-control" placeholder="ex: 01234567890" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control" placeholder="ex: House no. / building / street / area" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group select-style-2">
                                    <label for="citySelect">Select city</label>
                                    <select id="citySelect" name="city_id" class="form-select" required>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group select-style-2">
                                    <label for="areaSelect">Select area</label>
                                    <select id="areaSelect" name="area_id" class="form-select" required>
                                        <option value="">Select Area</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group select-style-2">
                                    <label>Set address for</label>
                                    <div class="set-address">
                                        <div class="single-set-address">
                                            <input type="checkbox" class="btn-check" id="shippingAddress" name="address_type[]" value="Shipping" autocomplete="off" />
                                            <label class="btn btn-outline-primary" for="shippingAddress">Shipping address</label>
                                        </div>
                                        <div class="single-set-address">
                                            <input type="checkbox" class="btn-check" id="billingAddress" name="address_type[]" value="Billing" autocomplete="off" />
                                            <label class="btn btn-outline-primary" for="billingAddress">Billing address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save address</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


    <!-- Edit Address Modal -->
    {{-- @include('frontend.modals.edit_address')
     --}}
     {{-- <div class="manage-address-modal add-address-modal modal fade" id="editNewAddress" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="manage-address-modal-header modal-header">
                    <h4 class="manage-address-modal-title modal-title">Edit address</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAddressForm" action="#" method="post">
                    @csrf
                    <div class="manage-address-modal-body modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="editFullName">Full name</label>
                                    <input type="text" id="editFullName" name="full-name" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="editMobileNumber">Mobile number</label>
                                    <input type="tel" id="editMobileNumber" name="number" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="editAddress">Address</label>
                                    <input type="text" id="editAddress" name="address" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group select-style-2">
                                    <label for="editCitySelect">Select city</label>
                                    <select id="editCitySelect" name="city_id" class="form-select" required>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group select-style-2">
                                    <label for="editAreaSelect">Select area</label>
                                    <select id="editAreaSelect" name="area_id" class="form-select" required>
                                        <option value="">Select Area</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group select-style-2">
                                    <label>Set address for</label>
                                    <div class="set-address">
                                        <div class="single-set-address">
                                            <input type="checkbox" class="btn-check" id="editShippingAddress" name="address_type[]" value="Shipping" autocomplete="off" />
                                            <label class="btn btn-outline-primary" for="editShippingAddress">Shipping address</label>
                                        </div>
                                        <div class="single-set-address">
                                            <input type="checkbox" class="btn-check" id="editBillingAddress" name="address_type[]" value="Billing" autocomplete="off" />
                                            <label class="btn btn-outline-primary" for="editBillingAddress">Billing address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save address</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

@endsection

@push('js')
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Magnific Popup CSS -->
<link rel="stylesheet" href="path/to/magnific-popup.css">

<!-- Include Magnific Popup JS -->
<script src="path/to/jquery.magnific-popup.min.js"></script>
<script>

$('#citySelect').change(function() {
    let cityId = $(this).val();
    $.ajax({
        url: "{{ route('areas.by.city') }}",
        method: 'GET',
        data: { city_id: cityId },
        success: function(response) {
            let areaSelect = $('#areaSelect');
            areaSelect.empty().append('<option value="">Select Area</option>');
            $.each(response.areas, function(index, area) {
                areaSelect.append(new Option(area.name, area.id));
            });
        }
    });
});

    $(document).ready(function() {
        // Update areas based on selected city
        $('#citySelect').change(function() {
            let cityId = $(this).val();
            $.ajax({
                url: "{{ route('areas.by.city') }}",
                method: 'GET',
                data: { city_id: cityId },
                success: function(response) {
                    let areaSelect = $('#areaSelect');
                    areaSelect.empty().append('<option value="">Select Area</option>');
                    $.each(response.areas, function(index, area) {
                        areaSelect.append(new Option(area.name, area.id));
                    });
                }
            });
        });

        $('#editCitySelect').change(function() {
            let cityId = $(this).val();
            $.ajax({
                url: "{{ route('areas.by.city') }}",
                method: 'GET',
                data: { city_id: cityId },
                success: function(response) {
                    let areaSelect = $('#editAreaSelect');
                    areaSelect.empty().append('<option value="">Select Area</option>');
                    $.each(response.areas, function(index, area) {
                        areaSelect.append(new Option(area.name, area.id));
                    });
                }
            });
        });

        // Populate edit form fields
        $('#editNewAddress').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let addressId = button.data('id');

            $.ajax({
                url: "{{ url('get/address') }}/" + addressId,
                method: 'GET',
                success: function(response) {
                    let form = $('#editAddressForm');
                    form.attr('action', "{{ url('update/address') }}/" + addressId);
                    $('#editFullName').val(response.address.name);
                    $('#editMobileNumber').val(response.address.phone);
                    $('#editAddress').val(response.address.address);
                    $('#editCitySelect').val(response.address.city_id).change();
                    $('#editAreaSelect').val(response.address.state_id);
                    $('#editShippingAddress').prop('checked', response.address.address_type.includes('Shipping'));
                    $('#editBillingAddress').prop('checked', response.address.address_type.includes('Billing'));
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Update areas based on selected city
        $('#citySelect').change(function() {
            let cityId = $(this).val();
            $.ajax({
                url: "{{ route('areas.by.city') }}",
                method: 'GET',
                data: { city_id: cityId },
                success: function(response) {
                    let areaSelect = $('#areaSelect');
                    areaSelect.empty().append('<option value="">Select Area</option>');
                    $.each(response.areas, function(index, area) {
                        areaSelect.append(new Option(area.name, area.id));
                    });
                }
            });
        });

        $('#editCitySelect').change(function() {
            let cityId = $(this).val();
            $.ajax({
                url: "{{ route('areas.by.city') }}",
                method: 'GET',
                data: { city_id: cityId },
                success: function(response) {
                    let areaSelect = $('#editAreaSelect');
                    areaSelect.empty().append('<option value="">Select Area</option>');
                    $.each(response.areas, function(index, area) {
                        areaSelect.append(new Option(area.name, area.id));
                    });
                }
            });
        });

        // Populate edit form fields
        $('#editNewAddress').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let addressId = button.data('id');

            $.ajax({
                url: "{{ url('get/address') }}/" + addressId,
                method: 'GET',
                success: function(response) {
                    let form = $('#editAddressForm');
                    form.attr('action', "{{ url('update/address') }}/" + addressId);
                    $('#editFullName').val(response.address.name);
                    $('#editMobileNumber').val(response.address.phone);
                    $('#editAddress').val(response.address.address);
                    $('#editCitySelect').val(response.address.city_id).change();
                    $('#editAreaSelect').val(response.address.state_id);
                    $('#editShippingAddress').prop('checked', response.address.address_type.includes('Shipping'));
                    $('#editBillingAddress').prop('checked', response.address.address_type.includes('Billing'));
                }
            });
        });
    });
</script>
@endpush
