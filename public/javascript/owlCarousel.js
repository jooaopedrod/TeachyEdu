$(document).ready(function () {

    var carousel = $('.owl-carousel').owlCarousel({
        // autoplay : true,
        loop   : true,
        margin : 0,
        nav    : true,
        dots   : false,
        center : true,
        
        responsive: {

            0:{
                items:1
            },

            600:{
                items:5
            },

            1000:{
                items:5
            }
        }
    });

    checkClasses();

    carousel.on("translated.owl.carousel", function (event) {
        checkClasses();
    });

    function checkClasses() {
        
        var total = $(".single-testimonial-area .owl-stage .owl-item.active").length; // nested class from activator class

        console.log("total: " + total);

        $(".single-testimonial-area .owl-stage .owl-item").removeClass("firstActiveItem"); 
        // nested class from activator class and remove first and last class if already added.

        $(".single-testimonial-area .owl-stage .owl-item").removeClass("lastActiveItem"); 
        // nested class from activator class and remove first and last class if already added.

        $(".single-testimonial-area .owl-stage .owl-item.active").each(function (index) {
            // nested class from activator class
            if (index === 0) {
                // this is the first one

                $(this).addClass("firstActiveItem"); // add class in first item
            }
            if (index === total - 1 && total > 1) {
                // this is the last one
                $(this).addClass("lastActiveItem"); // add class in last item
            }
        });
    };

});
