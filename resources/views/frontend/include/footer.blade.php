 @php

     $categories = DB::table('categories')->where('status', 1)->orderBy('serial', 'asc')->take(7)->get();

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

 <!-- Start footer section -->
 <footer class="footer__section bg__black">
     <div class="container">
         <div class="main__footer d-flex justify-content-between">



             <!-- Footer Widget - About Us -->
             <div class="footer__widget footer__widget--width">
                 <h2 class="footer__widget--title text-ofwhite h3">
                   
                     {{lan_key('about_us')}}
                     <button class="footer__widget--button" aria-label="footer widget button">
                         <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                             width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                             <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                 transform="translate(-6 -8.59)" fill="currentColor"></path>
                         </svg>
                     </button>
                 </h2>
                 <div class="footer__widget--inner">
                     <p class="footer__widget--desc text-ofwhite mb-20">
                         {{ $generalinfos->short_description }}
                     </p>
                     <div class="footer-address">
                         <h3>   {{lan_key('office_address')}}:</h3>
                         <p>{{ $generalinfos->address }}</p>
                     </div>
                     <div class="footer-address">
                         <h3>  {{lan_key('others_info')}} </h3>
                         @if ($generalinfos->tin_no)
                             <p>TIN: <span>{{ $generalinfos->tin_no }}</span></p>
                         @endif
                         @if ($generalinfos->trade_license_no)
                             <p>Trade licence: <span>{{ $generalinfos->trade_license_no }}</span></p>
                         @endif
                     </div>
                 </div>
             </div>
             <!-- End Footer Widget - About Us -->




             <div class="footer__widget--menu__wrapper d-flex footer__widget--width">
                 <div class="footer__widget">
                     <h2 class="footer__widget--title text-ofwhite h3">
                        {{lan_key('our_company')}}
                     
                         <button class="footer__widget--button" aria-label="footer widget button">
                             <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                 width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                 <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                     transform="translate(-6 -8.59)" fill="currentColor"></path>
                             </svg>
                         </button>
                     </h2>
                     <ul class="footer__widget--menu footer__widget--inner">
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="{{ route('frontend.about') }}"> {{lan_key('about_us')}}</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="{{ route('frontend.contact') }}">{{lan_key('contact')}}</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="{{ route('frontend.faq') }}">{{lan_key('faq')}}</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="{{ route('frontend.terms.condition') }}"> {{lan_key('terms_and_condition')}}</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="{{ route('frontend.refund.policy') }}"> {{lan_key('return_and_refund_policy')}}</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="{{ route('frontend.privacy.policy') }}">{{lan_key('privacy_policy')}}</a>
                         </li>
                     </ul>
                 </div>




                 <!-- <div class="footer__widget">
                     <h2 class="footer__widget--title text-ofwhite h3">
                         Categories
                         <button class="footer__widget--button" aria-label="footer widget button">
                             <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                 <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                             </svg>
                         </button>
                     </h2>
                     <ul class="footer__widget--menu footer__widget--inner">
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="shop.html">OTC Medicines</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="shop.html">Prescription Medicines</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="shop.html">Kid's Products</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="shop.html">Men's Products</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="shop.html">Women's Products</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="shop.html">Device and equipment</a>
                         </li>
                         <li class="footer__widget--menu__list">
                             <a class="footer__widget--menu__text" href="shop.html">Healthcare products</a>
                         </li>
                     </ul>
                 </div> -->
                 <div class="footer__widget">
                     <h2 class="footer__widget--title text-ofwhite h3">
                        {{lan_key('categories')}}
                
                         <button class="footer__widget--button" aria-label="footer widget button">
                             <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                 width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                 <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                     transform="translate(-6 -8.59)" fill="currentColor"></path>
                             </svg>
                         </button>
                     </h2>
                     <ul class="footer__widget--menu footer__widget--inner">
                         @foreach ($categories as $category)
                             <li class="footer__widget--menu__list">
                                 <a class="footer__widget--menu__text"
                                     href="{{ url('shop/category/' . $category->slug) }}">
                                     
                                 

                                     @if (!$lan)
                                     <!-- If $lan is not set or is falsy -->
                                     {{ $category->name }}
                                 @elseif ($lan['language_id'] == 1)
                                     <!-- If $lan['language_id'] is 1 -->
                                     {{ $category->name }}
                                 @elseif ($lan['language_id'] == 2)
                                     <!-- If $lan['language_id'] is 2 -->
                                     {{ $category->name_bn}}
                                 @endif
                                    
                                    </a>
                             </li>
                         @endforeach
                     </ul>
                 </div>


             </div>

             <!-- Footer Widget - Contact -->
             <div class="footer__widget footer__widget--width">
                 <h2 class="footer__widget--title text-ofwhite h3">
                    {{lan_key('contact')}}
                     <button class="footer__widget--button" aria-label="footer widget button">
                         <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                             width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                             <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                 transform="translate(-6 -8.59)" fill="currentColor"></path>
                         </svg>
                     </button>
                 </h2>
                 <div class="footer__contact footer__widget--inner">
                     <div class="footer__contact--list">
                         <p>  {{lan_key('offline_contact')}}</p>
                         <ul>
                             <li><a href="tel:+{{ $generalinfos->contact }}">+{{ $generalinfos->contact }}</a></li>
                         </ul>
                     </div>
                     <div class="footer__contact--list">
                         <p>    {{lan_key('email')}}:</p>
                         <ul>
                             @foreach (explode(',', $generalinfos->email) as $email)
                                 <li><a href="mailto:{{ $email }}">{{ $email }}</a></li>
                             @endforeach
                         </ul>
                     </div>
                     <div class="footer__social">
                         <h3 class="social__title text-ofwhite h4 mb-15"> {{lan_key('live_chat')}}:</h3>
                         <ul class="social__shear">
                             <li class="social__shear--list">
                                 <a class="social__shear--list__icon" target="_blank"
                                     href="{{ $generalinfos->whatsapp }}">
                                     <i class="icofont-whatsapp"></i>
                                     {{lan_key('chat_with_whatsApp')}}
                                  
                                 </a>
                             </li>
                             <li class="social__shear--list">
                                 <a class="social__shear--list__icon" target="_blank"
                                     href="{{ $generalinfos->messenger }}">
                                     <i class="icofont-facebook-messenger"></i>
                                     {{lan_key('chat_with_messenger')}}
                                 
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- End Footer Widget - Contact -->

             <div class="footer__widget footer__widget--width">
                 <h2 class="footer__widget--title text-ofwhite h3">
                    {{lan_key('newsletter')}}
                   
                     <button class="footer__widget--button" aria-label="footer widget button">
                         <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                             width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                             <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                 transform="translate(-6 -8.59)" fill="currentColor"></path>
                         </svg>
                     </button>
                 </h2>
                 <div class="footer__widget--inner">
                     <p class="footer__widget--desc text-ofwhite m-0">
                         Fill their seed open meat. Sea you <br />
                         great Saw image stl
                     </p>

                     <!-- <div class="newsletter__subscribe">
                         <form class="newsletter__subscribe--form" action="#">
                             <label>
                                 <input class="newsletter__subscribe--input" placeholder="Email Address" type="email" />
                             </label>
                             <button class="newsletter__subscribe--button" type="submit">
                                 Subscribe
                             </button>
                         </form>
                     </div> -->
                     <div class="newsletter__subscribe">
                         <form class="newsletter__subscribe--form" action="{{ url('subscribe/for/newsletter') }}"
                             method="POST">
                             @csrf

                             <label>
                                 <input class="newsletter__subscribe--input" name="email"
                                     placeholder="Email Address" type="email" required />
                             </label>
                             <button class="newsletter__subscribe--button" type="submit">    {{lan_key('subscribe')}}</button>
                         </form>
                     </div>


                 </div>
             </div>
         </div>
         <div class="footer__bottom">
             <div class="row align-items-center">
                 <div class="col-lg-6 col-12">
                     <p class="copyright__content text-ofwhite m-0">
                        {{lan_key('copyright')}}
                      
                         <a class="copyright__content--link" href="index.html">Etek</a>
                     </p>
                 </div>
                 <div class="col-lg-6 col-12">
                     <div class="footer__payment text-right">
                         <img class="display-block" src="{{ asset('assets/img/other/payment-visa-card.png') }}"
                             alt="visa-card" />
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- End footer section -->
