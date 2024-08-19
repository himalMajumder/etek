@php
    $authUser = auth()->user();
@endphp
<div class="col-lg-3 col-md-3 col-12">
    <div class="getcom-user-sidebar">
        <div class="user-sidebar-head">
            <div class="user-sidebar-profile">
                <img alt="#" src="{{asset('user/assets/img/user-profile-img.png')}}" />
            </div>
            <div class="user-sidebar-profile-info">
                <h5>{{ $authUser->name }}</h5>
                <p>{{ $authUser->phone }}</p>
            </div>
        </div>

        <div class="user-sidebar-menus">
            <ul class="user-sidebar-menu-list">
                <li class="active">
                    <a href="{{route('dashboard')}}"><i class="fi-ss-apps"></i>Dashboard</a>
                </li>
                <li class="menu-collapse">
                    <button class="menu-collapse-button">
                        <i class="fi-ss-shopping-cart"></i>My orders
                    </button>

                    <ul class="menu-collapse-list">
                        <li>
                            <a href="{{route('user.order')}}"><i class="fi fi-sr-rectangle-list"></i>All orders</a>
                        </li>
                        <!-- <li>
                            <a href="{{route('order.cancelation')}}"><i class="fi fi-sr-delete-document"></i>Order cancellation</a>
                        </li>
                        <li>
                            <a href="{{route('return.product')}}"><i class="fi fi-sr-undo"></i>Return products</a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="{{route('wishlist')}}"><i class="fi-ss-heart"></i>Wishlist’s</a>
                </li>
                <li>
                    <a href="{{route('promo.coupon')}}"><i class="fi-ss-ticket"></i>Promo/ Coupon</a>
                </li>
                <li>
                    <a href="{{route('address')}}"><i class="fi-ss-map-marker"></i>Address</a>
                </li>
                <li>
                    <a href="{{route('payment')}}"><i class="fi-ss-credit-card"></i>Payments</a>
                </li>
                <li>
                    <a href="{{route('rewards')}}"><i class="fi-ss-trophy"></i>Rewards</a>
                </li>
                <li>
                    <a href="{{route('product.review')}}"><i class="fi-ss-star"></i>Product reviews</a>
                </li>
                <li>
                    <a href="{{route('support.ticket')}}"><i class="fi-ss-comments"></i>Support tickets</a>
                </li>
                <li>
                    <a href="{{route('manage.profile')}}"><i class="fi-ss-settings"></i>Manage profile</a>
                </li>
            </ul>

            <div class="user-sidebar-profile-btn">
                <a href="{{route('logout')}}"><i class="fi-rr-sign-out-alt"></i>Logout</a>
            </div>
        </div>
    </div>
</div>
