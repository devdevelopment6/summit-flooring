$(function () {
    $(document).on("beforecreate.offcanvas", function (e) {
        var dataOffcanvas = $(e.target).data("offcanvas-component");
        console.log(dataOffcanvas);
        dataOffcanvas.onInit = function () {
            console.log(this);
        };
    });
    $(document).on("create.offcanvas", function (e) {
        var dataOffcanvas = $(e.target).data("offcanvas-component");
        console.log(dataOffcanvas);
        dataOffcanvas.onOpen = function () {
            console.log("Callback onOpen");
        };
        dataOffcanvas.onClose = function () {
            console.log("Callback onClose");
        };
    });
    $(document).on("clicked.offcanvas-trigger clicked.offcanvas", function (e) {
        var dataBtnText = $(e.target).text();
        console.log(e.type + "." + e.namespace + ": " + dataBtnText);
    });
    $(document).on("open.offcanvas", function (e) {
        var dataOffcanvasID = $(e.target).attr("id");
        console.log(e.type + ": #" + dataOffcanvasID);
    });
    $(document).on("resizing.offcanvas", function (e) {
        var dataOffcanvasID = $(e.target).attr("id");
        console.log(e.type + ": #" + dataOffcanvasID);
    });
    $(document).on("close.offcanvas", function (e) {
        var dataOffcanvasID = $(e.target).attr("id");
        console.log(e.type + ": #" + dataOffcanvasID);
    });
    $("#right").on("create.offcanvas", function (e) {
        var dataOffcanvas = $(this).data("offcanvas-component");
        setTimeout(function () {}, 500);
    });
    $(".navbar-nav").clone().prependTo("#mobile-nav");
    $(function () {
        $(document).trigger("enhance");
    });
    $("#mobile-nav").offcanvas({ modifiers: "left,overlay" });
});
$(document).ready(function () {
    $("#content-slider, #recent-blog-slider, #logo-slider").carousel({ interval: 5000 });
    $("#content-slider .carousel-item, #recent-blog-slider .carousel-item, #logo-slider .carousel-item").each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(":first");
        }
        next.children(":first-child").clone().appendTo($(this));
        for (var i = 0; i < 2; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(":first");
            }
            next.children(":first-child").clone().appendTo($(this));
        }
    });
});
$(document).ready(function () {
    var $videoSrc;
    $(".video-btn").click(function () {
        $videoSrc = $(this).data("src");
    });
    $("#modal_youtube").on("shown.bs.modal", function (e) {
        $("#video").attr("src", $videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1");
    });
    $("#modal_youtube").on("hide.bs.modal", function (e) {
        $("#video").attr("src", "");
    });
});
$(document).ready(function () {
    $('input[name="color_swatch_name"]').val($('select[name="color_swatch"] option:selected').text());
    $selected_color_swatch_name = $('select[name="color_swatch"] option:selected').text();
    $(".selected-color-swatch").attr("src", $('.color-swatch[title*="' + $selected_color_swatch_name + '"]').attr("src"));
    $(".btn-color-swatch-sample-request").on("click", function () {
        var $color_swatch_image_path = $(this).data("src");
        var $color_swatch_name = $(this).data("title");
        var $color_swatch_code = $(this).data("code");
        $(".selected-color-swatch").attr("src", $color_swatch_image_path);
        $('input[name="color_swatch_name"]').val($color_swatch_name);
        $('select[name="color_swatch"]').val($color_swatch_code);
    });
    $(".color-swatch-section a[href^='#'], .btn-sample-request, .btn-download-document").click(function (e) {
        e.preventDefault();
        var position = $($(this).attr("href")).offset().top - 85;
        $("body, html").animate({ scrollTop: position });
    });
    $('select[name="color_swatch"]').on("change", function () {
        var $color_code = $(this).val();
        var $color_swatch_image_path = null;
        var $color_swatch_name = $('select[name="color_swatch"] option:selected').text();
        $color_swatch_image_path = $(".color-swatch-list")
            .find('[data-code="' + $color_code + '"]')
            .attr("src");
        $(".selected-color-swatch").attr("src", $color_swatch_image_path);
        $('input[name="color_swatch_name"]').val($color_swatch_name);
    });
});
$(document).ready(function () {
    if ($(window).width() < 975) {
        $(".btn-search-open").click(function () {
            $(".mobile-search-form-section").css({ opacity: 0, display: "flex" }).animate({ opacity: 1 }, 400);
            $(this).hide();
        });
        $(".btn-search-close").click(function () {
            $(".mobile-search-form-section").css("display", "none");
            $(".btn-search-open").fadeIn();
        });
    } else {
        $(".btn-search-open").click(function () {
            $(".search-form-section").css({ opacity: 0, display: "flex" }).animate({ opacity: 1 }, 400);
            $(".navbar-expand-lg .navbar-collapse").attr("style", "display:none !important");
        });
        $(".btn-search-close").click(function () {
            $(".search-form-section").css("display", "none");
            $(".navbar-expand-lg .navbar-collapse").fadeIn(function () {
                $(this).attr("style", "display: flex!important");
            });
        });
    }
});
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 400) {
            $(".back-to-top").fadeIn(200);
        } else {
            $(".back-to-top").fadeOut(200);
        }
    });
    $(".back-to-top").click(function () {
        $("body,html").animate({ scrollTop: 0 }, 500);
    });
});
$(document).ready(function () {
    $(".newsletter-form-submit").click(function () {
        var x = document.getElementById("snackbar");
        var baseurl = document.getElementById("baseurl").value;
        var token = get_csrf_cookie("csrf_summitflooring_cookie_name");
        $.ajax({
            type: "POST",
            url: baseurl + "constant_contact/newsletter_subscribe",
            data: { first_name: $("#first_name").val(), email: $("#email").val(), csrf_summitflooring_token_name: token },
            dataType: "json",
            success: function (msg) {
                if (msg.result == "true") {
                    x.innerHTML = msg.result_msg;
                    x.className = "show-snackbar";
                    setTimeout(function () {
                        x.className = x.className.replace("show-snackbar", "");
                    }, 3500);
                } else if (msg.result == "false") {
                    x.innerHTML = msg.result_msg;
                    x.className = "show-snackbar";
                    setTimeout(function () {
                        x.className = x.className.replace("show-snackbar", "");
                    }, 3500);
                }
            },
            error: function () {
                x.innerHTML = "Something went wrong. Try again.";
                x.className = "show-snackbar";
                setTimeout(function () {
                    x.className = x.className.replace("show-snackbar", "");
                }, 3500);
            },
        });
    });
});
function get_csrf_cookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function loading_slider() {
    $(".regular").slick({
        autoplay: !0,
        dots: !1,
        infinite: !0,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: !0,
        responsive: [
            { breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 1, infinite: !0, dots: !1 } },
            { breakpoint: 780, settings: { slidesToShow: 2, slidesToScroll: 1, dots: !1 } },
            { breakpoint: 480, settings: { slidesToShow: 2, slidesToScroll: 1, dots: !1 } },
        ],
    });
    $(".show_slider_loader").css("display", "none");
    $(".regular").show();
}
$(document).ready(function () {
    var myVar;
    myVar = setTimeout(loading_slider, 1000);
});
