jQuery(document).ready(function($) {


  // Image.svg to svg code
  jQuery('.svg').each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function (data) {
      // Get the SVG tag, ignore the rest
      var $svg = jQuery(data).find('svg');

      // Add replaced image's ID to the new SVG
      if (typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID);
      }
      // Add replaced image's classes to the new SVG
      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' replaced-svg');
      }

      // Remove any invalid XML tags as per http://validator.w3.org
      $svg = $svg.removeAttr('xmlns:a');

      // Replace image with new SVG
      $img.replaceWith($svg);

    }, 'xml');
  });  

  var lineSwiper = new Swiper(".line-swiper", {
    loop: true,
    spaceBetween: 12,
    slidesPerView: 'auto',
    speed: 2000,
    allowTouchMove: false,
    centeredSlides: true,
    autoplay: {
      delay: 0,
      enabled: true,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    breakpoints: {
      991: {
        spaceBetween: 66,
      }
    }
  });

  var carsSwiper = new Swiper(".bottom-fixed-list .swiper", {
    spaceBetween: 0,
    slidesPerView: 1,
    speed: 600,
    effect: 'fade',
    allowTouchMove: false,
    autoplay: {
      delay: 3000,
      enabled: true,
      disableOnInteraction: false,
    },
  });

  var categorySwiper = new Swiper(".line-category", {
    spaceBetween: 6,
    slidesPerView: 'auto',
    navigation: {
      nextEl: '.line-category .swiper-button-next',
      prevEl: '.line-category .swiper-button-prev',
    },
  });

  /*
   ** Anchor scroll
   */
   $('a[href^="#"]').click(function(){

    var scroll_el = $(this).attr('href');
    if ($(scroll_el).length != 0) {
      $('html, body').animate({ scrollTop: $(scroll_el).offset().top - 72}, 900); 
    }
    return false;
  });

  $(".menu-btn").on('click', function () {
    $('#menuModal').arcticmodal();
  });

  $(".call-btn").on('click', function () {
    $title = $(this).data('text');
    $('#formModal').find('.h3').text($title);
    $('#formModal').find('input[name="target"]').val($title);
    $('#formModal').arcticmodal();
  });

  $(".wpcf7-tel").mask("+7 (999) 999-99-99");

  $('.scroll-up-icon').on('click', function(event){
    event.preventDefault();
    $('html, body').animate({ scrollTop: 0}, 900); 
  });


  $('.mode-toggle').on('click', function () {
    $('body').toggleClass('dark');  
    if( $.cookie('dark') == 'true') {
      $.cookie('dark', 'false', { expires: 7, path: '/' });
    } else {
      $.cookie('dark', 'true', { expires: 7, path: '/' });
    }
  });

  // console.log($.cookie('dark'));

  $(".show-btn").on('click', function () {
    $('.content .hide').toggle('slow');
    $(this).text(($(".show-btn").text() == 'Показать еще') ? 'Скрыть' : 'Показать еще');
  });


  var autoSwiper = new Swiper(".auto-list.swiper", {
    loop: false,
    spaceBetween: 6,
    slidesPerView: 'auto',
  });
  
  var appealSwiper = new Swiper(".appeal-swiper", {
    slidesPerView: 2,
    slidesPerGroup: 2,
    grid: {
      rows: 2,
      fill: "row",
    },
    spaceBetween: 6,
    pagination: {
      el: ".appeal .swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      991: {
        spaceBetween: 60,
        slidesPerView: 3,
        grid: {
          rows: 4,
          fill: "row",
        },
      },
      1400: {
        spaceBetween: 60,
        slidesPerView: 4,
        grid: {
          rows: 3,
          fill: "row",
        },
      }
    }
  });

  var buySwiper = new Swiper(".buy-swiper", {
    slidesPerView: 1,
    spaceBetween: 6,
    navigation: {
      nextEl: '.buy .swiper-button-next',
      prevEl: '.buy .swiper-button-prev',
    },
    breakpoints: {
      991: {
        spaceBetween: 12,
        slidesPerView: 'auto',
      },
    }
  });

  var bestSwiper = new Swiper(".best-swiper", {
    slidesPerView: 'auto',
    spaceBetween: 6,
    navigation: {
      nextEl: '.best .swiper-button-next',
      prevEl: '.best .swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.best .swiper-scrollbar',
      draggable: true,
    },
    breakpoints: {
      991: {
        spaceBetween: 24,
      },
    }
  });

  var aboutSwiper = new Swiper(".about-swiper", {
    slidesPerView: 1,
    spaceBetween: 6,
    pagination: {
      el: ".about .swiper-pagination",
      clickable: true,
    },
  });

  var defendSwiper = new Swiper(".defend-swiper", {
    slidesPerView: 1,
    spaceBetween: 6,
    navigation: {
      nextEl: '.defend .swiper-button-next',
      prevEl: '.defend .swiper-button-prev',
    },
  });

  var stepsSwiper = new Swiper(".steps-swiper", {
    slidesPerView: 1,
    spaceBetween: 6,
    navigation: {
      nextEl: '.steps .swiper-button-next',
      prevEl: '.steps .swiper-button-prev',
    },
  });

  var tabsSwiper = new Swiper(".guarantee-tabs-item.active .tabs-swiper", {
    slidesPerView: 1,
    spaceBetween: 6,
    navigation: {
      nextEl: '.guarantee-tabs-item.active .swiper-button-next',
      prevEl: '.guarantee-tabs-item.active .swiper-button-prev',
    },
  });

  var reviewSwiper = new Swiper(".review-swiper", {
    slidesPerView: 1,
    spaceBetween: 6,
    loop: true,
    autoHeight: true,
    navigation: {
      nextEl: '.review .swiper-button-next',
      prevEl: '.review .swiper-button-prev',
    },
  
    scrollbar: {
      el: '.review .swiper-scrollbar',
      draggable: true,
    },
    breakpoints: {
      991: {
        slidesPerView: 2,
        loop: false,
        autoHeight: false,
      },
      1200: {
        slidesPerView: 3,
        loop: false,
		autoHeight: false,
      }
    }
  });

  $(window).resize(function(){
    reviewSwiper.update();
  })

  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
  }

  if($( "#slider-range" ).length) {
    $( "#slider-range" ).slider({
      range: "min",
      value: 2500000,
      step: 100000,
      min: 1000000,
      max: 50000000,
      slide: function( event, ui ) {
        $( ".range-input input" ).val( numberWithCommas(ui.value) );
      }
    });
    $( ".range-input input" ).val( numberWithCommas($( "#slider-range" ).slider( "value" )) );

    $( ".range-input input" ).on('change', function(){
      $val = parseInt($(this).val().replace(/\s/g,''));
      console.log($val); 
      $( "#slider-range" ).slider( "value", $val);
      $(this).val(numberWithCommas($val));

      if($val > 50000000) {
        $(this).val(numberWithCommas('50000000'));
      }

      if($val < 1000000) {
        $(this).val(numberWithCommas('1000000'));
      }
    });
  }

  //  Load more
  $show = $('.show').data('show');
  $count = $('.show').data('count');
  $('.show .show-item').slice(0, parseInt($show)).show();
  if ( $('.show .show-item').length > parseInt($show)) {
    $('.load-more').fadeIn('slow');
  }

  $(".load-more").on('click', function () {
    $(".show-item:hidden").slice(0, parseInt($count)).slideDown();
    if ($(".show-item:hidden").length == 0) {
      $(".load-more").fadeOut('slow');
    }
  });

  $('.form-check label').append('<div class="checkmark"><div class="checkmark-hand"></div></div>');

  
  var swiper = new Swiper(".thumb-swiper", {
    spaceBetween: 6,
    slidesPerView: 6,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".gallery-swiper", {
    spaceBetween: 10,
    effect: 'fade',
    navigation: {
      nextEl: ".gallery-swiper .swiper-button-next",
      prevEl: ".gallery-swiper .swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

  var serviceSwiper = new Swiper(".hero-service .swiper", {
    spaceBetween: 1,
    effect: 'fade',
    navigation: {
      nextEl: ".hero-service .swiper-button-next",
      prevEl: ".hero-service .swiper-button-prev",
    },
    pagination: {
      el: ".hero-service .swiper-pagination",
      type: "custom",
      renderCustom: function (serviceSwiper, current, total) {
        return ('0' + current).slice(-2) + '/' + ('0' + total).slice(-2);
      }
    },
  });

  $(document).on("click", ".faq-list-item", function (event) {
    if (!$(event.target).is(".primary-btn")) {
      $(this).siblings().removeClass("active").find('.faq-list-item-content').hide(500);
      $(this).toggleClass('active').find('.faq-list-item-content').toggle(500);
    }
  });

  var pricesSwiper = new Swiper(".prices-list", {
    slidesPerView: 'auto',
    slidesPerGroup: 1,
    spaceBetween: 6,
    pagination: {
      el: ".prices .swiper-pagination",
      clickable: true,
    },
  });

  $(document).on("click", ".guarantee-nav-item:not(.active)", function () {
    $(this)
        .addClass("active")
        .siblings()
        .removeClass("active")
        .closest(".guarantee")
        .find(".guarantee-tabs-item")
        .removeClass("active")
        .eq($(this).index())
        .addClass("active");

    var tabsSwiper = new Swiper(".guarantee-tabs-item.active .tabs-swiper", {
      slidesPerView: 1,
      spaceBetween: 6,
      navigation: {
        nextEl: '.guarantee-tabs-item.active .swiper-button-next',
        prevEl: '.guarantee-tabs-item.active .swiper-button-prev',
      },
    });
  });

  $( ".wpcf7-select option:first" ).attr('disabled', 'disabled');

  if( $( ".wpcf7-select" ).length){
    $( ".wpcf7-select" ).selectmenu();
    $( ".wpcf7-select" ).on( "selectmenuchange", function( event, ui ) {
      $(this).addClass('active');
    } );
  }

  $(document).on("click", ".modal-menu .menu-item-has-children", function () {
    $(this).toggleClass("active").find('.sub-menu').toggle('500');
  });
  
  $(document).on("click", ".bottom-fixed-img", function () {
    $('.call-form').addClass("active");
  });
  $(document).on("click", ".call-form .close", function () {
    $('.call-form').removeClass("active");
  });

  $('img').bind('contextmenu', function(e) {
      return false;
  });

  var cursor = $(".cursor");

    $(window).mousemove(function(e) {
      cursor.css({
        top: e.clientY - cursor.height() / 2,
        left: e.clientX - cursor.width() / 2
      });
    });


    $(".auto .swiper")
    .mouseleave(function() {
        cursor.css({
            opacity: "0"
        });
    })
    .mouseenter(function() {
        cursor.css({
            opacity: "1"
        });
    });

    $(".auto .auto-list-item-btns")
    .mouseleave(function() {
        cursor.css({
            opacity: "1"
        });
    })
    .mouseenter(function() {
        cursor.css({
            opacity: "0"
        });
    });


    $(document).on("click", ".bottom-fixed-list .close", function () {
      $('.bottom-fixed-list').addClass("disabled");
      $.cookie('fixed', 'true', { expires: 1, path: '/' });
    });

  var $temp = $("<input>");
  var $url = $(location).attr('href');
  
  $('.a2a_button_copy_link').on('click', function() {
    $("body").append($temp);
    $temp.val($url).select();
    document.execCommand("copy");
    $temp.remove();
  })

});
