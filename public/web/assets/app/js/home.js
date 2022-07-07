const slideHero = document.querySelector("#slideHero");
const slideTestimoni = document.querySelector("#slideTestimoni");

var carousel = new bootstrap.Carousel(slideHero, {
    interval: 20000,
    ride: true,
});

if (slideTestimoni) {
    var carousel2 = new bootstrap.Carousel(slideTestimoni, {
        interval: false,
        ride: true,
    });
}
// mengubah bg dari navbar menjadi hijau ketika sudah sticky
const navbar = document.querySelector(".navbar");

function setBgUis(navbar) {
    const rect = navbar.getBoundingClientRect();
    if (rect.top === 0) {
        navbar.classList.add("bg-uis");
    } else if (rect.top > 0) {
        navbar.classList.remove("bg-uis");
    }
}

setBgUis(navbar);

window.onscroll = function () {
    setBgUis(navbar);
};
