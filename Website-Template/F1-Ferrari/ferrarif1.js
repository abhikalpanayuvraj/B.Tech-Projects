/* ==========================================================
                LOADING SCREEN
========================================================== */

// Wait until the whole website is loaded
window.onload = function () {

    const loader = document.getElementById("loader");

    if (loader) {

        setTimeout(function () {

            loader.classList.add("hide");

        }, 1500);

    }

};



/* ==========================================================
                STICKY NAVBAR
========================================================== */

const header = document.querySelector(".Header");

window.addEventListener("scroll", function () {

    // If page is scrolled more than 50px
    if (window.scrollY > 50) {

        // Add black background
        header.classList.add("active");

    }

    else {

        // Remove background
        header.classList.remove("active");

    }

});



/* ==========================================================
                FADE ANIMATION
========================================================== */

// Select every section with class="fade"
const fadeElements = document.querySelectorAll(".fade");

if (fadeElements.length > 0) {

const observer = new IntersectionObserver(

    function(entries){

        entries.forEach(function(entry){

            if(entry.isIntersecting){

                entry.target.classList.add("show");

            }

        });

    },

    {
        threshold:0.2
    }

);

fadeElements.forEach(function(item){

    observer.observe(item);

});
}



/* ==========================================================
                AUTO IMAGE SLIDER
========================================================== */

const slider = document.querySelector(".slider");

if (slider) {

    let currentSlide = 0;

    const totalSlides = slider.children.length;

    setInterval(function () {

        currentSlide++;

        if (currentSlide >= totalSlides) {

            currentSlide = 0;

        }

        slider.scrollTo({

            left: slider.clientWidth * currentSlide,

            behavior: "smooth"

        });

    }, 4000);

}

setInterval(function(){

    currentSlide++;

    if(currentSlide >= totalSlides){

        currentSlide = 0;

    }

    slider.scrollTo({

        left: slider.clientWidth * currentSlide,

        behavior:"smooth"

    });

},4000);



/* ==========================================================
            FERRARI STYLE SMOOTH SCROLL
========================================================== */

// Create smooth scrolling
if (typeof Lenis !== "undefined") {

    const lenis = new Lenis({

        duration: 1.3,

        smoothWheel: true,

        wheelMultiplier: 0.9

    });

    function raf(time) {

        lenis.raf(time);

        requestAnimationFrame(raf);

    }

    requestAnimationFrame(raf);

}

// Keep animation running
function raf(time){

    lenis.raf(time);

    requestAnimationFrame(raf);

}

requestAnimationFrame(raf);