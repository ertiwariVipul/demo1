// button bubble effect
$('.button--bubble').each(function() {
    var $circlesTopLeft = $(this).parent().find('.circle.top-left');
    var $circlesBottomRight = $(this).parent().find('.circle.bottom-right');

    var tl = new TimelineLite();
    var tl2 = new TimelineLite();

    var btTl = new TimelineLite({ paused: true });

    tl.to($circlesTopLeft, 1.2, { x: -25, y: -25, scaleY: 2, ease: SlowMo.ease.config(0.1, 0.7, false) });
    tl.to($circlesTopLeft.eq(0), 0.1, { scale: 0.2, x: '+=6', y: '-=2' });
    tl.to($circlesTopLeft.eq(1), 0.1, { scaleX: 1, scaleY: 0.8, x: '-=10', y: '-=7' }, '-=0.1');
    tl.to($circlesTopLeft.eq(2), 0.1, { scale: 0.2, x: '-=15', y: '+=6' }, '-=0.1');
    tl.to($circlesTopLeft.eq(0), 1, { scale: 0, x: '-=5', y: '-=15', opacity: 0 });
    tl.to($circlesTopLeft.eq(1), 1, { scaleX: 0.4, scaleY: 0.4, x: '-=10', y: '-=10', opacity: 0 }, '-=1');
    tl.to($circlesTopLeft.eq(2), 1, { scale: 0, x: '-=15', y: '+=5', opacity: 0 }, '-=1');

    var tlBt1 = new TimelineLite();
    var tlBt2 = new TimelineLite();

    tlBt1.set($circlesTopLeft, { x: 0, y: 0, rotation: -45 });
    tlBt1.add(tl);

    tl2.set($circlesBottomRight, { x: 0, y: 0 });
    tl2.to($circlesBottomRight, 1.1, { x: 30, y: 30, ease: SlowMo.ease.config(0.1, 0.7, false) });
    tl2.to($circlesBottomRight.eq(0), 0.1, { scale: 0.2, x: '-=6', y: '+=3' });
    tl2.to($circlesBottomRight.eq(1), 0.1, { scale: 0.8, x: '+=7', y: '+=3' }, '-=0.1');
    tl2.to($circlesBottomRight.eq(2), 0.1, { scale: 0.2, x: '+=15', y: '-=6' }, '-=0.2');
    tl2.to($circlesBottomRight.eq(0), 1, { scale: 0, x: '+=5', y: '+=15', opacity: 0 });
    tl2.to($circlesBottomRight.eq(1), 1, { scale: 0.4, x: '+=7', y: '+=7', opacity: 0 }, '-=1');
    tl2.to($circlesBottomRight.eq(2), 1, { scale: 0, x: '+=15', y: '-=5', opacity: 0 }, '-=1');

    tlBt2.set($circlesBottomRight, { x: 0, y: 0, rotation: 45 });
    tlBt2.add(tl2);

    btTl.add(tlBt1);
    btTl.to($(this).parent().find('.button.effect-button'), 0.8, { scaleY: 1.1 }, 0.1);
    btTl.add(tlBt2, 0.2);
    btTl.to($(this).parent().find('.button.effect-button'), 1.8, { scale: 1, ease: Elastic.easeOut.config(1.2, 0.4) }, 1.2);

    btTl.timeScale(2.6);

    $(this).on('mouseover', function() {
        btTl.restart();
    });
});


// _BEGIN > Function For Navigation Menu < AVN //
$(".toggle-btn").click(function() {
    $("html").toggleClass("show-menu");
});
// _ENDS > Function For Navigation Menu < AVN //

var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    pagination: {
        el: ".swiper-pagination"
    },
    mousewheel: true,
    keyboard: true,
    // slidesPerView: 4.5,
    // spaceBetween: 15,
    scrollbar: {
        el: ".swiper-scrollbar"
    },
    breakpoints: {
        0: {
            slidesPerView: 2.2
        },
        576: {
            slidesPerView: 3
        },
        768: {
            slidesPerView: 3.5,
            spaceBetween: 10
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 15
        },
        1200: {
            slidesPerView: 4.5,
            spaceBetween: 15
        }
    }
});

$(function() {
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 50) {
            $("header").addClass("bg");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $("header").removeClass("bg");
        }
    });
});

// for selectpicker
$(".my-select").selectpicker();

// for rangeicker
// $(".js-range-slider").ionRangeSlider({
//   type: "double"
// });

const popoverTriggerList = document.querySelectorAll(
    '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
    popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl)
);

const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
    tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)
);

// $(function() {
//   // SmartWizard initialize
//   $("#smartwizard").smartWizard({
//     theme: "dots",
//     lang: {
//       // Language variables for button
//       next: "Go to body details",
//       previous: "Go back"
//     },
//     toolbar: {
//       showNextButton: false,
//       showPreviousButton: false
//     }
//   });
// });

// $(".smartWizardNext").click(function(e) {
//   e.preventDefault();
//   $("#smartwizard").smartWizard("next");
// });

// $("#smartwizardPrev").click(function(e) {
//   e.preventDefault();
//   $("#smartwizard").smartWizard("prev");
// });

// function completeSteps() {
//   let successPage = document.getElementById("successPage");
//   let Wizard = document.getElementById("smartwizard");
//   let title = document.getElementById("ModelTitle");

//   Wizard.style.display = "none";
//   title.style.display = "none";
//   successPage.style.display = "block";
// }