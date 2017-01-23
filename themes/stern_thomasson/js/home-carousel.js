function carousel() {
    var firstSlide = jQuery('.home-carousel ul li:first');
    var lastSlide = jQuery('.home-carousel ul li:last');
    var firstNav = jQuery('ol.carousel-nav li:first');
    var lastNav = jQuery('ol.carousel-nav li:last');

    function cycleSlides() {
        var nextSlide, selectedSlide = jQuery('.home-carousel ul li.active');
        next = selectedSlide.next('li').length ? selectedSlide.next('li') : firstSlide;
        selectedSlide.removeClass('active');
        next.addClass('active');
    }

    function cycleNav() {
        var nextNav, selectedNav = jQuery('ol.carousel-nav li.active');
        next = selectedNav.next('li').length ? selectedNav.next('li') : firstNav;
        selectedNav.removeClass('active');
        next.addClass('active');
    }

    var timerSlides = setInterval(cycleSlides, 8000);
    var timerNav = setInterval(cycleNav, 8000);

    function nextImage() {
        var nextSlide, selectedSlide = jQuery('.home-carousel ul li.active');
        var nextNav, selectedNav = jQuery('ol.carousel-nav li.active');
        nextSlide = selectedSlide.next('li').length ? selectedSlide.next('li') : firstSlide;
        nextNav = selectedNav.next('li').length ? selectedNav.next('li') : firstNav;
        selectedSlide.removeClass('active');
        nextSlide.addClass('active');
        selectedNav.removeClass('active');
        nextNav.addClass('active');
        clearInterval(timerSlides);
        clearInterval(timerNav);
        timerSlides = setInterval(cycleSlides, 8000);
        timerNav = setInterval(cycleNav, 8000);
        return false;
    }

    function prevImage() {
        var prevSlide, selectedSlide = jQuery('.home-carousel ul li.active');
        var prevNav, selectedNav = jQuery('ol.carousel-nav li.active');
        prevSlide= selectedSlide.prev('li').length ? selectedSlide.prev('li') : lastSlide;
        prevNav= selectedNav.prev('li').length ? selectedNav.prev('li') : lastNav;
        selectedSlide.removeClass('active');
        prevSlide.addClass('active');
        selectedNav.removeClass('active');
        prevNav.addClass('active');
        clearInterval(timerSlides);
        clearInterval(timerNav);
        timerSlides = setInterval(cycleSlides, 8000);
        timerNav = setInterval(cycleNav, 8000);
        return false;
    }

    jQuery('ol.carousel-nav li a').click(function() {
        var position = jQuery( 'ol.carousel-nav li a' ).index(this);
        jQuery( '.home-carousel ul li' ).removeClass('active');
        jQuery( '.home-carousel ul li' ).eq(position).addClass('active');
        jQuery('ol.carousel-nav li').removeClass('active');
        jQuery(this).parent().addClass('active');
        clearInterval(timerSlides);
        clearInterval(timerNav);
        timerSlides = setInterval(cycleSlides, 8000);
        timerNav = setInterval(cycleNav, 8000);
        return false;
    });
}

jQuery(window).load(function() {
    jQuery('.home-carousel ul li').first().addClass('active');
    jQuery('ol.carousel-nav').addClass('active');
    jQuery('ol.carousel-nav li').first().addClass('active');
    carousel();
})