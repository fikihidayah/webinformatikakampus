// membersihkan url, ketika toggle sidebar di click
$("#mobile-collapse, .mob-toggler, .expandable").on("click", function (e) {
    e.preventDefault();
});

$(".nav-link").on("click", function (e) {
    const clasm = $(this).parent().hasClass("pcoded-hasmenu");
    if (clasm) {
        e.preventDefault();
    }
});

// notification sweetalert
const sw = Swal.mixin({
    width: 420,
    padding: "40px 20px",
    customClass: {
        confirmButton: "btn btn-outline-primary px-4 mx-2",
        denyButton: "btn btn-outline-danger px-4 mx-2",
        cancelButton: "btn btn-outline-warning px-4 mx-2",
    },
    background: "rgba(255,255,255,220)",
    backdrop: `
      rgba(0,0,0,0.8)
    `,
    showClass: {
        popup: "animate__animated animate__bounceIn",
    },
    hideClass: {
        popup: "animate__animated animate__bounceOut",
    },
    buttonsStyling: false,
});

const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    customClass: {
        timerProgressBar: "bg-primary",
        closeButton: "btn btn-danger",
    },
    buttonsStyling: false,
    showCloseButton: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
    showClass: {
        popup: "animate__animated animate__bounceInRight",
    },
    hideClass: {
        popup: "animate__animated animate__bounceOutRight",
    },
});

if (success) {
    Toast.fire({
        icon: "success",
        title: success,
    });
}

if (error) {
    Toast.fire({
        icon: "error",
        title: error,
    });
}

$(".dud-logout, .logout").on("click", function (e) {
    e.preventDefault();
    var href = $(this).attr("href");
    sw.fire({
        icon: "warning",
        title: "Anda yakin ?",
        text: "Progres anda akan selesai!",
        showDenyButton: true,
        denyButtonText: "Tidak",
        confirmButtonText: "Ya",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = href;
        }
    });
});

$(".delete").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    sw.fire({
        icon: "question",
        title: "Anda yakin ?",
        text: "Data tidak bisa dikembalikan lagi!",
        showDenyButton: true,
        denyButtonText: "Tidak",
        confirmButtonText: "Ya",
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    });
});

$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

const show = document.querySelectorAll(".show-pwd");
const invalid = document.querySelectorAll(".form-control.is-invalid");

// membuat show hidden PW
show.forEach((sh) => {
    sh.addEventListener("click", function () {
        this.classList.toggle("show");

        if (this.classList.contains("show")) {
            this.previousElementSibling.setAttribute("type", "text");
            this.firstChild.setAttribute("class", "feather icon-eye");
        } else {
            this.previousElementSibling.setAttribute("type", "password");
            this.firstChild.setAttribute("class", "feather icon-eye-off");
        }
    });
});

if (invalid) {
    invalid.forEach((inv) => {
        const formParent = inv.parentElement;
        const pwd = formParent.querySelector(".show-pwd");

        if (inv.getAttribute("type") === "password") {
            inv.style.backgroundImage = "none";
        }
        if (pwd) {
            pwd.style.top = "34%";
        }
    });
}

function previewImg(element, elementPreview) {
    var file = $(element).get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function () {
            $(elementPreview).attr("src", reader.result);
        };

        reader.readAsDataURL(file);
    }
}

function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, ""); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "åàáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaaaeeeeiiiioooouuuunc------";

    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
    }

    str = str
        .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
        .replace(/\s+/g, "-") // collapse whitespace and replace by -
        .replace(/-+/g, "-") // collapse dashes
        .replace(/^-+/, "") // trim - from start of text
        .replace(/-+$/, ""); // trim - from end of text

    return str;
}
