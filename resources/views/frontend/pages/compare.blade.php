@extends('frontend.master')

@section('css')
    <style>
        .search-results {
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            background-color: white;
        }

        .result-item {
            padding: 10px;
            cursor: pointer;
        }

        .result-item:hover {
            background-color: #f0f0f0;
        }
    </style>
@endsection



@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-lg-8 col-12">
                    <div class="breadcrumb__content style-2 text-center">
                        <h1 class="breadcrumb__content--title mb-25">
                            {{ lan_key('product_compare') }}
                        </h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}"> {{ lan_key('home') }} </a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span> {{ lan_key('product_compare') }} </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Product Compare Area -->
    <section class="product-compare-page section--padding">
        <div class="container">
            <div class="compare-table">
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-products">
                    <div class="compare-col compare-field">Product</div>
                    <!-- Product 1 -->
                    <div class="compare-col compare-product">
                        <div class="pc-search-widget">
                            <div class="pc-search-input">
                                <input type="search" id="search-product-1" name="search" class="product-search"
                                    placeholder="Select Product" />
                                <i class="fi-rr-search"></i>
                                <div class="search-results" id="search-results-1"></div>
                            </div>
                            <div id="product-info-1" class="product-info">
                                <img id="product-image-1" src="" alt="Product Image" width="228"
                                    height="257" />
                                <h3 id="product-name-1"></h3>
                                {{-- <div id="product-price-1" class="dp-price-main"></div>
                                <p id="product-stock-1"></p> --}}
                                <p id="product-description-1" class="product-description"></p>
                                <!-- Added for description -->
                            </div>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="compare-col compare-product">
                        <div class="pc-search-widget">
                            <div class="pc-search-input">
                                <input type="search" id="search-product-2" name="search" class="product-search"
                                    placeholder="Select Product" />
                                <i class="fi-rr-search"></i>
                                <div class="search-results" id="search-results-2"></div>
                            </div>
                            <div id="product-info-2" class="product-info">
                                <img id="product-image-2" src="" alt="Product Image" width="228"
                                    height="257" />
                                <h3 id="product-name-2"></h3>
                                {{-- <div id="product-price-2" class="dp-price-main"></div>
                                <p id="product-stock-2"></p> --}}
                                <p id="product-description-2" class="product-description"></p>
                                <!-- Added for description -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparison fields -->
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-price">
                    <div class="compare-col compare-field">Price</div>
                    <div class="compare-col compare-value" id="price-1">$0.00</div>
                    <div class="compare-col compare-value" id="price-2">$0.00</div>
                </div>
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-stock">
                    <div class="compare-col compare-field">Stock</div>
                    <div class="compare-col compare-value" id="stock-1">0</div>
                    <div class="compare-col compare-value" id="stock-2">0</div>
                </div>


                {{-- <!-- End of Compare Availability -->
                <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-description">
                    <div class="compare-col compare-field">Description</div>
                    <div class="compare-col compare-value">
                        <p id="product-description-1" class="product-description"></p>
                    </div>
                    <div class="compare-col compare-value">
                        <p id="product-description-2" class="product-description"></p>
                    </div>
                </div> --}}


            </div>
        </div>
    </section>
    <!-- End Product Compare Area -->
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var selectedProducts = {};

            function setupSearchInput(searchInputId, resultsContainerId, productInfoId, otherSearchInputId) {
                $('#' + searchInputId).on('input', function() {
                    var query = $(this).val();

                    if (query.length > 0) {
                        $.ajax({
                            url: '/search-products', // Laravel route URL
                            method: 'GET',
                            data: {
                                search: query
                            },
                            success: function(response) {
                                displayResults(response, resultsContainerId, productInfoId,
                                    otherSearchInputId);
                            },
                            error: function(xhr) {
                                console.error("Error: " + xhr.status + " " + xhr.statusText);
                            }
                        });
                    } else {
                        $('#' + resultsContainerId).empty(); // Clear results if input is empty
                    }
                });
            }




            function updateProductInfo(productName, productImage, productPrice, productDiscountPrice, productStock,
                productDescription, productInfoId) {
                var adminUrl =
                    "{{ env('ADMIN_URL') }}"; // Ensure this variable is correctly set from the server side

                // Update product info
                $('#' + productInfoId + ' img').attr('src', adminUrl + '/' + productImage);
                $('#' + productInfoId + ' h3').text(productName);

                var priceHtml = '';
                if (productDiscountPrice < productPrice) {
                    priceHtml += '<del>৳ ' + productPrice + '</del> ';
                    priceHtml += '৳ ' + productDiscountPrice;
                } else {
                    priceHtml += '৳ ' + productPrice;
                }
                $('#' + productInfoId + ' #product-price-' + productInfoId.split('-')[2]).html(priceHtml);

                $('#' + productInfoId + ' #product-stock-' + productInfoId.split('-')[2]).text(productStock);

                // Update description
                var descriptionHtml = '';
                if (productDescription && productDescription.length > 0) {
                    // Split description into lines and wrap each line in a <li> element
                    descriptionHtml = productDescription.split('\n').map(function(line) {
                        return '<li>' + line.trim() + '</li>';
                    }).join('');
                }
                $('#' + productInfoId + ' #product-description-' + productInfoId.split('-')[2]).html(
                    descriptionHtml);

                // Set the input value to the selected product's name
                $('#' + productInfoId).prev('.pc-search-input').find('input').val(productName);
            }

            function displayResults(data, resultsContainerId, productInfoId, otherSearchInputId) {
                var resultsContainer = $('#' + resultsContainerId);
                resultsContainer.empty();

                if (data.length > 0) {
                    data.forEach(function(item) {
                        resultsContainer.append('<div class="result-item" data-id="' + item.id +
                            '" data-name="' + item.name + '" data-image="' + item.image +
                            '" data-price="' + item.price + '" data-discount-price="' + item
                            .discount_price + '" data-stock="' + item.stock + '" data-description="' +
                            item.description + '">' + item.name +
                            '</div>');
                    });

                    // Attach click event listener to each result item
                    $('.result-item').on('click', function() {
                        var productId = $(this).data('id');
                        var productName = $(this).data('name');
                        var productImage = $(this).data('image');
                        var productPrice = $(this).data('price');
                        var productDiscountPrice = $(this).data('discount-price');
                        var productStock = $(this).data('stock');
                        var productDescription = $(this).data('description'); // Retrieve description

                        // Update product info
                        updateProductInfo(productName, productImage, productPrice, productDiscountPrice,
                            productStock, productDescription, productInfoId);

                        // Save selected product
                        var productNumber = productInfoId.split('-')[2];
                        selectedProducts[productNumber] = {
                            name: productName,
                            image: productImage,
                            price: productPrice,
                            discountPrice: productDiscountPrice,
                            stock: productStock,
                            description: productDescription // Save description
                        };

                        // Update the comparison fields
                        updateComparisonFields();

                        // Clear the search results of the current search field
                        $('#' + resultsContainerId).empty();
                    });
                } else {
                    resultsContainer.append('<div class="no-results">No products found</div>');
                }
            }


            function updateComparisonFields() {
                // Update the comparison fields with the selected products' data
                if (selectedProducts['1']) {
                    var priceHtml = '';
                    if (selectedProducts['1'].discountPrice < selectedProducts['1'].price) {
                        priceHtml += '<del>৳ ' + selectedProducts['1'].price + '</del> ';
                        priceHtml += '৳ ' + selectedProducts['1'].discountPrice;
                    } else {
                        priceHtml += '৳ ' + selectedProducts['1'].price;
                    }
                    $('#price-1').html(priceHtml);
                    $('#stock-1').text(selectedProducts['1'].stock);
                    // Update description
                    $('#product-description-1').html('<li>' + selectedProducts['1'].description.split('\n').map(
                        line => line.trim()).join('</li><li>') + '</li>');
                }

                if (selectedProducts['2']) {
                    var priceHtml = '';
                    if (selectedProducts['2'].discountPrice < selectedProducts['2'].price) {
                        priceHtml += '<del>৳ ' + selectedProducts['2'].price + '</del> ';
                        priceHtml += '৳ ' + selectedProducts['2'].discountPrice;
                    } else {
                        priceHtml += '৳ ' + selectedProducts['2'].price;
                    }
                    $('#price-2').html(priceHtml);
                    $('#stock-2').text(selectedProducts['2'].stock);
                    // Update description
                    $('#product-description-2').html('<li>' + selectedProducts['2'].description.split('\n').map(
                        line => line.trim()).join('</li><li>') + '</li>');
                }
            }


            // Initialize search inputs
            setupSearchInput('search-product-1', 'search-results-1', 'product-info-1', 'search-product-2');
            setupSearchInput('search-product-2', 'search-results-2', 'product-info-2', 'search-product-1');
        });
    </script>
@endsection
