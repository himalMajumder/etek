  @php
      $categories = App\Models\Category::with('subcategories.childCategories')->where('show_on_navbar', 1)->get();
      $generalinfos = DB::table('general_infos')->first();

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

  <!-- Topbar Notice area -->
  <div class="topbar-notice">
      <div class="container">
          <div class="row">
              <div class="col-xl-7 col-md-6 col-9">
                  <div class="topbar-notice-inner">
                      <span> {{ lan_key('update') }} </span>

                      @if ($lg->id == 1)
                      <marquee behavior="" direction="left">  {!! $generalinfos->update_info !!} </marquee>
                      @else
                      <marquee behavior="" direction="left">    {!! $generalinfos->update_info_bn !!} </marquee>
                      @endif

                  </div>
              </div>
              <div class="col-xl-5 col-md-6 col-3">
                  <div class="topbar-right">
                      <ul class="topbar-info">
                          <li>
                              <a href="tel:+8801812345678"><i
                                      class="fi fi-rr-phone-call"></i>{{ $generalinfos->contact }}</a>
                          </li>
                          <li>
                              <a href="mailto:help@codecraftacademy.com">
                                  <i class="fi fi-rr-envelope"></i>{{ $generalinfos->email }}</a>
                          </li>
                      </ul>



                      <form action="{{ route('language.change') }}" method="post" id="languageForm">
                          @csrf
                          <input type="hidden" name="language_id" id="language_id" value="1" />

                          <label class="language-switcher">
                              <input type="checkbox" id="languageToggle" />
                              <span class="slider round"></span>
                              <span class="select-en" id="en-language">EN</span>
                              <span class="select-bn" id="bn-language">BN</span>
                          </label>
                      </form>



                      <script>
                          document.getElementById('languageToggle').addEventListener('change', function() {
                              const languageIdInput = document.getElementById('language_id');
                              const isChecked = this.checked;

                              if (isChecked) {
                                  languageIdInput.value = '2'; // Set language_id to 2 for Bengali
                                  document.getElementById('en-language').style.display = 'none';
                                  document.getElementById('bn-language').style.display = 'inline';
                              } else {
                                  languageIdInput.value = '1'; // Set language_id to 1 for English
                                  document.getElementById('bn-language').style.display = 'none';
                                  document.getElementById('en-language').style.display = 'inline';
                              }

                              // Submit the form when the language changes
                              document.getElementById('languageForm').submit();
                          });
                      </script>


                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Topbar Notice area -->

  <!-- Start header area -->
  <header class="header__section">
      <div class="main__header header__sticky">
          <div class="container">
              <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                  <div class="main__logo">
                      <h1 class="main__logo--title">
                          <a class="main__logo--link" href="{{ route('frontend.index') }}"><img class="main__logo--img"
                                  src="{{ url(env('ADMIN_URL') . '/' . $generalinfos->logo_dark) }}"
                                  alt="logo-img" /></a>
                      </h1>
                  </div>
                  <div class="offcanvas__header--menu__open">
                      <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                              viewBox="0 0 512 512">
                              <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                  stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                          </svg>
                          <span class="visually-hidden">Menu Open</span>
                      </a>
                  </div>
                  <div class="header__search--widget header__sticky--none d-none d-lg-block">



                      <form class="d-flex header__search--form" action="{{ route('product.search') }}" method="GET">
                          <div class="header__search--box">
                              <label>
                                  <input class="header__search--input" placeholder="Search products.." type="text"
                                      name="query" />
                              </label>
                              <button class="header__search--button bg__secondary text-white" type="submit"
                                  aria-label="search button">
                                  <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg"
                                      width="27.51" height="26.443" viewBox="0 0 512 512">
                                      <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                          fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32">
                                      </path>
                                      <path fill="none" stroke="currentColor" stroke-linecap="round"
                                          stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                  </svg>
                              </button>
                          </div>
                      </form>

                  </div>
                  <div class="header__account header__sticky--none">
                      <ul class="d-flex">
                          <li class="header__account--items">
                              <a class="header__account--btn" href="{{ route('frontend.compare') }}">
                                  <i class="fi fi-rs-code-compare"></i>
                                  <span class="header__account--btn__text">{{ lan_key('product_compare') }} </span>
                              </a>
                          </li>
                          <li class="header__account--items">
                              <a class="header__account--btn" href="#">
                                  <i class="fi fi-rs-truck-side"></i>
                                  <span class="header__account--btn__text"> {{ lan_key('track_order') }}</span>
                              </a>
                          </li>


                          <!-- Cart -->
                          <li class="header__account--items">
                              <a class="header__account--btn minicart__open--btn" href="javascript:void(0)"
                                  data-offcanvas>
                                  <div class="header__account--btn-icon">
                                      <i class="fi fi-rs-shopping-cart"></i>
                                      <span class="items__count wishlist">0</span>
                                  </div>
                                  <span class="header__account--btn__text">{{ lan_key('cart') }}</span>
                              </a>
                          </li>
                          <!-- Cart End  -->




                          <li class="header__account--items d-none d-lg-block">
                              <a class="header__account--btn" href="{{ route('login') }}">
                                  <div class="header__account--btn-icon">
                                      <i class="fi fi-rr-user"></i>
                                  </div>
                                  <span class="header__account--btn__text">{{ lan_key('account') }}</span>
                              </a>
                          </li>


                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="header__bottom">
          <div class="container">
              <div
                  class="header__bottom--inner position__relative d-none d-lg-flex justify-content-between align-items-center">
                  <div class="header__menu">
                      <nav class="header__menu--navigation">
                          <ul class="d-flex">
                              <li class="header__menu--items">
                                  <a class="header__menu--link"
                                      href="{{ route('frontend.index') }}">{{ lan_key('home') }} </a>
                              </li>
                              <li class="header__menu--items">
                                  <a class="header__menu--link"
                                      href="{{ route('frontend.shop') }}">{{ lan_key('shop') }} </a>
                              </li>
                              <li class="header__menu--items">
                                  <a class="header__menu--link"
                                      href="{{ route('frontend.brand') }}">{{ lan_key('brand') }} </a>
                              </li>


                              <!-- Dynamic Menu Items -->
                              @foreach ($categories as $category)
                                  <li class="header__menu--items">
                                      <a class="header__menu--link"
                                          href="{{ route('shop.category', $category->slug) }}">


                                          @if (!$lan)
                                              <!-- If $lan is not set or is falsy -->
                                              {{ $category->name }}
                                          @elseif ($lan['language_id'] == 1)
                                              <!-- If $lan['language_id'] is 1 -->
                                              {{ $category->name }}
                                          @elseif ($lan['language_id'] == 2)
                                              <!-- If $lan['language_id'] is 2 -->
                                              {{ $category->name_bn }}
                                          @endif


                                          @if ($category->subcategories->count() > 0)
                                              <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                                  width="12" height="7.41" viewBox="0 0 12 7.41">
                                                  <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                      transform="translate(-6 -8.59)" fill="currentColor"
                                                      opacity="0.7" />
                                              </svg>
                                          @endif
                                      </a>
                                      @if ($category->subcategories->count() > 0)
                                          <ul class="header__sub--menu">
                                              @foreach ($category->subcategories as $subcategory)
                                                  <li class="header__sub--menu__items">
                                                      <a href="{{ route('shop.subcategory', $subcategory->slug) }}"
                                                          class="header__sub--menu__link">




                                                          @if (!$lan)
                                                              <!-- If $lan is not set or is falsy -->
                                                              {{ $subcategory->name }}
                                                          @elseif ($lan['language_id'] == 1)
                                                              <!-- If $lan['language_id'] is 1 -->
                                                              {{ $subcategory->name }}
                                                          @elseif ($lan['language_id'] == 2)
                                                              <!-- If $lan['language_id'] is 2 -->
                                                              {{ $subcategory->name_bn }}
                                                          @endif


                                                          @if ($subcategory->childCategories->count() > 0)
                                                              <i class="fi fi-ss-angle-small-right"></i>
                                                          @endif
                                                      </a>

                                                      @if ($subcategory->childCategories->count() > 0)
                                                          <ul class="third-label-sub-menu">
                                                              @foreach ($subcategory->childCategories as $childCategory)
                                                                  <li>
                                                                      <a href="{{ route('shop.childCategory', $childCategory->slug) }}"
                                                                          class="header__sub--menu__link">

                                                                          @if (!$lan)
                                                                              <!-- If $lan is not set or is falsy -->
                                                                              {{ $childCategory->name }}
                                                                          @elseif ($lan['language_id'] == 1)
                                                                              <!-- If $lan['language_id'] is 1 -->
                                                                              {{ $childCategory->name }}
                                                                          @elseif ($lan['language_id'] == 2)
                                                                              <!-- If $lan['language_id'] is 2 -->
                                                                              {{ $childCategory->name_bn }}
                                                                          @endif



                                                                      </a>
                                                                  </li>
                                                              @endforeach
                                                          </ul>
                                                      @endif


                                                  </li>
                                              @endforeach
                                          </ul>
                                      @endif
                                  </li>
                              @endforeach

                              <li class="header__menu--items">
                                  <a class="header__menu--link" href="#">{{ lan_key('more') }}
                                      <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                          width="12" height="7.41" viewBox="0 0 12 7.41">
                                          <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                              transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                      </svg>
                                  </a>
                                  <ul class="header__sub--menu">
                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.about') }}" class="header__sub--menu__link">
                                              {{ lan_key('about_us') }}</a>
                                      </li>
                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.faq') }}" class="header__sub--menu__link">
                                              {{ lan_key('faq') }}</a>
                                      </li>
                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.career') }}"
                                              class="header__sub--menu__link">{{ lan_key('career') }}</a>
                                      </li>
                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.notFound') }}"
                                              class="header__sub--menu__link">{{ lan_key('404') }}</a>
                                      </li>
                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.privacy.policy') }}"
                                              class="header__sub--menu__link">{{ lan_key('privacy_policy') }}</a>
                                      </li>
                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.refund.policy') }}"
                                              class="header__sub--menu__link">
                                              {{ lan_key('return_and_refund_policy') }}</a>
                                      </li>
                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.terms.condition') }}"
                                              class="header__sub--menu__link"> {{ lan_key('terms_and_condition') }}
                                          </a>
                                      </li>
                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.compare') }} " class="header__sub--menu__link">
                                              {{ lan_key('product_compare') }} </a>
                                      </li>

                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.blog') }}" class="header__sub--menu__link">
                                              {{ lan_key('blog') }} </a>
                                      </li>
                                      <!-- <li class="header__sub--menu__items">
                                          <a href="blog-details.html" class="header__sub--menu__link">Blog Details</a>
                                      </li> -->

                                      <li class="header__sub--menu__items">
                                          <a href="{{ route('frontend.contact') }}"
                                              class="header__sub--menu__link">{{ lan_key('contact') }}</a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Start Offcanvas header menu -->
      <div class="offcanvas__header">
          <div class="offcanvas__inner">
              <div class="offcanvas__logo">
                  <a class="offcanvas__logo_link" href="index.html">
                      <img src="{{ asset('assets/img/logo/logo-black.svg') }}" alt="Grocee Logo" width="158"
                          height="36" />
                  </a>
                  <button class="offcanvas__close--btn" data-offcanvas>close</button>
              </div>
              <nav class="offcanvas__menu">
                  <ul class="offcanvas__menu_ul">
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="index.html">Home</a>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="shop.html">Shop</a>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="brand.html">Brand</a>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="shop.html">Products</a>
                          <ul class="offcanvas__sub_menu">
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Mobile | Tab</a>
                                  <ul class="offcanvas__sub_menu">
                                      <li class="offcanvas__sub_menu_li">
                                          <a class="offcanvas__sub_menu_item" href="shop.html">Smart Phones</a>
                                      </li>
                                      <li class="offcanvas__sub_menu_li">
                                          <a class="offcanvas__sub_menu_item" href="shop.html">Tablets</a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">TV | AV</a>
                                  <ul class="offcanvas__sub_menu">
                                      <li class="offcanvas__sub_menu_li">
                                          <a class="offcanvas__sub_menu_item" href="shop.html">Soundbar</a>
                                      </li>
                                      <li class="offcanvas__sub_menu_li">
                                          <a class="offcanvas__sub_menu_item" href="shop.html">Telivision</a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="shop.html">Air Conditioner</a>
                          <ul class="offcanvas__sub_menu">
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">GREE Split Wall Mounted</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Portable</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Ceiling</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Cassette</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Floor Standing</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Ducted Split</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Chiller</a>
                              </li>
                          </ul>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="shop.html">Refrigerator & Freezer
                          </a>
                          <ul class="offcanvas__sub_menu">
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">KONKA Refrigerator</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">HAIKO Refrigerator</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">KONKA Chest freezer</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">KONKA Chiller Fridge</a>
                              </li>
                          </ul>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="shop.html">Washing Machine
                          </a>
                          <ul class="offcanvas__sub_menu">
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Front Loading</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Top Loading</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Semi Auto</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">KONKA Chiller Fridge</a>
                              </li>
                          </ul>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="shop.html">Fan & Cooler
                          </a>
                          <ul class="offcanvas__sub_menu">
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Air Cooler
                                  </a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Ceiling Fan</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="shop.html" class="offcanvas__sub_menu_item">Air Curtain</a>
                              </li>
                          </ul>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="gift-voucher.html">Gift Voucher</a>
                      </li>
                      <li class="offcanvas__menu_li">
                          <a class="offcanvas__menu_item" href="shop.html">Pages </a>
                          <ul class="offcanvas__sub_menu">
                              <li class="offcanvas__sub_menu_li">
                                  <a href="about.html" class="offcanvas__sub_menu_item">About Us
                                  </a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="faq.html" class="offcanvas__sub_menu_item">Faq</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="career.html" class="offcanvas__sub_menu_item">Career</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="404.html" class="offcanvas__sub_menu_item">404 Page</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="privacy-policy.html" class="offcanvas__sub_menu_item">Privacy Policy</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="refund-policy.html" class="offcanvas__sub_menu_item">Refund Policy</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="terms-condition.html" class="offcanvas__sub_menu_item">Terms &
                                      Condition</a>
                              </li>

                              <li class="offcanvas__sub_menu_li">
                                  <a href="product-compare.html " class="offcanvas__sub_menu_item">Product Compare</a>
                              </li>

                              <li class="offcanvas__sub_menu_li">
                                  <a href="blog.html" class="offcanvas__sub_menu_item">Blog</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="blog-details.html" class="offcanvas__sub_menu_item">Blog Details</a>
                              </li>
                              <li class="offcanvas__sub_menu_li">
                                  <a href="contact.html" class="offcanvas__sub_menu_item">Contact</a>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
      <!-- End Offcanvas header menu -->

      <!-- Start Offcanvas stikcy toolbar -->
      <div class="offcanvas__stikcy--toolbar">
          <ul class="d-flex justify-content-between">
              <li class="offcanvas__stikcy--toolbar__list">
                  <a class="offcanvas__stikcy--toolbar__btn" href="index.html">
                      <span class="offcanvas__stikcy--toolbar__icon">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443"
                              viewBox="0 0 22 17">
                              <path fill="currentColor"
                                  d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z">
                              </path>
                          </svg>
                      </span>
                      <span class="offcanvas__stikcy--toolbar__label">Home</span>
                  </a>
              </li>
              <li class="offcanvas__stikcy--toolbar__list">
                  <a class="offcanvas__stikcy--toolbar__btn" href="compare.html">
                      <span class="offcanvas__stikcy--toolbar__icon">
                          <i class="fi fi-rs-code-compare" style="position: relative; top: 4px; font-size: 16px"></i>
                      </span>
                      <span class="offcanvas__stikcy--toolbar__label"> Compare</span>
                  </a>
              </li>
              <li class="offcanvas__stikcy--toolbar__list">
                  <a class="offcanvas__stikcy--toolbar__btn search__open--btn" href="javascript:void(0)"
                      data-offcanvas>
                      <span class="offcanvas__stikcy--toolbar__icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                              viewBox="0 0 512 512">
                              <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                  fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                              <path fill="none" stroke="currentColor" stroke-linecap="round"
                                  stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                          </svg>
                      </span>
                      <span class="offcanvas__stikcy--toolbar__label">Search</span>
                  </a>
              </li>
              <li class="offcanvas__stikcy--toolbar__list">
                  <a class="offcanvas__stikcy--toolbar__btn minicart__open--btn" href="javascript:void(0)"
                      data-offcanvas>
                      <span class="offcanvas__stikcy--toolbar__icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18.51" height="15.443"
                              viewBox="0 0 18.51 15.443">
                              <path
                                  d="M79.963,138.379l-13.358,0-.56-1.927a.871.871,0,0,0-.6-.592l-1.961-.529a.91.91,0,0,0-.226-.03.864.864,0,0,0-.226,1.7l1.491.4,3.026,10.919a1.277,1.277,0,1,0,1.844,1.144.358.358,0,0,0,0-.049h6.163c0,.017,0,.034,0,.049a1.277,1.277,0,1,0,1.434-1.267c-1.531-.247-7.783-.55-7.783-.55l-.205-.8h7.8a.9.9,0,0,0,.863-.651l1.688-5.943h.62a.936.936,0,1,0,0-1.872Zm-9.934,6.474H68.568c-.04,0-.1.008-.125-.085-.034-.118-.082-.283-.082-.283l-1.146-4.037a.061.061,0,0,1,.011-.057.064.064,0,0,1,.053-.025h1.777a.064.064,0,0,1,.063.051l.969,4.34,0,.013a.058.058,0,0,1,0,.019A.063.063,0,0,1,70.03,144.853Zm3.731-4.41-.789,4.359a.066.066,0,0,1-.063.051h-1.1a.064.064,0,0,1-.063-.051l-.789-4.357a.064.064,0,0,1,.013-.055.07.07,0,0,1,.051-.025H73.7a.06.06,0,0,1,.051.025A.064.064,0,0,1,73.76,140.443Zm3.737,0L76.26,144.8a.068.068,0,0,1-.063.049H74.684a.063.063,0,0,1-.051-.025.064.064,0,0,1-.013-.055l.973-4.357a.066.066,0,0,1,.063-.051h1.777a.071.071,0,0,1,.053.025A.076.076,0,0,1,77.5,140.448Z"
                                  transform="translate(-62.393 -135.3)" fill="currentColor" />
                          </svg>
                      </span>
                      <span class="offcanvas__stikcy--toolbar__label">Cart</span>
                      <span class="items__count">3</span>
                  </a>
              </li>
              <li class="offcanvas__stikcy--toolbar__list">
                  <a class="offcanvas__stikcy--toolbar__btn" href="login.html">
                      <span class="offcanvas__stikcy--toolbar__icon" style="line-height: 34px">
                          <i class="fi fi-rr-user"></i>
                      </span>
                      <span class="offcanvas__stikcy--toolbar__label">My Account</span>
                  </a>
              </li>
          </ul>
      </div>
      <!-- End Offcanvas stikcy toolbar -->








      <!-- Start offCanvas minicart -->
      <div class="offCanvas__minicart">
          <div class="minicart__header">
              <div class="minicart__header--top d-flex justify-content-between align-items-center">
                  <h2 class="minicart__title h3">Shopping Cart</h2>
                  <button class="minicart__close--btn" aria-label="minicart close button" data-offcanvas>
                      <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368" />
                      </svg>
                  </button>
              </div>
              <p class="minicart__header--desc">
                  Clothing and fashion products are limited
              </p>
          </div>



          <div class="minicart__product">
              <!-- Cart products will be dynamically added here -->
          </div>

          <div class="minicart__amount">
              <div class="minicart__amount_list d-flex justify-content-between">
                  <span>Sub Total:</span>
                  <span><b>0 BDT</b></span>
              </div>
              <div class="minicart__amount_list d-flex justify-content-between">
                  <span>Total:</span>
                  <span><b>0 BDT</b></span>
              </div>
          </div>


          <div class="minicart__button d-flex justify-content-center">
              <a class="primary__btn minicart__button--link" href="{{ route('checkout') }}">Go to checkout</a>
          </div>
      </div>
      <!-- End offCanvas minicart -->


























      <!-- Start serch box area -->
      <div class="predictive__search--box">
          <div class="predictive__search--box__inner">
              <h2 class="predictive__search--title">Search Products</h2>
              <form class="predictive__search--form" action="#">
                  <label>
                      <input class="predictive__search--input" placeholder="Search Here" type="text" />
                  </label>
                  <button class="predictive__search--button" aria-label="search button" type="submit">
                      <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="30.51"
                          height="25.443" viewBox="0 0 512 512">
                          <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                              fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                              stroke-width="32" d="M338.29 338.29L448 448" />
                      </svg>
                  </button>
              </form>
          </div>
          <button class="predictive__search--close__btn" aria-label="search close button" data-offcanvas>
              <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51"
                  height="30.443" viewBox="0 0 512 512">
                  <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="32" d="M368 368L144 144M368 144L144 368" />
              </svg>
          </button>
      </div>
      <!-- End serch box area -->
  </header>
  <!-- End header area -->
