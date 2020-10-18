
$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
});


$('.clients-slider').owlCarousel({
    autoplay: true,
    margin:0,
    center: true,
    loop: true,
    nav: true,
    dots:false,
    navText : ["<i class='fa fa-chevron-left fa-3x'></i>","<i class='fa fa-chevron-right fa-3x'></i>"],
    responsive:{
        0:{
            items:3
        },
        600:{
            items:3
        },
        1000:{
            items:7
        }
    }
});

$('.products-slider').owlCarousel({
    autoplay: true,
    margin:0,
    center: true,
    loop: true,
    nav: true,
    dots:false,
    navText : ["<i class='fa fa-chevron-left fa-3x'></i>","<i class='fa fa-chevron-right fa-3x'></i>"],
    responsive:{
        0:{
            items:3
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});


//initiate the plugin and pass the id of the div containing gallery images
$("#zoom_03").elevateZoom({gallery: 'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'});

//pass the images to Fancybox
$("#zoom_03").bind("click", function(e) {
    var ez =   $('#zoom_03').data('elevateZoom');
    $.fancybox(ez.getGalleryList());
    return false;
});

function dropdown() {
    'use strict';
    document.getElementById('dropdownjs').classList.add('open');
}

function dropdownx() {
    'use strict';
    document.getElementById('dropdownjs').classList.remove('open');
}


function dropdown2() {
    'use strict';
    document.getElementById('dropdownjs2').classList.add('open');
}

function dropdownx2() {
    'use strict';
    document.getElementById('dropdownjs2').classList.remove('open');
}

