$(document).ready(function () {
    $(".single-testimonial-area").owlCarousel({
        loop: true,
        items: 5,
        center: true,
        responsive: {
            0: {
                items: 1,
            },
            360: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
        autoplay: false,
        autoplayTimeout: 15000,
    });

    var carousel = $(".single-testimonial-area"); // Activator Class
    carousel.owlCarousel({
        loop: true,
        items: 3,
        margin: 0,
        nav: true,
        dots: false,
    });

    checkClasses();
    carousel.on("translated.owl.carousel", function (event) {
        checkClasses();
    });

    function checkClasses() {
        var total = $(".single-testimonial-area .owl-stage .owl-item.active").length; // nested class from activator class

        $(".single-testimonial-area .owl-stage .owl-item").removeClass("firstActiveItem lastActiveItem"); // nested class from activator class and remove first and last class if already added.

        $(".single-testimonial-area .owl-stage .owl-item.active").each(function (index) {
            // nested class from activator class
            if (index === 1) {
                // this is the first one
                $(this).addClass("firstActiveItem"); // add class in first item
            }
            if (index === total - 2 && total > 1) {
                // this is the last one
                $(this).addClass("lastActiveItem"); // add class in last item
            }
        });
    }
});
