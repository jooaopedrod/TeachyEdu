$(document).ready(function () {
    $(".menu-toggle").on("click", function () {
        $(".nav").toggleClass("showing");
        $(".nav ul").toggleClass("showing");
    });



    $(".post-wrapper").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: $(".next"),
        prevArrow: $(".prev"),
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});


// Hide all elements with class="containerTab", except for the one that matches the clickable grid column
function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}

// navbar

window.innerWidth < 768 && [].slice.call(document.querySelectorAll("[data-bss-disabled-mobile]")).forEach((function (e) {
    e.classList.remove("animated"), e.removeAttribute("data-bss-hover-animate"), e.removeAttribute("data-aos")
})), document.addEventListener("DOMContentLoaded", (function () {
    AOS.init()
}), !1), function () {
    "use strict";
    var e = document.querySelector("#mainNav");
    if (e) {
        var t = e.querySelector(".navbar-collapse");
        if (t) {
            var n = new bootstrap.Collapse(t, {toggle: !1}), a = t.querySelectorAll("a");
            for (var o of a) o.addEventListener("click", (function (e) {
                n.hide()
            }))
        }
        var r = function () {
            (void 0 !== window.pageYOffset ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop) > 100 ? e.classList.add("navbar-shrink") : e.classList.remove("navbar-shrink")
        };
        r(), document.addEventListener("scroll", r)
    }
    document.getElementsByClassName("popup-gallery").length > 0 && baguetteBox.run(".popup-gallery", {animation: "slideIn"})
}();
