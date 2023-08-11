!function (e) {
    var t = {};
    function r(n) {
        if (t[n]) return t[n].exports;
        var o = t[n] = {
            i: n,
            l: !1,
            exports: {}
        };
        return e[n].call(o.exports, o, o.exports, r), o.l = !0, o.exports;
    }
    r.m = e, r.c = t, r.d = function (e, t, n) {
        r.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: n
        });
    }, r.r = function (e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        });
    }, r.t = function (e, t) {
        if (1 & t && (e = r(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var n = Object.create(null);
        if (r.r(n), Object.defineProperty(n, "default", {
            enumerable: !0,
            value: e
        }), 2 & t && "string" != typeof e) for (var o in e) r.d(n, o, function (t) {
            return e[t];
        }.bind(null, o));
        return n;
    }, r.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e.default;
        } : function () {
            return e;
        };
        return r.d(t, "a", t), t;
    }, r.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t);
    }, r.p = "/", r(r.s = 4);
}({
    4: function (e, t, r) {
        e.exports = r(5);
    },
    5: function (e, t) {
        $(document).on("click", '[data-toggle="modal-feed"]', function (e) {
            e.preventDefault();
            var t = $(this).attr("data-target"), r = $(this).attr("data-feed");
            $.ajax({
                type: "GET",
                url: r,
                data: "",
                processData: !1,
                success: function (e) {
                    $(t + " .modal-content").html(e), $(t).modal("show");
                },
                error: function (e) {
                    e = $.parseJSON(e.responseText), $.each(e, function (e, t) {
                        $.isPlainObject(t) && $.each(t, function (e, t) {
                            toastr ? toastr.error(t, "Error") : console.log(t);
                        });
                    });
                }
            });
        });
    }
});



// -------------Post feed-----------

!function (t) {
    var e = {};
    function o(n) {
        if (e[n]) return e[n].exports;
        var r = e[n] = {
            i: n,
            l: !1,
            exports: {}
        };
        return t[n].call(r.exports, r, r.exports, o), r.l = !0, r.exports;
    }
    o.m = t, o.c = e, o.d = function (t, e, n) {
        o.o(t, e) || Object.defineProperty(t, e, {
            enumerable: !0,
            get: n
        });
    }, o.r = function (t) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(t, "__esModule", {
            value: !0
        });
    }, o.t = function (t, e) {
        if (1 & e && (t = o(t)), 8 & e) return t;
        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
        var n = Object.create(null);
        if (o.r(n), Object.defineProperty(n, "default", {
            enumerable: !0,
            value: t
        }), 2 & e && "string" != typeof t) for (var r in t) o.d(n, r, function (e) {
            return t[e];
        }.bind(null, r));
        return n;
    }, o.n = function (t) {
        var e = t && t.__esModule ? function () {
            return t.default;
        } : function () {
            return t;
        };
        return o.d(e, "a", e), e;
    }, o.o = function (t, e) {
        return Object.prototype.hasOwnProperty.call(t, e);
    }, o.p = "/", o(o.s = 8);
}({
    8: function (t, e, o) {
        t.exports = o(9);
    },
    9: function (t, e) {
        $(document).on("click", '[data-toggle="post-feed"]', function (t) {
            t.preventDefault();
            var e = $(this).attr("data-feed"), o = $(this).attr("data-title"), n = $(this).attr("data-text"), r = $(this).attr("data-icon");
            swal ? swal.fire({
                title: o || "Are you sure?",
                html: n || "This cannot be undone",
                icon: r || "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, Do it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (t) {
                t.value && $.ajax({
                    url: e,
                    type: "POST",
                    data: {},
                    error: function (t) {
                        t = $.parseJSON(t.responseText), $.each(t, function (t, e) {
                            $.isPlainObject(e) && $.each(e, function (t, e) {
                                toastr ? toastr.error(e, "Error") : console.log(e);
                            });
                        });
                    },
                    success: function (t) {
                        t.message ? toastr && toastr.success(t.message, "Success") : toastr && toastr.success("All Done", "Success"),
                            t.location && (window.location = t.location), t.refresh && (window.location = window.location);
                    }
                });
            }) : toastr ? toastr.error("Swal Not Included", "Error") : console.log("Swal Not Included");
        });
    }
});



// --------------generic form submit-------------------



!function (e) {
    var t = {};
    function o(n) {
        if (t[n]) return t[n].exports;
        var r = t[n] = {
            i: n,
            l: !1,
            exports: {}
        };
        return e[n].call(r.exports, r, r.exports, o), r.l = !0, r.exports;
    }
    o.m = e, o.c = t, o.d = function (e, t, n) {
        o.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: n
        });
    }, o.r = function (e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        });
    }, o.t = function (e, t) {
        if (1 & t && (e = o(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var n = Object.create(null);
        if (o.r(n), Object.defineProperty(n, "default", {
            enumerable: !0,
            value: e
        }), 2 & t && "string" != typeof e) for (var r in e) o.d(n, r, function (t) {
            return e[t];
        }.bind(null, r));
        return n;
    }, o.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e.default;
        } : function () {
            return e;
        };
        return o.d(t, "a", t), t;
    }, o.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t);
    }, o.p = "/", o(o.s = 0);
}([function (e, t, o) {
    e.exports = o(1);
}, function (e, t) {
    $(document).ready(function () {
        $(document).on("submit", "form", function (e) {
            if (!$(this).hasClass("no_generic")) {
                e.preventDefault();
                var t = $(this).serialize(), o = $(this).attr("action"), n = $(this).attr("method"), r = $(this).find("button[type='submit'] i, a[href='#finish'] i"), s = $(this).find("button[type='submit'], a[href='#finish']");
                $(r).removeClass("d-none"), $(s).prop("disabled", !0), $.ajax({
                    type: n,
                    url: o,
                    data: t,
                    success: function (e) {
                        if ($(r).addClass("d-none"), $(s).prop("disabled", !1), e.message ? toastr && toastr.success(e.message, "Success") : toastr && toastr.success("All Done", "Success"),
                            e.location && (window.location = e.location), e.refresh && (window.location = window.location),
                            e.modal) {
                            if (!e.feed) return void (toastr ? toastr.error("Feed missing in response for modal.", "Error") : console.log("Feed missing in response for modal."));
                            $.ajax({
                                type: "GET",
                                url: e.feed,
                                data: "",
                                processData: !1,
                                success: function (t) {
                                    $(e.modal + " .modal-content").html(t), $(e.modal).modal("show");
                                },
                                error: function (e) {
                                    e = $.parseJSON(e.responseText), $.each(e, function (e, t) {
                                        $.isPlainObject(t) && $.each(t, function (e, t) {
                                            toastr ? toastr.error(t, "Error") : console.log(t);
                                        });
                                    });
                                }
                            });
                        }
                    },
                    error: function (e) {
                        $(r).addClass("d-none"), $(s).prop("disabled", !1), e = $.parseJSON(e.responseText),
                            $.each(e, function (e, t) {
                                $.isPlainObject(t) && $.each(t, function (e, t) {
                                    toastr && toastr.error(t, "Error");
                                });
                            });
                    }
                });
            }
        });
    });
}]);