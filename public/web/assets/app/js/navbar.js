// membuka search input
const search = document.querySelector(".input-open");
const formSearch = document.querySelector(".form-search");
const inputSearch = document.querySelector(".input-search");

search.addEventListener("click", function (e) {
    e.preventDefault();
    if (formSearch.classList.contains("active")) {
        formSearch.classList.remove("active");
        setTimeout(() => {
            formSearch.setAttribute("style", "");
        }, 300);
    } else {
        formSearch.style.display = "flex";
        setTimeout(() => {
            formSearch.classList.add("active");
            inputSearch.focus();
        }, 100);
    }
});

// prevent default semua yang punya submenu
const nestItemLink = document.querySelectorAll(".nest-item-link");
const navLink = document.querySelectorAll(".nav-link");

document.addEventListener("click", function (e) {
    // jika yang di click bukan search maka di tutup formnya
    if (!e.target.classList.contains("input-search")) {
        if (formSearch.classList.contains("active")) {
            formSearch.classList.remove("active");
            setTimeout(() => {
                formSearch.setAttribute("style", "");
            }, 300);
        }
    }

    if (e.target.classList.contains("nav-link")) {
        navLink.forEach((nest) => {
            if (nest.parentElement.classList.contains("mobile-click")) {
                nest.parentElement.classList.remove("mobile-click");
            }
        });
    } else {
        navLink.forEach((nest) => {
            if (nest.parentElement.classList.contains("mobile-click")) {
                nest.parentElement.classList.remove("mobile-click");
            }
        });
    }

    if (e.target.classList.contains("nest-item-link")) {
        nestItemLink.forEach((nest) => {
            if (nest.parentElement.classList.contains("mobile-click")) {
                nest.parentElement.classList.remove("mobile-click");
            }
        });
    } else {
        navLink.forEach((nest) => {
            if (nest.parentElement.classList.contains("mobile-click")) {
                nest.parentElement.classList.remove("mobile-click");
            }
        });
    }
});

nestItemLink.forEach((nest) => {
    nest.addEventListener("click", function (e) {
        if (this.parentElement.classList.contains("have-nest")) {
            e.preventDefault();
            // fungsi dibawah ini akan berlaku jika di hp
            if (window.innerWidth < 992) {
                if (!this.parentElement.classList.contains("mobile-click")) {
                    setTimeout(() => {
                        this.parentElement.classList.add("mobile-click");
                    }, 1);
                }
            }
        }
    });
});

navLink.forEach((nest) => {
    nest.addEventListener("click", function (e) {
        if (this.parentElement.classList.contains("have-nest")) {
            e.preventDefault();
            // fungsi dibawah ini akan berlaku jika di hp
            if (window.innerWidth < 992) {
                if (!this.parentElement.classList.contains("mobile-click")) {
                    setTimeout(() => {
                        this.parentElement.classList.add("mobile-click");
                    }, 1);
                }
            }
        }
    });
});
