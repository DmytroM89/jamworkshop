$(document).ready (function() {

    /* Nav Click */
	navClickInit();

	/* Logo Scroll */
	logoScrollInit();

	/* Form Submit */
	$(".submit").click(function() {
		formSubmit();
	});

	/* SCROLL TO TOP */
	scrollInit();

	/* Slider Background */
	if($('.slider-background').length > 0){
		sliderBackInit();
	}

	/* Input Effects */
    inputEffects ();

	//	SCROLL (show and hide navbar)
    scrollNav();

    /* Lightbox galleries */
    ligthboxGallery ();
    $('.image-link').magnificPopup({type:'image'});
    
    /* Functions call galleries */
    galleryParties ();

    galleryCorporate ();

    modalGalleryDecor ();

    /* Owl Carousel */
    $(".owl-carousel").owlCarousel({
        items:1,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        animateOut: 'fadeOut'
    });
    
    $(".owl-carousel-clients").owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
    
    $(".owl-carousel-baner").owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        autoHeight: true
    });
    
    
    /* Mask input phone */
    $(function(){
        $("#phone").mask("+38(999) 999-99-99", {placeholder: "xxx" });
    });
    
    /* Сохраняем данные в localStorage */
    $('input').blur(function() {
        localStorage.setItem($(this).attr('name'), $(this).val());
    });
   
    /* Заполняем форму данными с local storage */
    $('.modal_btn').on('click', function(){
        try{
            var name = localStorage.getItem('name');
            var phone = localStorage.getItem('phone');
            var email = localStorage.getItem('email');
        
            $("#form input[name=name]").val(name);
            $("#form input[name=phone]").val(phone);
            $("#form input[name=email]").val(email);
        } catch(e) {
            if(e == QUOTA_EXCEEDED_ERR) {
                alert('Превышен лимит LocalStorage');
            }
        }
        
    });
    
    /* Animation */
    $('.gallery').hover(function () {
        $(this).find('h2').addClass('animated fadeInDown');
        $(this).find('p').addClass('animated fadeInUp');
    },
    function () {
        $(this).find('h2').removeClass('animated fadeInDown');
        $(this).find('p').removeClass('animated fadeInUp');
    });
    
    $('.copyright').click(function() {
        if($('.sign-in').hasClass('show')) {
            $('.sign-in').removeClass('show');
        } else {
            $('.sign-in').addClass('show');
            setTimeout(function() { $('.sign-in').removeClass('show'); }, 2000);
        }
    });
   
    
});



/* Console.log */
function pr(val) {
	console.log(val);
}


function navClickInit() {
	$('.nav a').on('click', function(){
        if($('.navbar-toggle').css('display') !='none'){
            $(".navbar-toggle").trigger( "click" );
        }
    });
}

function logoScrollInit() {
	$("ul.nav a, #logo").click(function () {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top + "px"
        }, {
            duration: 500,
            easing: "swing"
        });
        return false;
    });
}

// Убираем поддчёркивание с инпутов при нажатии на кнопку "Задай вопрос"
//$('.modal_btn').click(function(){
//    $('input').blur();
//});

// Убираем глиф при клике на инпут
$('input').click(function(){
    $(this).siblings('.pencil').removeClass('glyphicon glyphicon-pencil');
});

// Убираем модалки
$('.alert_close').click(function(){
   $('#myModal').modal('hide');
});

function formSubmit() { //устанавливаем событие отправки для формы с id=form
    var name = $("#form input[name=name]").val();
    var phone = $("#form input[name=phone]").val();
    var email = $("#form input[name=email]").val();
    var message = $("#form textarea[name=message]").val();
    
    if(name != '' && phone != '' && email != '') {
        
        var myData = {name, phone, email, message, action: 'my_action'};
                    
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: myData,
            success: function (res) {
                //pr(res);
                if (res == 1) {
                    alert("Ваше сообщение отправлено!");
                    localStorage.clear() // чистим localStorage
                } else {
                    alert('Ошибка!<br>Попробуйте позже.');
                }
            }
        });
        $('#name').val('');
        $('#phone').val('');
        $('#email').val('');
        $('textarea').val('');
    } else {
        myAlert('Не заполнено обязательное поле!');
    }
    
        
}

/*------- Функция вызова модального окна Alert -----------------*/
function alert(val) {
	$('#alertModal .modal-body').html('<p>'+val+'</p>');
	$('#alertModal').modal({backdrop: false});
}

function myAlert (val) {
    $('.myalert').addClass('in');
    $('.pencil').addClass('glyphicon glyphicon-pencil');
    $('.myalert').html('<p>'+val+'</p>');
    function fadeOutAlert () {
        $('.myalert').removeClass('in');
    }
    setTimeout(fadeOutAlert, 2000);
}

function scrollInit() {
	//Check to see if the window is top if not then display button
    $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
              $('.scrollToTop').fadeIn();
            } else {
              $('.scrollToTop').fadeOut();
            }
    });

    //Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0}, 800);
		return false;
	});
}

function sliderBackInit() {
    var imgs = $.map($.find('.backImg'), function(el) {
        return $(el).attr('src');
    });
	$.backstretch(imgs, {duration: 6000, fade: 1000});
}

function inputEffects() {
    $(".col-3 input").val("");
        $(".input-effect input").focusout(function () {
            if ($(this).val() != "") {
                $(this).addClass("has-content");
            } else {
                $(this).removeClass("has-content");
            }
    });
}

function scrollNav () {
    $(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll >= 100 && scroll <= 500) {
			$(".navbar-inverse").addClass("navbar-scroll");
		}
        else if (scroll >= 500) {
            $(".navbar-inverse").addClass("navbar-scroll-compress");
		}
        else {
			$(".navbar-inverse").removeClass("navbar-scroll navbar-scroll-compress");
		}

	});
}

function ligthboxGallery () {
    $('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			}
		}
	});
}

function galleryParties () {
    $('.gallery-parties').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			}
		}
	});
}

function galleryCorporate () {
    $('.gallery-corporate').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			}
		}
	});
}

function modalGalleryDecor () {
    $('.decor').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			}
		}
	});
}

/* Preloader */
$(window).on('load', function () {
    var $preloader = $('#preloader')
        , $preloader_preload = $preloader.find('#preloader_preload');
    $preloader_preload.delay(1000).fadeOut('slow');
    $preloader.delay(1500).fadeOut('slow');
});



