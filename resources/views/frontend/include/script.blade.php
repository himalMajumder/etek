{{-- <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}" defer="defer"></script>
<script src="{{asset('assets/js/vendor/popper.js')}}" defer="defer"></script>
<script src="{{asset('assets/js/plugins/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-migrate.js')}}"></script>

<script src="{{asset('assets/js/plugins/modernizer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/nice-select.js')}}"></script>
<script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/glightbox.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-datepicker.js')}}"></script>

<script src="{{asset('assets/js/plugins/glightbox.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/owl.carousel.min.js')}}"></script>


<script src="{{asset('assets/js/plugins/active.js')}}"></script>
<!-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script src="{{asset('assets/js/script.js')}}"></script> --}}










<script>
    const baseUrl = '{{ url(env('ADMIN_URL')) }}';

    $(document).ready(function() {
        fetchCart();
    });



    function fetchCart() {
        $.ajax({
            url: '{{ route('show.cart') }}',
            method: 'GET',
            success: function(response) {
                // Update cart count
                $('.items__count').text(Object.keys(response.cart).length);

                // Render cart items
                renderCartItems(response.cart);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Something went wrong while fetching the cart data!');
            }
        });
    }

    function addToCart(productId) {
        $.ajax({
            url: '{{ route('cart.add') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId
            },
            success: function(response) {
                // Update cart count
                $('.items__count').text(Object.keys(response.cart).length);

                // Render cart items
                renderCartItems(response.cart);

                toastr.success('Product Add to cart successfully', 'Product Added', {timeOut: 5000});
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Something went wrong!');
            }
        });
    }

    function renderCartItems(cart) {
        let cartItemsHtml = '';
        let totalPrice = 0;

        $.each(cart, function(key, item) {
            totalPrice += item.price * item.quantity;

            cartItemsHtml += `
            <div class="minicart__product--items d-flex">
                <div class="minicart__thumb">
                    <a href="product-details.html">
                        <img src="${baseUrl}/${item.image}" alt="${item.name}" />
                    </a>
                </div>
                <div class="minicart__text">
                    <h3 class="minicart__subtitle h4">
                        <span class="product__items--content__subtitle">${item.name}</span>
                    </h3>
                    <div class="minicart__price">
                        <span class="current__price">${item.price} BDT</span>
                    </div>
                    <div class="minicart__text--footer d-flex align-items-center">
                        <div class="quantity__box minicart__quantity">
                            <button type="button" class="quantity__value decrease" data-product-id="${key}">-</button>
                            <label>
                                <input type="number" class="quantity__number" value="${item.quantity}" data-counter />
                            </label>
                            <button type="button" class="quantity__value increase" data-product-id="${key}">+</button>
                        </div>
                        <button class="minicart__product--remove" data-product-id="${key}">Remove</button>
                    </div>
                </div>
            </div>
        `;
        });

        // Update minicart product area
        $('.minicart__product').html(cartItemsHtml);

        // Update totals
        $('.minicart__amount_list:contains("Sub Total:") span:last').html(`<b>${totalPrice} BDT</b>`);
        $('.minicart__amount_list:contains("Total:") span:last').html(`<b>${totalPrice} BDT</b>`);
    }

    $(document).on('click', '.quantity__value.increase', function() {
        let productId = $(this).data('product-id');
        updateCart(productId, 'increase');
    });

    $(document).on('click', '.quantity__value.decrease', function() {
        let productId = $(this).data('product-id');
        updateCart(productId, 'decrease');
    });

    $(document).on('click', '.minicart__product--remove', function() {
        let productId = $(this).data('product-id');
        updateCart(productId, 'remove');
    });

    function updateCart(productId, action) {
        $.ajax({
            url: '{{ route('cart.update') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                action: action
            },
            success: function(response) {
                // Re-render the cart items
                renderCartItems(response.cart);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
