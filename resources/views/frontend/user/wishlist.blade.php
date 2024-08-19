@extends('frontend.user_master')
@section('content')

<div class="col-lg-12 col-xl-9 col-12">
    <div class="wishlist-page-area mgTop24">
        <div class="dashboard-head-widget style-2">
            <h5 class="dashboard-head-widget-title">Wishlist’s</h5>
            <div class="dashboard-head-widget-btn">
                <a class="theme-btn secondary-btn" href="#">Clear all</a>
            </div>
        </div>
        <div class="wishlist-items-area" style="margin-top: 32px">
            <div class="dashboard-wishlist-inner">


                @foreach ($wishLists as $wishList )
                <div class="wishlist-card">
                    <div class="wishlist-card-data">
                        <div class="wishlist-card-img">
                            <img alt="#" src="{{ url(env('ADMIN_URL') . '/' . $wishList->product->image) }}" />
                            <div class="wishlist-card-remove">
                                <span><i class="fi-br-cross-small" onclick="removeFromWishlist({{ $wishList->id }})"></i></span>
                            </div>
                        </div>
                        <div class="wishlist-card-info">
                            <h6>{{$wishList->product->name}}</h6>
                            <p>{{$wishList->product->price}} BDT<span>/piece</span></p>
                        </div>
                    </div>
                    <div class="wishlist-card-btn">
                        <a href="#"><i class="fi-rr-shopping-bag-add" onclick="addToCart({{ $wishList->product->id }})"></i></a>
                    </div>
                </div>
                @endforeach




            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    function removeFromWishlist(id) {
        if (confirm('Are you sure you want to remove this item from your wishlist?')) {
            $.ajax({
                url: '{{ url('wishlist') }}/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#wishlist-card-' + id).remove();
                    } else {
                        alert('Failed to remove item from wishlist.');
                    }
                }
            });
        }
    }
</script>
@endsection
