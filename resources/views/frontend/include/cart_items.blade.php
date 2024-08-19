@foreach ($carts as $id => $item)
    <div id="item-{{ $id }}" class="single-checkout-order-review">
        <div class="cart-single-product-first-col">
            <button type="button" class="cart-single-product-remove minicart__product--remove"
                data-product-id="{{ $id }}">
                <i class="fi-rr-trash"></i>
            </button>
        </div>
        <div class="checkout-order-review-info">
            <span class="cart-single-product-title">{{ $item['name'] }}</span>
            <div class="checkout-order-varient-group">
                <div class="c-order-varient-single">
                    <span>Color: <strong>{{ $item['color'] ?? 'N/A' }}</strong></span>
                </div>
                <div class="c-order-varient-single">
                    <span>Size: <strong>{{ $item['size'] ?? 'N/A' }}</strong></span>
                </div>
            </div>
        </div>
        <div class="checkout-order-qty-price">
            <div class="checkout-order-qty">
                <span>Qty:</span>
                <div class="quantity__box minicart__quantity">
                    <button type="button" class="quantity__value decrease" aria-label="quantity value"
                        data-product-id="{{ $id }}" value="Decrease Value">-</button>
                    <label>
                        <input type="number" class="quantity__number" value="{{ $item['quantity'] }}"
                            data-counter="" />
                    </label>
                    <button type="button" class="quantity__value increase" aria-label="quantity value"
                        data-product-id="{{ $id }}" value="Increase Value">+</button>
                </div>
            </div>
            <span class="checkout-order-price">Price: <strong>{{ $item['price'] }} BDT</strong></span>
        </div>
    </div>
@endforeach
<script>

    // Function to calculate totals
    function calculateTotals() {
        let subtotal = 0;
        let discountPercentage = 0; // Example: 20% discount
        let discountAmount = 0; // Example: 5000 BDT discount
        let vatPercentage = 0; // Example: 5% VAT/TAX
        let vatAmount = 0;
        let deliveryCost = 100; // Example delivery cost

        // Calculate subtotal
        $('.single-checkout-order-review').each(function() {
            let price = parseFloat($(this).find('.checkout-order-price strong').text().replace(
                'BDT', '').trim());
            let quantity = parseInt($(this).find('.quantity__number').val().trim(), 10);
            if (!isNaN(price) && !isNaN(quantity)) {
                subtotal += price * quantity;
            }
        });

        // Calculate discount
        let discount = (subtotal * discountPercentage / 100) + discountAmount;

        // Calculate VAT/TAX
        vatAmount = (subtotal - discount) * vatPercentage / 100;

        // Calculate total price
        let totalPrice = subtotal - discount + vatAmount + deliveryCost;

        // Update the minicart and order summary
        $('#subtotal-display').html(`${subtotal.toFixed(2)} BDT`);
        $('#discount-display').html(`(-${discountPercentage}%) ${discount.toFixed(2)} BDT`);
        $('#tax-display').html(`(+${vatPercentage}%) ${vatAmount.toFixed(2)} BDT`);
        $('#delivery-cost-display').html(`${deliveryCost.toFixed(2)} BDT`);
        $('#total-display').html(`${totalPrice.toFixed(2)} BDT`);

        // Update the hidden inputs for form submission
        $('#subtotal').val(subtotal.toFixed(2));
        $('#discount').val(discount.toFixed(2));
        $('#tax').val(vatAmount.toFixed(2));
        $('#total').val(totalPrice.toFixed(2));
    }


    $(document).ready(function() {
        // Function to update quantity
        function updateQuantity(productId, newQuantity) {
            $.ajax({
                url: '/cart/update', // Change to your update route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    productId: productId,
                    quantity: newQuantity
                },
                success: function(response) {
                    console.log('Quantity updated successfully');
                    calculateTotals(); // Recalculate totals after quantity update
                },
                error: function(xhr) {
                    console.error('Error updating quantity', xhr);
                }
            });
        }

        // Event handlers for quantity buttons
        $(document).on('click', '.quantity__value.increase', function() {
            let productId = $(this).data('product-id');
            let quantityInput = $(this).siblings('label').find('.quantity__number');
            let currentQuantity = parseInt(quantityInput.val(), 10);

            if (!isNaN(currentQuantity)) {
                quantityInput.val(currentQuantity + 1);
                updateQuantity(productId, currentQuantity + 1);
            }
        });

        $(document).on('click', '.quantity__value.decrease', function() {
            let productId = $(this).data('product-id');
            let quantityInput = $(this).siblings('label').find('.quantity__number');
            let currentQuantity = parseInt(quantityInput.val(), 10);

            if (!isNaN(currentQuantity) && currentQuantity > 1) {
                quantityInput.val(currentQuantity - 1);
                updateQuantity(productId, currentQuantity - 1);
            }
        });

        // Call calculateTotals whenever cart items change
        function updateCartAndTotals() {
            calculateTotals();
        }

        // Bind the update function to relevant events
        $(document).on('click', '.quantity__value', function() {
            updateCartAndTotals();
        });

        // Initialize totals calculation
        calculateTotals();
    });
</script>
