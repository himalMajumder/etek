<div class="manage-address-modal modal fade" id="changeAddress" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="manage-address-modal-haeder modal-header">
                <div class="manage-address-modal-title modal-title h4">
                    Manage address
                </div>
                <div class="btn-close manage-address-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fi-rr-cross-small"></i>
                </div>
            </div>
            <form action="#" method="post">
                <div class="manage-address-modal-body modal-body">
                    <!-- Manage Profile Widget -->
                    <div class="manage-address-widget">
                        <div class="manage-address-widget-head">
                            <h4><i class="fi-ss-truck-moving"></i>Shipping address</h4>
                            <div class="manage-address-add-address">
                                <a class="theme-btn addNewAddress-btn" href="#" data-bs-toggle="modal"
                                    data-bs-target="#addNewAddress"><i class="fi-rr-plus"></i>Add new address</a>
                            </div>
                        </div>
                        <div class="shipping-address-list">
                            @if ($userAddress)
                                @php
                                    $shippingAddress = $userAddress->Where('address_type', 'Home');
                                @endphp
                                @foreach ($shippingAddress as $address)
                                    <!-- Single Manage Address  -->
                                    <div class="manage-address-single">
                                        <label for="shipping-address-{{ $address->slug }}">
                                            <div class="manage-address-input-main">
                                                <div class="manage-address-input-info">
                                                    <input class="form-check-input shipping-address" type="radio"
                                                        name="shipping-address" id="shipping-address-{{ $address->slug }}" value="{{ $address->slug }}" />
                                                    <h4>{{ $address->name }}</h4>
                                                </div>
                                                <p>{{ $address->phone }}</p>
                                                <span>
                                                    {{ $address->address }}, {{ $address->city }},
                                                    {{ $address->state }}, {{ $address->country }},
                                                    {{ $address->post_code }}
                                                </span>
                                                <div class="manage-address-input-info-action">
                                                    <button type="button" class="input-info-action-btn edit-btn"
                                                        data-bs-toggle="modal" data-bs-target="#editManageAddress">
                                                        <i class="fi-rr-edit"></i>
                                                    </button>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#deleteAddressModal"
                                                        class="input-info-action-btn delete-btn delete-address"
                                                        data-route="{{ route('newAddress.destroy', ['slug' => $address->slug]) }}">
                                                        <i class="fi-rr-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <!-- Manage Profile Widget -->
                    <div class="manage-address-widget">
                        <div class="manage-address-widget-head">
                            <h4><i class="fi-ss-map-marker"></i>Billing address</h4>
                            <div class="manage-address-add-address">
                                <a class="theme-btn addNewAddress-btn" href="#" data-bs-toggle="modal"
                                    data-bs-target="#addNewAddress"><i class="fi-rr-plus"></i>Add new address</a>
                            </div>
                        </div>
                        <div class="billing-address-list">
                            @if ($userAddress)
                                @php
                                    $billingAddress = $userAddress->Where('address_type', 'Office');
                                @endphp
                                @foreach ($billingAddress as $address)
                                    <!-- Single Manage Address  -->
                                    <div class="manage-address-single">
                                        <label for="billing-address-{{ $address->slug }}">
                                            <div class="manage-address-input-main">
                                                <div class="manage-address-input-info">
                                                    <input class="form-check-input billing-address" type="radio"
                                                        name="billing-address" id="billing-address-{{ $address->slug }}" value="{{ $address->slug }}"/>
                                                    <h4>{{ $address->name }}</h4>
                                                </div>
                                                <p>{{ $address->phone }}</p>
                                                <span>
                                                    {{ $address->address }}, {{ $address->city }},
                                                    {{ $address->state }}, {{ $address->country }},
                                                    {{ $address->post_code }}
                                                </span>
                                                <div class="manage-address-input-info-action">
                                                    {{-- <button type="button" class="input-info-action-btn edit-btn"
                                                        data-bs-toggle="modal" data-bs-target="#editManageAddress">
                                                        <i class="fi-rr-edit"></i>
                                                    </button> --}}
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#deleteAddressModal"
                                                        class="input-info-action-btn delete-btn delete-address"
                                                        data-route="{{ route('newAddress.destroy', ['slug' => $address->slug]) }}">
                                                        <i class="fi-rr-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="manage-address-modal-footer">
                    <button type="button" class="theme-btn" data-bs-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                    {{-- <button type="submit" class="theme-btn primary">
                        Update address
                    </button> --}}
                </div>
            </form>
        </div>
    </div>
</div>
