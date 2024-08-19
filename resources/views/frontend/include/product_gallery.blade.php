   <div class="product__details--media">

       <div class="product__media--preview swiper">
           <div class="swiper-wrapper">



               <!-- Single Slider -->
               @foreach($productMultipleImages as $image)
               <div class="swiper-slide">
                   <div class="product__media--preview__items zoom zoomSingleImage">
                       <img class="product__media--preview__items--img" src="{{env('ADMIN_URL')."/productImages/".$image->image}}" alt="product-media-img" />
                   </div>
               </div>
               @endforeach
               <!-- Single Slider -->



           </div>
       </div>


       <!-- Slider Thumbs -->
       <div class="product__media--nav swiper">
           <div class="swiper-wrapper">

               @foreach($productMultipleImages as $image)

               <div class="swiper-slide">
                   <div class="product__media--nav__items">
                       <img class="product__media--nav__items--img" src="{{env('ADMIN_URL')."/productImages/".$image->image}}" alt="product-nav-img" />
                   </div>
               </div>
               @endforeach


           </div>
           <div class="swiper__nav--btn swiper-button-next"></div>
           <div class="swiper__nav--btn swiper-button-prev"></div>
       </div>


   </div>