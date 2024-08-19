@extends('frontend.user_master')
@section('content')
<div class="col-lg-12 col-xl-9 col-12">
    <div class="rewards-page mgTop24">
        <div class="dashboard-head-widget style-2" style="margin: 0px">
            <h5 class="dashboard-head-widget-title">Rewards</h5>
        </div>
        <!-- Reward hero -->
        <div class="reward-hero">
            <div class="reward-hero-inner">
                <div class="reward-hero-card">
                    <div class="reward-hero-card-icon">
                        <img src="{{asset('user/assets/img/dashboard-reward/hero-card-icon-1.svg')}}" alt="#" />
                    </div>
                    <div class="reward-hero-card-info">
                        <h4>{{$user->balance}}</h4>
                        <p>Lifetime points</p>
                    </div>
                </div>
                <div class="reward-hero-banner">
                    <img src="{{asset('user/assets/img/dashboard-reward/hero-banner-img.svg')}}" alt="#" />
                </div>
                <div class="reward-hero-card">
                    <div class="reward-hero-card-info" style="text-align: right">
                        <h4>{{$user->balance}}</h4>
                        <p>Point balance</p>
                    </div>
                    <div class="reward-hero-card-icon">
                        <img src="{{asset('user/assets/img/dashboard-reward/hero-card-icon-2.svg')}}" alt="#" />
                    </div>
                </div>
            </div>
        </div>



        <!-- Reward achivements -->
        <div class="reward-achivements">
            <!-- Single Achivement Card -->
            <div class="reward-a-card">
                <div class="reward-a-card-top">
                    <div class="reward-a-card-icon">
                        <img src="{{asset('user/assets/img/dashboard-reward/achivement-icon/icon-1.svg')}}" alt="#" />
                    </div>
                    <p>Bronze</p>
                </div>
                <div class="achivement-progress-line"></div>
                <div class="reward-a-card-bottom">
                    <span style="text-align: left">0</span>
                </div>
            </div>
            <!-- Single Achivement Card -->
            <div class="reward-a-card">
                <div class="reward-a-card-top">
                    <div class="reward-a-card-icon">
                        <img src="{{asset('user/assets/img/dashboard-reward/achivement-icon/icon-2.svg')}}" alt="#" />
                    </div>
                    <p>Sliver</p>
                </div>
                <div class="reward-a-card-bottom">
                    <span>10000</span>
                </div>
            </div>
            <!-- Single Achivement Card -->
            <div class="reward-a-card">
                <div class="reward-a-card-top">
                    <div class="reward-a-card-icon">
                        <img src="{{asset('user/assets/img/dashboard-reward/achivement-icon/icon-3.svg')}}" alt="#" />
                    </div>
                    <p>Gold</p>
                </div>
                <div class="reward-a-card-bottom">
                    <span>30000</span>
                </div>
            </div>
            <!-- Single Achivement Card -->
            <div class="reward-a-card">
                <div class="reward-a-card-top">
                    <div class="reward-a-card-icon">
                        <img src="{{asset('user/assets/img/dashboard-reward/achivement-icon/icon-4.svg')}}" alt="#" />
                    </div>
                    <p>Diamond</p>
                </div>
                <div class="reward-a-card-bottom">
                    <span style="text-align: right">50000</span>
                </div>
            </div>
        </div>



        <!-- Reward Faq  -->
        <div class="faq-area">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 col-12">
                    <div class="faq-inner accordion" id="accordionExample">


                        <!-- Single Faq -->
                        <div class="accordion" id="accordionExample">
                            @foreach($faqs as $index => $faq)
                            <div class="single-faq-widget">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                        <h3>{{ $faq->question }}</h3>
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="faq-inner-body">
                                        <p class="faq-inner-body-text">
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Faq Area -->
    </div>
</div>

@endsection

@section('footer_js')
    <script src="{{url('frontend_assets')}}/js/plugins/select2.min.js"></script>
    <script>
        $('[data-toggle="select2"]').select2();

        $('#shipping_district_id').on('change', function () {
            var district_id = this.value;
            $("#shipping_thana_id").html('');
            $.ajax({
                url: "{{url('/district/wise/thana')}}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#shipping_thana_id').html('<option data-display="Select One" value="">Select Thana</option>');
                    $.each(result.data, function (key, value) {
                        $("#shipping_thana_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        $('#edit_district_id').on('change', function () {
            var district_id = this.value;
            $("#edit_shipping_thana_id").html('');
            $.ajax({
                url: "{{url('/district/wise/thana')}}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#edit_shipping_thana_id').html('<option data-display="Select One" value="">Select Thana</option>');
                    $.each(result.data, function (key, value) {
                        $("#edit_shipping_thana_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });


        $('body').on('click', '.editAddress', function () {
            var slug = $(this).data('id');
            $('#staticBackdrop').modal('show');
            $('#address_slug').val(slug);
            // $('#edit_address_type').val($("#update_address_type_"+slug).val());
            $('#edit_address_line').val($("#update_address_line_"+slug).val());
            $('#edit_postal_Code').val($("#update_post_code_"+slug).val());
            $("#edit_district_id option:contains('" + $("#update_city_"+slug).val() + "')").prop("selected", true);
            var district_id = $("#update_city_id_"+slug).val();
            $("#edit_shipping_thana_id").html('');
            $.ajax({
                url: "{{url('/district/wise/thana')}}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#edit_shipping_thana_id').html('<option data-display="Select One" value="">Select Thana</option>');
                    $.each(result.data, function (key, value) {
                        $("#edit_shipping_thana_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $("#edit_shipping_thana_id option:contains('" + $("#update_state_"+slug).val() + "')").prop("selected", true);
                }
            });

        });


        $('#updateBtn').click(function (e) {

            toastr.options.positionClass = 'toast-bottom-right';
            toastr.options.timeOut = 1500;

            if($('#edit_address_type').val() == ''){
                toastr.error("Address Type is Missing");
                return false;
            }
            if($('#edit_address_line').val() == ''){
                toastr.error("Address Line is Missing");
                return false;
            }
            if($('#edit_district_id').val() == ''){
                toastr.error("District is Missing");
                return false;
            }
            if($('#edit_shipping_thana_id').val() == ''){
                toastr.error("Thana/Upazila is Missing");
                return false;
            }
            if($('#edit_postal_Code').val() == ''){
                toastr.error("Post Code is Missing");
                return false;
            }

            e.preventDefault();
            $(this).html('Saving..');
            $.ajax({
                data: $('#productForm2').serialize(),
                url: "{{ url('update/user/address') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#updateBtn').html('Save');
                    $('#productForm2').trigger("reset");
                    $('#staticBackdrop').modal('hide');
                    toastr.success("Address Updated Successfully");
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                    toastr.warning("Something Went Wrong");
                    $('#saveBtn').html('Save');
                }
            });
        });


        $(document).ready(function() {
            $(".widget-show-btn").click(function() {
                $(".add-new-address-widget").toggleClass("active");
            });

            // Adding functionality to the close icon
            $(".add-new-address-widget .close-icon").click(function() {
                $(".add-new-address-widget").removeClass("active");
            });
        });
    </script>
@endsection
