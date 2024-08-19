@php
    $categories = App\Models\Category::where('status', 1)->orderBy('serial', 'asc')->select('id', 'name', 'name_bn')->get();
    $brands = App\Models\Brand::select('id', 'name', 'name_bn')->get();
    $productSizes = App\Models\ProductSize::select('id', 'name', 'name_bn')->get();
    $colors = App\Models\Color::select('id', 'name', 'code')->get();
@endphp

   @php
   $lan = session()->get('language');

   use App\Models\Language;
   if (session()->has('language')) {
       $sl = session()->get('language');
       $lg = Language::find($sl['language_id']);
   } else {
       $lg = Language::where('default_status', 1)->first();
   }

   $languages = App\Models\Language::get();
@endphp


<div class="sidebar-section box-shadows">
    <form id="filterForm" action="{{ route('filter.product') }}" method="POST">
        @csrf
        <input type="hidden" name="page" value="{{ request('page', 1) }}">

        <!-- Filter Sections -->
        <div class="sidebar-section-inner">
            <!-- Price Range Section -->
            <div class="sidebar-wrapper">
                <h3 class="wrapper-heading">{{ lan_key('price_range') }}</h3>
                <div class="price-input-field">
                    <div class="field">
                        <span>Min</span>
                        <input type="number" class="input-min" name="min_price" value="{{ request('min_price', 500) }}" />
                    </div>
                    <div class="separator">-</div>
                    <div class="field">
                        <span>Max</span>
                        <input type="number" class="input-max" name="max_price" value="{{ request('max_price', 500000) }}" />
                    </div>
                </div>
                <div class="slider">
                    <div class="progress"></div>
                </div>
                <div class="range-input">
                    <input type="range" class="range-min" min="0" max="1000000" value="{{ request('min_price', 50000) }}" step="100" />
                    <input type="range" class="range-max" min="0" max="1000000" value="{{ request('max_price', 450000) }}" step="100" />
                </div>
            </div>

            <hr />

            <!-- Product Categories Section -->
            <div class="sidebar-wrapper">
                <h3 class="wrapper-heading">{{ lan_key('product_categories') }}</h3>
                <div class="sidebar-item">
                    <ul class="sidebar-list">
                        @foreach ($categories as $category)
                            <li>
                                <input type="checkbox" class="filter-checkbox" id="category_{{ $category->id }}" name="categories[]"
                                       value="{{ $category->id }}" {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }} />
                                <label for="category_{{ $category->id }}">
                                    @if (!$lan)
                                        {{ $category->name }}
                                    @elseif ($lan['language_id'] == 1)
                                        {{ $category->name }}
                                    @elseif ($lan['language_id'] == 2)
                                        {{ $category->name_bn }}
                                    @endif
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr />

            <!-- Brands Section -->
            <div class="sidebar-wrapper">
                <h3 class="wrapper-heading">{{ lan_key('brands') }}</h3>
                <div class="sidebar-item">
                    <ul class="sidebar-list">
                        @foreach ($brands as $brand)
                            <li>
                                <input type="checkbox" class="filter-checkbox" id="brand_{{ $brand->id }}" name="brands[]"
                                       value="{{ $brand->id }}" {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }} />
                                <label for="brand_{{ $brand->id }}">
                                    @if (!$lan)
                                        {{ $brand->name }}
                                    @elseif ($lan['language_id'] == 1)
                                        {{ $brand->name }}
                                    @elseif ($lan['language_id'] == 2)
                                        {{ $brand->name_bn }}
                                    @endif
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr />

            <!-- Color Section -->
            <div class="sidebar-wrapper">
                <h3 class="wrapper-heading">{{ lan_key('color') }}</h3>
                <fieldset class="variant__input--fieldset color-field">
                    @foreach ($colors as $color)
                        <input id="color_{{ $color->id }}" class="filter-checkbox btn-check" name="colors[]" type="checkbox"
                               value="{{ $color->id }}" {{ in_array($color->id, request('colors', [])) ? 'checked' : '' }} />
                        <label class="variant__color--value btn btn-secondary" for="color_{{ $color->id }}"
                               title="{{ $color->name }}" style="background-color: {{ $color->code }};"></label>
                    @endforeach
                </fieldset>
            </div>

            <hr />

            <!-- Weight Section -->
            <div class="sidebar-wrapper">
                <h3 class="wrapper-heading">{{ lan_key('weight') }}</h3>
                <div class="sidebar-item">
                    <ul class="sidebar-list">
                        @foreach ($productSizes as $productSize)
                            <li>
                                <input type="checkbox" class="filter-checkbox" id="productSize_{{ $productSize->id }}" name="productSize[]"
                                       value="{{ $productSize->id }}" {{ in_array($productSize->id, request('productSize', [])) ? 'checked' : '' }} />
                                <label for="productSize_{{ $productSize->id }}">
                                    @if (!$lan)
                                        {{ $productSize->name }}
                                    @elseif ($lan['language_id'] == 1)
                                        {{ $productSize->name }}
                                    @elseif ($lan['language_id'] == 2)
                                        {{ $productSize->name_bn }}
                                    @endif
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <hr />
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function applyFilters() {
            var formData = $('#filterForm').serialize();
            $.ajax({
                url: $('#filterForm').attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.product__section--inner').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        $('#filterForm').on('change', '.filter-checkbox, .input-min, .input-max', function() {
            applyFilters();
        });

        $('.range-min').on('input', function() {
            $('.input-min').val($(this).val()).trigger('change');
        });

        $('.range-max').on('input', function() {
            $('.input-max').val($(this).val()).trigger('change');
        });
    });
</script>
