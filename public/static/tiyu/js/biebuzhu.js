$(function() {
    $("img.lazy").lazyload(),
    $(".m-so-btn").click(function() {
        $(".m-so-btn").toggleClass("click"),
        $(".m-so").slideToggle("fast")
    }),
    $(".m-menu-btn").click(function() {
        $(".m-menu-btn").toggleClass("click"),
        $(".m-menu").slideToggle("fast")
    }),
    $(".nav-menul").slide({
        type: "menu",
        titCell: ".zhu-li",
        targetCell: ".er-sub",
        effect: "slideDown",
        delayTime: 300,
        triggerTime: 0,
        returnDefault: !0
    }),
    $(document).click(function(a) {
        a.target != $(".sosuo-txt").get(0) ? $(".so-remen").hide() : $(".so-remen").show()
    }),
    $(".tabswitch").slide({
        trigger: "mouseover",
        switchLoad: "data-original",
        delayTime: 300
    }),
    $("#duolie .bd li").each(function(a) {
        jQuery("#duolie .bd li").slice(12 * a, 12 * a + 12).wrapAll("<ul></ul>")
    }),
    $("#duolie").slide({
        mainCell: ".picList",
        effect: "leftLoop",
        switchLoad: "data-original",
        autoPlay: !1
    }),
    $(".cat-top").slide({
        mainCell: ".x7-thumbnail",
        effect: "leftLoop",
        vis: 5,
        scroll: 1
    })
}); !
function(a, b, c, d) {
    var e = a(b);
    a.fn.lazyload = function(f) {
        function g() {
            var b = 0;
            i.each(function() {
                var c = a(this);
                if (!j.skip_invisible || c.is(":visible")) if (a.abovethetop(this, j) || a.leftofbegin(this, j));
                else if (a.belowthefold(this, j) || a.rightoffold(this, j)) {
                    if (++b > j.failure_limit) return ! 1
                } else c.trigger("appear"),
                b = 0
            })
        }
        var h, i = this,
        j = {
            threshold: 200,
            failure_limit: 0,
            event: "scroll",
            effect: "fadeIn",
            container: b,
            data_attribute: "original",
            skip_invisible: !1,
            appear: null,
            load: null,
            placeholder: "http://www.biebuzhu.com/static/lazyload.jpg"
        };
        return f && (d !== f.failurelimit && (f.failure_limit = f.failurelimit, delete f.failurelimit), d !== f.effectspeed && (f.effect_speed = f.effectspeed, delete f.effectspeed), a.extend(j, f)),
        h = j.container === d || j.container === b ? e: a(j.container),
        0 === j.event.indexOf("scroll") && h.bind(j.event,
        function() {
            return g()
        }),
        this.each(function() {
            var b = this,
            c = a(b);
            b.loaded = !1,
            (c.attr("src") === d || c.attr("src") === !1) && c.is("img") && c.attr("src", j.placeholder),
            c.one("appear",
            function() {
                if (!this.loaded) {
                    if (j.appear) {
                        var d = i.length;
                        j.appear.call(b, d, j)
                    }
                    a("<img />").bind("load",
                    function() {
                        var d = c.attr("data-" + j.data_attribute);
                        c.hide(),
                        c.is("img") ? c.attr("src", d) : c.css("background-image", "url('" + d + "')"),
                        c[j.effect](j.effect_speed),
                        b.loaded = !0;
                        var e = a.grep(i,
                        function(a) {
                            return ! a.loaded
                        });
                        if (i = a(e), j.load) {
                            var f = i.length;
                            j.load.call(b, f, j)
                        }
                    }).attr("src", c.attr("data-" + j.data_attribute))
                }
            }),
            0 !== j.event.indexOf("scroll") && c.bind(j.event,
            function() {
                b.loaded || c.trigger("appear")
            })
        }),
        e.bind("resize",
        function() {
            g()
        }),
        /(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion) && e.bind("pageshow",
        function(b) {
            b.originalEvent && b.originalEvent.persisted && i.each(function() {
                a(this).trigger("appear")
            })
        }),
        a(c).ready(function() {
            g()
        }),
        this
    },
    a.belowthefold = function(c, f) {
        var g;
        return g = f.container === d || f.container === b ? (b.innerHeight ? b.innerHeight: e.height()) + e.scrollTop() : a(f.container).offset().top + a(f.container).height(),
        g <= a(c).offset().top - f.threshold
    },
    a.rightoffold = function(c, f) {
        var g;
        return g = f.container === d || f.container === b ? e.width() + e.scrollLeft() : a(f.container).offset().left + a(f.container).width(),
        g <= a(c).offset().left - f.threshold
    },
    a.abovethetop = function(c, f) {
        var g;
        return g = f.container === d || f.container === b ? e.scrollTop() : a(f.container).offset().top,
        g >= a(c).offset().top + f.threshold + a(c).height()
    },
    a.leftofbegin = function(c, f) {
        var g;
        return g = f.container === d || f.container === b ? e.scrollLeft() : a(f.container).offset().left,
        g >= a(c).offset().left + f.threshold + a(c).width()
    },
    a.inviewport = function(b, c) {
        return ! (a.rightoffold(b, c) || a.leftofbegin(b, c) || a.belowthefold(b, c) || a.abovethetop(b, c))
    },
    a.extend(a.expr[":"], {
        "below-the-fold": function(b) {
            return a.belowthefold(b, {
                threshold: 0
            })
        },
        "above-the-top": function(b) {
            return ! a.belowthefold(b, {
                threshold: 0
            })
        },
        "right-of-screen": function(b) {
            return a.rightoffold(b, {
                threshold: 0
            })
        },
        "left-of-screen": function(b) {
            return ! a.rightoffold(b, {
                threshold: 0
            })
        },
        "in-viewport": function(b) {
            return a.inviewport(b, {
                threshold: 0
            })
        },
        "above-the-fold": function(b) {
            return ! a.belowthefold(b, {
                threshold: 0
            })
        },
        "right-of-fold": function(b) {
            return a.rightoffold(b, {
                threshold: 0
            })
        },
        "left-of-fold": function(b) {
            return ! a.rightoffold(b, {
                threshold: 0
            })
        }
    })
} (jQuery, window, document); (function(a) {
    a.fn.slide = function(b) {
        return a.fn.slide.defaults = {
            type: "slide",
            effect: "fade",
            autoPlay: !1,
            delayTime: 500,
            interTime: 2500,
            triggerTime: 150,
            defaultIndex: 0,
            titCell: ".hd li",
            mainCell: ".bd",
            targetCell: null,
            trigger: "mouseover",
            scroll: 1,
            vis: 1,
            titOnClassName: "on",
            autoPage: !1,
            prevCell: ".prev",
            nextCell: ".next",
            pageStateCell: ".pageState",
            opp: !1,
            pnLoop: !0,
            easing: "swing",
            startFun: null,
            endFun: null,
            switchLoad: null,
            playStateCell: ".playState",
            mouseOverStop: !0,
            defaultPlay: !0,
            returnDefault: !1
        },
        this.each(function() {
            var c = a.extend({},
            a.fn.slide.defaults, b),
            d = a(this),
            e = c.effect,
            f = a(c.prevCell, d),
            g = a(c.nextCell, d),
            h = a(c.pageStateCell, d),
            i = a(c.playStateCell, d),
            j = a(c.titCell, d),
            k = j.size(),
            l = a(c.mainCell, d),
            m = l.children().size(),
            n = c.switchLoad,
            o = a(c.targetCell, d),
            p = parseInt(c.defaultIndex),
            q = parseInt(c.delayTime),
            r = parseInt(c.interTime);
            parseInt(c.triggerTime);
            var P, t = parseInt(c.scroll),
            u = parseInt(c.vis),
            v = "false" == c.autoPlay || 0 == c.autoPlay ? !1 : !0,
            w = "false" == c.opp || 0 == c.opp ? !1 : !0,
            x = "false" == c.autoPage || 0 == c.autoPage ? !1 : !0,
            y = "false" == c.pnLoop || 0 == c.pnLoop ? !1 : !0,
            z = "false" == c.mouseOverStop || 0 == c.mouseOverStop ? !1 : !0,
            A = "false" == c.defaultPlay || 0 == c.defaultPlay ? !1 : !0,
            B = "false" == c.returnDefault || 0 == c.returnDefault ? !1 : !0,
            C = 0,
            D = 0,
            E = 0,
            F = 0,
            G = c.easing,
            H = null,
            I = null,
            J = null,
            K = c.titOnClassName,
            L = j.index(d.find("." + K)),
            M = p = defaultIndex = -1 == L ? p: L,
            N = p,
            O = m >= u ? 0 != m % t ? m % t: t: 0,
            Q = "leftMarquee" == e || "topMarquee" == e ? !0 : !1,
            R = function() {
                a.isFunction(c.startFun) && c.startFun(p, k, d, a(c.titCell, d), l, o, f, g)
            },
            S = function() {
                a.isFunction(c.endFun) && c.endFun(p, k, d, a(c.titCell, d), l, o, f, g)
            },
            T = function() {
                j.removeClass(K),
                A && j.eq(defaultIndex).addClass(K)
            };
            if ("menu" == c.type) return A && j.removeClass(K).eq(p).addClass(K),
            j.hover(function() {
                P = a(this).find(c.targetCell);
                var b = j.index(a(this));
                I = setTimeout(function() {
                    switch (p = b, j.removeClass(K).eq(p).addClass(K), R(), e) {
                    case "fade":
                        P.stop(!0, !0).animate({
                            opacity: "show"
                        },
                        q, G, S);
                        break;
                    case "slideDown":
                        P.stop(!0, !0).animate({
                            height: "show"
                        },
                        q, G, S)
                    }
                },
                c.triggerTime)
            },
            function() {
                switch (clearTimeout(I), e) {
                case "fade":
                    P.animate({
                        opacity:
                        "hide"
                    },
                    q, G);
                    break;
                case "slideDown":
                    P.animate({
                        height:
                        "hide"
                    },
                    q, G)
                }
            }),
            B && d.hover(function() {
                clearTimeout(J)
            },
            function() {
                J = setTimeout(T, q)
            }),
            void 0;
            if (0 == k && (k = m), Q && (k = 2), x) {
                if (m >= u) if ("leftLoop" == e || "topLoop" == e) k = 0 != m % t ? (0 ^ m / t) + 1 : m / t;
                else {
                    var U = m - u;
                    k = 1 + parseInt(0 != U % t ? U / t + 1 : U / t),
                    0 >= k && (k = 1)
                } else k = 1;
                j.html("");
                var V = "";
                if (1 == c.autoPage || "true" == c.autoPage) for (var W = 0; k > W; W++) V += "<li>" + (W + 1) + "</li>";
                else for (var W = 0; k > W; W++) V += c.autoPage.replace("$", W + 1);
                j.html(V);
                var j = j.children()
            }
            if (m >= u) {
                l.children().each(function() {
                    a(this).width() > E && (E = a(this).width(), D = a(this).outerWidth(!0)),
                    a(this).height() > F && (F = a(this).height(), C = a(this).outerHeight(!0))
                });
                var X = l.children(),
                Y = function() {
                    for (var a = 0; u > a; a++) X.eq(a).clone().addClass("clone").appendTo(l);
                    for (var a = 0; O > a; a++) X.eq(m - a - 1).clone().addClass("clone").prependTo(l)
                };
                switch (e) {
                case "fold":
                    l.css({
                        position:
                        "relative",
                        width: D,
                        height: C
                    }).children().css({
                        position: "absolute",
                        width: E,
                        left: 0,
                        top: 0,
                        display: "none"
                    });
                    break;
                case "top":
                    l.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; height:' + u * C + 'px"></div>').css({
                        top: -(p * t) * C,
                        position: "relative",
                        padding: "0",
                        margin: "0"
                    }).children().css({
                        height: F
                    });
                    break;
                case "left":
                    l.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; width:' + u * D + 'px"></div>').css({
                        width: m * D,
                        left: -(p * t) * D,
                        position: "relative",
                        overflow: "hidden",
                        padding: "0",
                        margin: "0"
                    }).children().css({
                        "float": "left",
                        width: E
                    });
                    break;
                case "leftLoop":
                case "leftMarquee":
                    Y(),
                    l.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; width:' + u * D + 'px"></div>').css({
                        width: (m + u + O) * D,
                        position: "relative",
                        overflow: "hidden",
                        padding: "0",
                        margin: "0",
                        left: -(O + p * t) * D
                    }).children().css({
                        "float": "left",
                        width: E
                    });
                    break;
                case "topLoop":
                case "topMarquee":
                    Y(),
                    l.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; height:' + u * C + 'px"></div>').css({
                        height: (m + u + O) * C,
                        position: "relative",
                        padding: "0",
                        margin: "0",
                        top: -(O + p * t) * C
                    }).children().css({
                        height: F
                    })
                }
            }
            var Z = function(a) {
                var b = a * t;
                return a == k ? b = m: -1 == a && 0 != m % t && (b = -m % t),
                b
            },
            $ = function(b) {
                var c = function(c) {
                    for (var d = c; u + c > d; d++) b.eq(d).find("img[" + n + "]").each(function() {
                        var b = a(this);
                        if (b.attr("src", b.attr(n)).removeAttr(n), l.find(".clone")[0]) for (var c = l.children(), d = 0; c.size() > d; d++) c.eq(d).find("img[" + n + "]").each(function() {
                            a(this).attr(n) == b.attr("src") && a(this).attr("src", a(this).attr(n)).removeAttr(n)
                        })
                    })
                };
                switch (e) {
                case "fade":
                case "fold":
                case "top":
                case "left":
                case "slideDown":
                    c(p * t);
                    break;
                case "leftLoop":
                case "topLoop":
                    c(O + Z(N));
                    break;
                case "leftMarquee":
                case "topMarquee":
                    var d = "leftMarquee" == e ? l.css("left").replace("px", "") : l.css("top").replace("px", ""),
                    f = "leftMarquee" == e ? D: C,
                    g = O;
                    if (0 != d % f) {
                        var h = Math.abs(0 ^ d / f);
                        g = 1 == p ? O + h: O + h - 1
                    }
                    c(g)
                }
            },
            _ = function(a) {
                if (!A || M != p || a || Q) {
                    if (Q ? p >= 1 ? p = 1 : 0 >= p && (p = 0) : (N = p, p >= k ? p = 0 : 0 > p && (p = k - 1)), R(), null != n && $(l.children()), o[0] && (P = o.eq(p), null != n && $(o), "slideDown" == e ? (o.not(P).stop(!0, !0).slideUp(q), P.slideDown(q, G,
                    function() {
                        l[0] || S()
                    })) : (o.not(P).stop(!0, !0).hide(), P.animate({
                        opacity: "show"
                    },
                    q,
                    function() {
                        l[0] || S()
                    }))), m >= u) switch (e) {
                    case "fade":
                        l.children().stop(!0, !0).eq(p).animate({
                            opacity: "show"
                        },
                        q, G,
                        function() {
                            S()
                        }).siblings().hide();
                        break;
                    case "fold":
                        l.children().stop(!0, !0).eq(p).animate({
                            opacity: "show"
                        },
                        q, G,
                        function() {
                            S()
                        }).siblings().animate({
                            opacity: "hide"
                        },
                        q, G);
                        break;
                    case "top":
                        l.stop(!0, !1).animate({
                            top: -p * t * C
                        },
                        q, G,
                        function() {
                            S()
                        });
                        break;
                    case "left":
                        l.stop(!0, !1).animate({
                            left: -p * t * D
                        },
                        q, G,
                        function() {
                            S()
                        });
                        break;
                    case "leftLoop":
                        var b = N;
                        l.stop(!0, !0).animate({
                            left: -(Z(N) + O) * D
                        },
                        q, G,
                        function() { - 1 >= b ? l.css("left", -(O + (k - 1) * t) * D) : b >= k && l.css("left", -O * D),
                            S()
                        });
                        break;
                    case "topLoop":
                        var b = N;
                        l.stop(!0, !0).animate({
                            top: -(Z(N) + O) * C
                        },
                        q, G,
                        function() { - 1 >= b ? l.css("top", -(O + (k - 1) * t) * C) : b >= k && l.css("top", -O * C),
                            S()
                        });
                        break;
                    case "leftMarquee":
                        var c = l.css("left").replace("px", "");
                        0 == p ? l.animate({
                            left: ++c
                        },
                        0,
                        function() {
                            l.css("left").replace("px", "") >= 0 && l.css("left", -m * D)
                        }) : l.animate({
                            left: --c
                        },
                        0,
                        function() { - (m + O) * D >= l.css("left").replace("px", "") && l.css("left", -O * D)
                        });
                        break;
                    case "topMarquee":
                        var d = l.css("top").replace("px", "");
                        0 == p ? l.animate({
                            top: ++d
                        },
                        0,
                        function() {
                            l.css("top").replace("px", "") >= 0 && l.css("top", -m * C)
                        }) : l.animate({
                            top: --d
                        },
                        0,
                        function() { - (m + O) * C >= l.css("top").replace("px", "") && l.css("top", -O * C)
                        })
                    }
                    j.removeClass(K).eq(p).addClass(K),
                    M = p,
                    y || (g.removeClass("nextStop"), f.removeClass("prevStop"), 0 == p && f.addClass("prevStop"), p == k - 1 && g.addClass("nextStop")),
                    h.html("<span>" + (p + 1) + "</span>/" + k)
                }
            };
            A && _(!0),
            B && d.hover(function() {
                clearTimeout(J)
            },
            function() {
                J = setTimeout(function() {
                    p = defaultIndex,
                    A ? _() : "slideDown" == e ? P.slideUp(q, T) : P.animate({
                        opacity: "hide"
                    },
                    q, T),
                    M = p
                },
                300)
            });
            var ab = function(a) {
                H = setInterval(function() {
                    w ? p--:p++,
                    _()
                },
                a ? a: r)
            },
            bb = function(a) {
                H = setInterval(_, a ? a: r)
            },
            cb = function() {
                z || (clearInterval(H), ab())
            },
            db = function() { (y || p != k - 1) && (p++, _(), Q || cb())
            },
            eb = function() { (y || 0 != p) && (p--, _(), Q || cb())
            },
            fb = function() {
                clearInterval(H),
                Q ? bb() : ab(),
                i.removeClass("pauseState")
            },
            gb = function() {
                clearInterval(H),
                i.addClass("pauseState")
            };
            if (v ? Q ? (w ? p--:p++, bb(), z && l.hover(gb, fb)) : (ab(), z && d.hover(gb, fb)) : (Q && (w ? p--:p++), i.addClass("pauseState")), i.click(function() {
                i.hasClass("pauseState") ? fb() : gb()
            }), "mouseover" == c.trigger ? j.hover(function() {
                var a = j.index(this);
                I = setTimeout(function() {
                    p = a,
                    _(),
                    cb()
                },
                c.triggerTime)
            },
            function() {
                clearTimeout(I)
            }) : j.click(function() {
                p = j.index(this),
                _(),
                cb()
            }), Q) {
                if (g.mousedown(db), f.mousedown(eb), y) {
                    var hb, ib = function() {
                        hb = setTimeout(function() {
                            clearInterval(H),
                            bb(0 ^ r / 10)
                        },
                        150)
                    },
                    jb = function() {
                        clearTimeout(hb),
                        clearInterval(H),
                        bb()
                    };
                    g.mousedown(ib),
                    g.mouseup(jb),
                    f.mousedown(ib),
                    f.mouseup(jb)
                }
                "mouseover" == c.trigger && (g.hover(db,
                function() {}), f.hover(eb,
                function() {}))
            } else g.click(db),
            f.click(eb)
        })
    }
})(jQuery),
jQuery.easing.jswing = jQuery.easing.swing,
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function(a, b, c, d, e) {
        return jQuery.easing[jQuery.easing.def](a, b, c, d, e)
    },
    easeInQuad: function(a, b, c, d, e) {
        return d * (b /= e) * b + c
    },
    easeOutQuad: function(a, b, c, d, e) {
        return - d * (b /= e) * (b - 2) + c
    },
    easeInOutQuad: function(a, b, c, d, e) {
        return 1 > (b /= e / 2) ? d / 2 * b * b + c: -d / 2 * (--b * (b - 2) - 1) + c
    },
    easeInCubic: function(a, b, c, d, e) {
        return d * (b /= e) * b * b + c
    },
    easeOutCubic: function(a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b + 1) + c
    },
    easeInOutCubic: function(a, b, c, d, e) {
        return 1 > (b /= e / 2) ? d / 2 * b * b * b + c: d / 2 * ((b -= 2) * b * b + 2) + c
    },
    easeInQuart: function(a, b, c, d, e) {
        return d * (b /= e) * b * b * b + c
    },
    easeOutQuart: function(a, b, c, d, e) {
        return - d * ((b = b / e - 1) * b * b * b - 1) + c
    },
    easeInOutQuart: function(a, b, c, d, e) {
        return 1 > (b /= e / 2) ? d / 2 * b * b * b * b + c: -d / 2 * ((b -= 2) * b * b * b - 2) + c
    },
    easeInQuint: function(a, b, c, d, e) {
        return d * (b /= e) * b * b * b * b + c
    },
    easeOutQuint: function(a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b * b * b + 1) + c
    },
    easeInOutQuint: function(a, b, c, d, e) {
        return 1 > (b /= e / 2) ? d / 2 * b * b * b * b * b + c: d / 2 * ((b -= 2) * b * b * b * b + 2) + c
    },
    easeInSine: function(a, b, c, d, e) {
        return - d * Math.cos(b / e * (Math.PI / 2)) + d + c
    },
    easeOutSine: function(a, b, c, d, e) {
        return d * Math.sin(b / e * (Math.PI / 2)) + c
    },
    easeInOutSine: function(a, b, c, d, e) {
        return - d / 2 * (Math.cos(Math.PI * b / e) - 1) + c
    },
    easeInExpo: function(a, b, c, d, e) {
        return 0 == b ? c: d * Math.pow(2, 10 * (b / e - 1)) + c
    },
    easeOutExpo: function(a, b, c, d, e) {
        return b == e ? c + d: d * ( - Math.pow(2, -10 * b / e) + 1) + c
    },
    easeInOutExpo: function(a, b, c, d, e) {
        return 0 == b ? c: b == e ? c + d: 1 > (b /= e / 2) ? d / 2 * Math.pow(2, 10 * (b - 1)) + c: d / 2 * ( - Math.pow(2, -10 * --b) + 2) + c
    },
    easeInCirc: function(a, b, c, d, e) {
        return - d * (Math.sqrt(1 - (b /= e) * b) - 1) + c
    },
    easeOutCirc: function(a, b, c, d, e) {
        return d * Math.sqrt(1 - (b = b / e - 1) * b) + c
    },
    easeInOutCirc: function(a, b, c, d, e) {
        return 1 > (b /= e / 2) ? -d / 2 * (Math.sqrt(1 - b * b) - 1) + c: d / 2 * (Math.sqrt(1 - (b -= 2) * b) + 1) + c
    },
    easeInElastic: function(a, b, c, d, e) {
        var f = 1.70158,
        g = 0,
        h = d;
        if (0 == b) return c;
        if (1 == (b /= e)) return c + d;
        if (g || (g = .3 * e), Math.abs(d) > h) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        return - (h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g)) + c
    },
    easeOutElastic: function(a, b, c, d, e) {
        var f = 1.70158,
        g = 0,
        h = d;
        if (0 == b) return c;
        if (1 == (b /= e)) return c + d;
        if (g || (g = .3 * e), Math.abs(d) > h) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        return h * Math.pow(2, -10 * b) * Math.sin((b * e - f) * 2 * Math.PI / g) + d + c
    },
    easeInOutElastic: function(a, b, c, d, e) {
        var f = 1.70158,
        g = 0,
        h = d;
        if (0 == b) return c;
        if (2 == (b /= e / 2)) return c + d;
        if (g || (g = e * .3 * 1.5), Math.abs(d) > h) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        return 1 > b ? -.5 * h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) + c: .5 * h * Math.pow(2, -10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) + d + c
    },
    easeInBack: function(a, b, c, d, e, f) {
        return void 0 == f && (f = 1.70158),
        d * (b /= e) * b * ((f + 1) * b - f) + c
    },
    easeOutBack: function(a, b, c, d, e, f) {
        return void 0 == f && (f = 1.70158),
        d * ((b = b / e - 1) * b * ((f + 1) * b + f) + 1) + c
    },
    easeInOutBack: function(a, b, c, d, e, f) {
        return void 0 == f && (f = 1.70158),
        1 > (b /= e / 2) ? d / 2 * b * b * (((f *= 1.525) + 1) * b - f) + c: d / 2 * ((b -= 2) * b * (((f *= 1.525) + 1) * b + f) + 2) + c
    },
    easeInBounce: function(a, b, c, d, e) {
        return d - jQuery.easing.easeOutBounce(a, e - b, 0, d, e) + c
    },
    easeOutBounce: function(a, b, c, d, e) {
        return 1 / 2.75 > (b /= e) ? d * 7.5625 * b * b + c: 2 / 2.75 > b ? d * (7.5625 * (b -= 1.5 / 2.75) * b + .75) + c: 2.5 / 2.75 > b ? d * (7.5625 * (b -= 2.25 / 2.75) * b + .9375) + c: d * (7.5625 * (b -= 2.625 / 2.75) * b + .984375) + c
    },
    easeInOutBounce: function(a, b, c, d, e) {
        return e / 2 > b ? .5 * jQuery.easing.easeInBounce(a, 2 * b, 0, d, e) + c: .5 * jQuery.easing.easeOutBounce(a, 2 * b - e, 0, d, e) + .5 * d + c
    }
});