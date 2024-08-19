@foreach ($products as $product)
    <div class="product__items">
        <div class="product__items--thumbnail">
            <a class="product__items--link" href="{{ route('product.detail', $product->slug) }}">
                <img class="product__items--img product__primary--img"
                    src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}"
                    alt="{{ $product->name }}" />
                <img class="product__items--img product__secondary--img"
                    src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}"
                    alt="{{ $product->name }}" />
            </a>
            @if ($product->flag_name)
                <div class="product__badge">
                    <span class="product__badge--items sale">{{ $product->flag_name }}</span>
                </div>
            @endif
        </div>
        <div class="product__items--content">
            <span class="product__items--content__subtitle">{{ $product->category_name }}</span>
            <h3 class="product__items--content__title h4">
                <a href="{{ route('product.detail', $product->slug) }}"
                    class="product__items--content__subtitle">{{ $product->name }}</a>
            </h3>
            <div class="product__items--price">
                @if ($product->discount_price > 0)
                    <span class="current__price">৳{{ number_format($product->discount_price, 2) }}</span>
                    <span class="price__divided"></span>
                    <span class="old__price">৳{{ number_format($product->price, 2) }}</span>
                @else
                    <span class="current__price">৳{{ number_format($product->price, 2) }}</span>
                @endif
            </div>
            <ul class="product__items--action d-flex">
                <li class="product__items--action__list">
                    <a class="product__items--action__btn add__to--cart" href="#" onclick="addToCart({{ $product->id }})">
                        <i class="fi-rr-shopping-cart"></i>
                        <span class="add__to--cart__text">{{lan_key('add_to_cart')}}</span>
                    </a>
                    <a href="javascript:void(0)" class="quick-view-btn" data-open="modal1">
                        <i class="fi-rr-eye"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endforeach
