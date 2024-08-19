(function ($) {
  "use strict";
  $(document).on("ready", function () {
    // Nice Select JS
    $(".nice-select").niceSelect();

    /*=============================================================================
      Video Popup JS
    ===============================================================================*/
    $(".popup-video").magnificPopup({
      type: "iframe",
    });

    /*==============================================================================
		  Hero Slider
	  ================================================================================*/
    $(".hero-slider-main").owlCarousel({
      items: 1,
      autoplay: true,
      loop: true,
      touchDrag: true,
      mouseDrag: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      animateOut: "fadeOut",
      animateIn: "fadeIn",
      smartSpeed: 500,
      merge: true,
      nav: false,
      dots: true,
      margin: 24,
    });

    /*==============================================================================
		  Brand Slider
	  ================================================================================*/
    $(".brand-slider").owlCarousel({
      items: 6,
      autoplay: true,
      loop: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: false,
      smartSpeed: 500,
      merge: true,
      dots: false,
      margin: 16,
      nav: false,
      responsive: {
        300: {
          items: 2,
          margin: 12,
        },
        480: {
          items: 2,
          margin: 12,
        },
        768: {
          items: 4,
        },
        1024: {
          items: 5,
        },
        1320: {
          items: 6,
        },
      },
    });

    /*==============================================================================
		  Service Slider
	  ================================================================================*/
    $(".service-card-slider").owlCarousel({
      items: 4,
      autoplay: false,
      loop: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: false,
      smartSpeed: 500,
      merge: true,
      dots: false,
      margin: 0,
      nav: true,
      navText: [
        '<i class="fi-rr-angle-left" aria-hidden="true"></i>',
        '<i class="fi-rr-angle-right" aria-hidden="true"></i>',
      ],
      responsive: {
        300: {
          items: 1,
          margin: 12,
        },
        480: {
          items: 1,
          margin: 12,
        },
        768: {
          items: 2,
        },
        1024: {
          items: 3,
        },
        1320: {
          items: 4,
        },
      },
    });
  });
})(jQuery);

/*==============================================================================
		Language Change Switch JS
================================================================================*/
document
  .getElementById("languageToggle")
  .addEventListener("change", function () {
    if (this.checked) {
      languageToggle("BN");
    } else {
      languageToggle("EN");
    }
  });

function languageToggle(language) {
  let element = document.body;

  if (language === "BN") {
    element.classList.add("language-change");
    document.getElementById("bn-language").classList.add("selected");
    document.getElementById("en-language").classList.remove("selected");
    localStorage.setItem("selectedLanguage", "BN");
  } else {
    element.classList.remove("language-change");
    document.getElementById("bn-language").classList.remove("selected");
    document.getElementById("en-language").classList.add("selected");
    localStorage.setItem("selectedLanguage", "EN");
  }
}

(function () {
  let selectedLanguage = localStorage.getItem("selectedLanguage") || "EN";
  let element = document.body;

  if (selectedLanguage === "BN") {
    element.classList.add("language-change");
    document.getElementById("bn-language").classList.add("selected");
    document.getElementById("en-language").classList.remove("selected");
    document.getElementById("languageToggle").checked = true;
  } else {
    element.classList.remove("language-change");
    document.getElementById("bn-language").classList.remove("selected");
    document.getElementById("en-language").classList.add("selected");
    document.getElementById("languageToggle").checked = false;
  }
})();
