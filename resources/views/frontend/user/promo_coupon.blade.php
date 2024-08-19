@extends('frontend.user_master')
@section('content')
<div class="col-lg-12 col-xl-9 col-12">

  <div class="promo-coupon-area mgTop24">
    <div class="dashboard-head-widget style-2" style="margin: 0">
      <h5 class="dashboard-head-widget-title">Promo or Coupon</h5>
      <div class="dashboard-head-widget-btn">
        {{-- <button type="button"
                class="theme-btn secondary-btn icon-right btn btn-primary widget-show-btn">
                <i class="fi-rr-plus"></i>Add coupon
            </button> --}}
      </div>
      <!-- Coupon Widget Area -->
      {{-- <div class="add-coupon-code-widget">
            <form action="#" method="post" class="add-coupon-code-form">
                <div>
                    <label class="form-label">Type promo/ coupon code</label><input
                        placeholder="Enter promo" type="text" class="form-control" required="">
                </div>
                <button type="button" class="theme-btn btn btn-primary">
                    Apply coupon
                </button>
            </form>
        </div> --}}
      <!-- End Coupon Widget Area -->
    </div>
    <div class="promo-coupon-inner">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="promo-coupon-group-widget card-left">
            <div class="promo-coupon-group-widget-head">
              <h6 class="promo-coupon-group-widget-head-title">
                Available coupon
              </h6>
            </div>

            @if(count($promoCoupons) > 0)
            @foreach ($promoCoupons as $promoCoupon)
            @if(!DB::table('orders')->where('coupon_code', $promoCoupon->code)->where('user_id', Auth::user()->id)->exists())
            <div class="promo-coupon-card">
              <div class="promo-coupon-card-icon">
                <img alt="#" src="{{asset('user/assets/img/icons/offer.svg')}}">
              </div>
              <div class="promo-coupon-card-info">
                <div class="promo-coupon-card-info-content">
                  <div class="promo-coupon-card-info-content-main">
                    <h6>{{$promoCoupon->title}}</h6>
                    <p>
                      Validity:<span>{{date("d F, Y", strtotime($promoCoupon->expire_date))}}</span>
                    </p>
                  </div>
                  <div class="promo-coupon-card-info-btn">
                    @if($promoCoupon->status == 1)
                    <span class="active-btn">Active</span>
                    @else
                    <span class="expired-btn">Expired</span>
                    @endif
                  </div>
                </div>
                <div class="promo-couponcode">
                  <div class="copy-text">
                    <input type="text" class="text text-Coupon1" readonly="" value="{{$promoCoupon->code}}">
                    <button onclick="copyToClipboard('{{$promoCoupon->code}}')">
                      <i class="fi-rr-copy" alt="Copy"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @endforeach
            @else
            <h5 style="padding: 10px 0px; border-radius: 4px; font-size: 16px; font-weight: 500; margin-top: 15px; background: #f9f9f9;" class="text-center">No Coupons Available</h5>
            @endif


          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <div class="promo-coupon-group-widget card-right">
            <div class="promo-coupon-group-widget-head">
              <h6 class="promo-coupon-group-widget-head-title">
                Applied coupon
              </h6>
            </div>

            @if(count($appliedCoupons) > 0)
            @foreach ($appliedCoupons as $appliedCoupon)
            <div class="promo-coupon-card applied-coupon-card">
              <div class="promo-coupon-card-overlay">
                <div class="promo-coupon-card-icon">
                  <img alt="" src=" {{asset('user/assets/images/icons/offer.svg')}} ">
                </div>
                <div class=" promo-coupon-card-info">
                  <div class="promo-coupon-card-info-content" style="align-items: center">
                    <div class="promo-coupon-card-info-content-main">
                      <h6>{{$appliedCoupon->title}}</h6>
                      <p>
                        Validity:<span>{{date("d F, Y", strtotime($appliedCoupon->expire_date))}}</span>
                      </p>
                    </div>
                    <div class="promo-coupon-card-info-btn">
                      <span class="applied-btn">Applied</span>
                    </div>
                  </div>
                </div>
              </div>
              {{-- <div class="applied-coupon-card-remove">
                            <span>Remove</span>
                        </div> --}}
            </div>
            @endforeach
            @else
            <h5 style="padding: 10px 0px; border-radius: 4px; font-size: 16px; font-weight: 500; margin-top: 15px; background: #f9f9f9;" class="text-center">No Coupons Applied</h5>
            @endif


          </div>
        </div>
      </div>
    </div>
  </div>

</div>





@endsection

@section('js')

<script>
  function copyToClipboard(code) {
    var copyText = code;
    navigator.clipboard.writeText(copyText);
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.timeOut = 1000;
    toastr.success("Copied to Clipboard")
  }
</script>
<!-- Widget Show JS -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".widget-show-btn").click(function() {
      $(".add-coupon-code-widget").toggleClass("active");
    });
  });
</script>

@endsection
