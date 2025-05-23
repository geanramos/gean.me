/*
 Ridiculously Responsive Social Sharing Buttons
 Team: @dbox, @seagoat
 Site: http://www.kurtnoble.com/labs/pbs
 Twitter: @therealkni
 
 ___           ___
 /__/|         /__/\        ___
 |  |:|         \  \:\      /  /\
 |  |:|          \  \:\    /  /:/
 __|  |:|      _____\__\:\  /__/::\
 /__/\_|:|____ /__/::::::::\ \__\/\:\__
 \  \:\/:::::/ \  \:\~~\~~\/    \  \:\/\
 \  \::/~~~~   \  \:\  ~~~      \__\::/
 \  \:\        \  \:\          /__/:/
 \  \:\        \  \:\         \__\/
 \__\/         \__\/
 */(function (e, t, n) {
    "use strict";
    var r = function () {
        t(".pbs-buttons").each(function (e) {
            var n = t(this), r = t("li", n).length, i = 100 / r;
            t("li", n).css("width", i + "%").attr("data-initwidth", i)
        })
    }, i = function () {
        t(".pbs-buttons").each(function (e) {
            var n = t(this), r = parseFloat(t(n).width()), i = t("li", n).not(".small").first().width(), s = t("li.small", n).length;
            i > 170 && s < 1 ? t(n).addClass("large-format") : t(n).removeClass("large-format");
            r < 200 ? t(n).removeClass("small-format").addClass("tiny-format") : t(n).removeClass("tiny-format")
        })
    }, s = function () {
        t(".pbs-buttons").each(function (e) {
            var n = t(this), r = 0, i = 0, s, o, a = t("li.small", n).length;
            if (a === t("li", n).length) {
                var f = a * 42, l = parseFloat(t(n).width());
                s = t("li.small", n).first();
                o = parseFloat(t(s).attr("data-size")) + 55;
                if (f + o < l) {
                    t(n).removeClass("small-format");
                    t("li.small", n).first().removeClass("small");
                    u()
                }
            } else {
                t("li", n).not(".small").each(function (e) {
                    var n = parseFloat(t(this).attr("data-size")) + 55, s = parseFloat(t(this).width());
                    r += s;
                    i += n
                });
                var c = r - i;
                s = t("li.small", n).first();
                o = parseFloat(t(s).attr("data-size")) + 55;
                if (o < c) {
                    t(s).removeClass("small");
                    u()
                }
            }
        })
    }, o = function (e) {
        t(".pbs-buttons").each(function (e) {
            var n = t(this), r = t("li", n).nextAll(), i = r.length;
            t(t("li", n).get().reverse()).each(function (e, r) {
                if (t(this).hasClass("small") === !1) {
                    var i = parseFloat(t(this).attr("data-size")) + 55, o = parseFloat(t(this).width());
                    if (i > o) {
                        var a = t("li", n).not(".small").last();
                        t(a).addClass("small");
                        u()
                    }
                }
                --r || s()
            })
        });
        e === !0 && f(u)
    }, u = function () {
        t(".pbs-buttons").each(function (e) {
            var n = t(this), i, s, o, u, a, f = t("li.small", n).length;
            if (f > 0 && f !== t("li", n).length) {
                t(n).removeClass("small-format");
                t("li.small", n).css("width", "42px");
                o = f * 42;
                i = t("li", n).not(".small").length;
                s = 100 / i;
                a = o / i;
                navigator.userAgent.indexOf("Chrome") >= 0 || navigator.userAgent.indexOf("Safari") >= 0 ? u = "-webkit-calc(" + s + "% - " + a + "px)" : navigator.userAgent.indexOf("Firefox") >= 0 ? u = "-moz-calc(" + s + "% - " + a + "px)" : u = "calc(" + s + "% - " + a + "px)";
                t("li", n).not(".small").css("width", u)
            } else if (f === t("li", n).length) {
                t(n).addClass("small-format");
                r()
            } else {
                t(n).removeClass("small-format");
                r()
            }
        });
        i()
    }, a = function () {
        t(".pbs-buttons").each(function (e) {
            t(this).addClass("pbs-" + (e + 1))
        });
        r();
        t(".pbs-buttons li .text").each(function (e) {
            var n = parseFloat(t(this).width());
            t(this).closest("li").attr("data-size", n)
        });
        o(!0)
    }, f = function (e) {
        t(".pbs-buttons li.small").removeClass("small");
        o();
        e()
    }, l = function (t, r, i, s) {
        var o = e.screenLeft !== n ? e.screenLeft : screen.left, u = e.screenTop !== n ? e.screenTop : screen.top, a = e.innerWidth ? e.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width, f = e.innerHeight ? e.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height, l = a / 2 - i / 2 + o, c = f / 3 - s / 3 + u, h = e.open(t, r, "scrollbars=yes, width=" + i + ", height=" + s + ", top=" + c + ", left=" + l);
        e.focus && h.focus()
    }, c = function () {
        var e = {};
        return function (t, n, r) {
            r || (r = "Don't call this twice without a uniqueId");
            e[r] && clearTimeout(e[r]);
            e[r] = setTimeout(t, n)
        }
    }();
    t(".pbs-buttons a.popup").on("click", function (e) {
        var n = t(this);
        l(n.attr("href"), n.find(".text").html(), 580, 470);
        e.preventDefault()
    });
    t(e).resize(function () {
        f(u);
        c(function () {
            f(u)
        }, 200, "finished resizing")
    });
    t(document).ready(function () {
        a()
    })
})(window, jQuery);