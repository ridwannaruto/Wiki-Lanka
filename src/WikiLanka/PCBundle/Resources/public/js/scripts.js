$(document).ready(function() {
    $.supersized({slide_interval: 3000, transition: 1, transition_speed: 2000, horizontal_center: 1, slides: slideImages});
    $("h2").fitText(0.7, {maxFontSize: "34px"});
    $(".headline").html('<span class="animated fadeIn">' + firstLine + '</span><h1 class="animated bounceInLeft">' + secondLine + "</h1>");
    $(function() {
        $(".countdown").countdown(deadline, function(e) {
            var f = $(this);
            switch (e.type) {
                case"seconds":
                case"minutes":
                case"hours":
                case"days":
                case"weeks":
                case"daysLeft":
                    f.find("span." + e.type).html(e.value);
                    break;
                case"finished":
                    f.fadeTo("slow", 0.5);
                    break
                }
        })
    });
    $(".icon-envelope, #contact .icon-remove").click(function() {
        $("#contact").fadeToggle(1000)
    });
    if ($(window).width() > 767) {
        var c = $("#section").height();
        $("#contact").css("height", c)
    } else {
        $("#contact").css("height", "100%")
    }
    $(".icon-map-marker, .gmap .icon-remove").click(function() {
        var e = $(".sidebar").height();
        $("#map_canvas").css("height", e - 80);
        $(".gmap").fadeToggle(function() {
            $("#map_canvas").gmap({zoom: 13, center: mapCoord, scrollwheel: false, disableDefaultUI: false});
            $("#map_canvas").gmap("addMarker", {position: mapCoord, bounds: false}).click(function() {
                $("#map_canvas").gmap("openInfoWindow", {content: mapText}, this)
            })
        })
    });
    $(".social i").tooltip();
    $("#contact").submit(function(k) {
        alert("I Just clicked");
        k.defaultPrevented();
        var h = $("#client-name").val();
        var g = $("#email").val();
        var f = $("#phone").val();
        var l = $("#text").val();
        var i = "myEmail=" + myEmail + "&clientname=" + h + "&email=" + g + "&phone=" + f + "&text=" + l;
        function j(m) {
            var e = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return e.test(m)
        }
        $(".success, .error").fadeOut();
        if (j(g) && (l.length > 10) && (h.length > 1)) {
            $.ajax({type: "POST", url: "js/form.php", data: i, success: function() {
                    $(".success").fadeIn(1000);
                    $("#contact input, #contact textarea, #contact .btn").addClass("disabled").attr("disabled", "disabled")
                }})
        } else {
            $(".error").fadeIn(1000)
        }
        return false
    });
    $(".subscription").submit(function(i) {
        i.defaultPrevented();
        var f = $("#email2").val();
        var g = "email=" + f;
        function h(j) {
            var e = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return e.test(j)
        }
        $(".thanks-error").fadeOut();
        if (h(f)) {
            $.ajax({type: "POST", url: "js/subscription.php", data: g, success: function() {
                    $(".subscription input, .subscription button").fadeOut(1000);
                    $(".thanks").delay(1000).fadeIn(1000)
                }})
        } else {
            $(".thanks-error").fadeIn(1000)
        }
        return false
    });
    if (feed === "on") {
        $(".feed").html('<div class="feed-loading"><i class="icon-refresh icon-spin"></i><span>loading...</span></div><ul class="flickr inline unstyled"></ul>');
        $(".feed ul").jflickrfeed({limit: 8, qstrings: {id: "42383292@N08"}, itemTemplate: '<li class="span3"><a rel="prettyPhoto[flickr]" href="{{image}}" title="{{title}}"><div class="img-hover"><i class="icon-zoom-in icon-3x"></i></div><img src="{{image_s}}" alt="{{title}}" /></a></li>'}, function(e) {
            $(".feed-loading").fadeOut();
            $(".feed a").prettyPhoto({overlay_gallery: false});
            $(".feed li").hover(function() {
                $(this).find(".img-hover").fadeIn(500)
            }, function() {
                $(".img-hover").stop().fadeOut()
            })
        })
    }
    var a = $(window).height();
    $(".sidebar").css("min-height", a);
    if ($(window).width() < 768) {
        var d = $(window).width();
        $(".gmap").css("width", d);
        var b = $(".sidebar").height();
        $("#contact").css("height", "100%")
    }
    if ($(window).width() > 767) {
        window.onload = function() {
            var f = $(".feed li img").height();
            var e = $("#contact").height();
            $("#contact").css("height", (f * 2) + e)
        };
        $(".gmap").css("width", "100%")
    }
    $(window).resize(function(h) {
        var e = $(window).height();
        $(".sidebar").css("min-height", e);
        var g = $(".sidebar").height();
        $("#map_canvas").css("height", g - 80);
        if ($(window).width() > 767) {
            var g = $(".feed li img").height();
            var f = $(".sidebar").height();
            $("#contact").css("height", f);
            $(".gmap").css("width", "100%")
        }
        if ($(window).width() < 768) {
            var i = $(window).width();
            $(".gmap").css("width", i);
            $("#contact").css("height", "100%")
        }
    })
});