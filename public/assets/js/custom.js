$(document).ready(function(){

    $('.animate-toggle').on('click', function(){
        $('.animate-icon').toggleClass('open');
    });

    $(window).scroll(function(){

        if($(window).scrollTop() > 250){
            // $('.navbar').css("background-color","#1d0769");
            // $('#header').css("margin-top","0");
            $('.back-to-top').fadeIn('slow');
        }
        else{
            // $('.navbar').css("background-color", "transparent");
            // $('#header').css("margin-top","15px");
            $('.back-to-top').fadeOut();
        }
    });

    $('a').on("click", function(){
        if(this.hash !== "")
        {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            },2000,function(){
                window.location.hash = hash
            }
            );
        }
    });

    $('.navbar-toggler').on("click", function(){
        $('.navbar-collapse.collapse.show').fadeOut('2000');
    });

    $('.back-to-top').on('click',function(){
        $('html, body').animate(
            {scrollTop:0},2000, function(){window.location.top}
        );
    });

    $('nav-menu a').on("click", function(){
        if($(this).parents(".nav-menu").length){
            $(".nav-menu .active").removeClass("active");
            $(this).closest('li').addClass('active');
        }
    });

    $('.dropdown').hover(function(){
            $(this).find('.fas').removeClass('fa-caret-down');
            $(this).find('.fas').addClass('fa-caret-up');
            $(this).addClass('show');
            $(this).find('.dropdown-menu').addClass('show');
            $('.dropdown-menu').slideDown();
        }, function(){
            $(this).find('.fas').removeClass('fa-caret-up');
            $(this).find('.fas').addClass('fa-caret-down');
            $(this).removeClass('show');
            $(this).find('.dropdown-menu').removeClass('show');
            $('.dropdown-menu').slideUp();
        }
    );

    // $('.dropdown').on('click', function(){
    //     $(this).find('.dropdown-menu').toggleClass('show');
    // });

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        responsive:{
            0:{
                items: 1
            },

            600:{
                items: 1
            },

            1000: {
                items: 1
            }
        }
    });
});