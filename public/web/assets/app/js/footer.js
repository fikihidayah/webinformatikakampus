const toTopBtn = document.querySelector(".to-top-btn");
const slide = document.querySelector("#slideHero");

var scroll = new SmoothScroll('a[href*="#"]', {
    easing: "easeInOutCubic",
    updateURL: false,
});
window.addEventListener("scroll", function () {
    setShowToTopBtn();
});

function setShowToTopBtn() {
    let rect;
    if (slide) {
        rect = slide.getBoundingClientRect().bottom;
    } else {
        rect = document.querySelector("section").getBoundingClientRect().top;
    }

    if (rect < 0) {
        toTopBtn.classList.add("show");
    } else {
        toTopBtn.classList.remove("show");
    }
}

if (typeof AOS !== "undefined") {
    AOS.init({
        duration: 1000,
        once: true,
    });
}

if (typeof LazyLoad !== "undefined") {
    var ll = new LazyLoad({
        callback_loaded: function (el) {
            // console.log('loaded!');
            const parent = el.parentElement;
            const loader = parent.querySelector(".loader");
            if (loader) {
                loader.classList.add("hide");
            }
        },
    });

    var lliimg = new LazyLoad({
        elements_selector: ".figure-img",
        callback_loaded: function (el) {
            const parent = el.parentElement;
            const loader = parent.querySelector(".loader");
            loader.classList.add("hide");
        },
    });

    var llicarousel = new LazyLoad({
        elements_selector: ".img-slide",
        callback_loaded: function (el) {
            const parent = el.parentElement;
            const loader = parent.querySelector(".loader");
            loader.classList.add("hide");
        },
    });
}

document.addEventListener("DOMContentLoaded", function () {
    var showAfterLoad = setInterval(() => {
        if (document.readyState == "complete") {
            clearInterval(showAfterLoad);
            const loader = document.querySelector(".loader");
            const body = document.body;

            loader.classList.add("hide");

            setTimeout(() => {
                loader.remove();
                body.removeAttribute("class");
            }, 300);
        }
    }, 100);
});
