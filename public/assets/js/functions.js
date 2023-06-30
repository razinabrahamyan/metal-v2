//INSPIRO Global var
var INSPIRO = {},
    $ = jQuery.noConflict();
(function ($) {
    "use strict";
    // Predefined Global Variables
    var $window = $(window),
        $theme_color = "#2250fc",
        //Main
        $body = $("body"),
        $bodyInner = $(".body-inner"),
        $section = $("section"),
        //Header
        $topbar = $("#topbar"),
        $header = $("#header"),
        $headerCurrentClasses = $header.attr("class"),
        //Logo
        headerLogo = $("#logo"),
        //Menu
        $mainMenu = $("#mainMenu"),
        $mainMenuTriggerBtn = $("#mainMenu-trigger a, #mainMenu-trigger button"),
        //Slider
        $slider = $("#slider"),
        $inspiroSlider = $(".inspiro-slider"),
        $carousel = $(".carousel"),
        /*Grid Layout*/
        $gridLayout = $(".grid-layout"),
        $gridFilter = $(".grid-filter, .page-grid-filter"),
        windowWidth = $window.width();

    //Check if header exist
    if ($header.length > 0) {
        var $headerOffsetTop = $header.offset().top;
    }
    var Events = {
        browser: {
            isMobile: function () {
                if (
                    navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/)
                ) {
                    return true;
                } else {
                    return false;
                }
            },
        },
    };
    //Settings
    var Settings = {
        isMobile: Events.browser.isMobile,
        submenuLight: $header.hasClass("submenu-light") == true ? true : false,
        headerHasDarkClass: $header.hasClass("dark") == true ? true : false,
        headerDarkClassRemoved: false,
        sliderDarkClass: false,
        menuIsOpen: false,
        menuOverlayOpened: false,
    };
    //Window breakpoints
    $(window).breakpoints({
        triggerOnInit: true,
        breakpoints: [{
            name: "xs",
            width: 0,
        },
            {
                name: "sm",
                width: 576,
            },
            {
                name: "md",
                width: 768,
            },
            {
                name: "lg",
                width: 1025,
            },
            {
                name: "xl",
                width: 1200,
            },
        ],
    });
    var currentBreakpoint = $(window).breakpoints("getBreakpoint");
    $body.addClass("breakpoint-" + currentBreakpoint);
    $(window).bind("breakpoint-change", function (breakpoint) {
        $body.removeClass("breakpoint-" + breakpoint.from);
        $body.addClass("breakpoint-" + breakpoint.to);
    });

    $(window).bind("breakpoint-change", function (event) {
        $(window).breakpoints("greaterEqualTo", "lg", function () {
            $body.addClass("b--desktop");
            $body.removeClass("b--responsive");
        });
        $(window).breakpoints("lessThan", "lg", function () {
            $body.removeClass("b--desktop");
            $body.addClass("b--responsive");
        });
    });

    INSPIRO.core = {
        functions: function () {
            INSPIRO.core.rtlStatus();
        },
        rtlStatus: function () {
            var $rtlStatusCheck = $("html").attr("dir");
            if ($rtlStatusCheck == "rtl") {
                return true;
            }
            return false;
        },
    };
    INSPIRO.slider = {
        functions: function () {
            INSPIRO.slider.inspiroSlider();
            INSPIRO.slider.carousel();
        },
        inspiroSlider: function () {
            if ($inspiroSlider.length > 0) {
                //Check if flickity plugin is loaded
                if (typeof $.fn.flickity === "undefined") {
                    INSPIRO.elements.notification(
                        "Warning",
                        "jQuery flickity slider plugin is missing in plugins.js file.",
                        "danger"
                    );
                    return true;
                }
                var defaultAnimation = "animate__fadeInUp";

                function animate_captions($elem) {
                    var $captions = $elem;
                    $captions.each(function () {
                        var $captionElem = $(this),
                            animationDuration = "600ms";
                        if ($(this).attr("data-animate-duration")) {
                            animationDuration = $(this).attr("data-animate-duration") + "ms";
                        }
                        $captionElem.css({
                            opacity: 0,
                        });
                        $(this).css("animation-duration", animationDuration);
                    });
                    $captions.each(function (index) {
                        var $captionElem = $(this),
                            captionDelay =
                                $captionElem.attr("data-caption-delay") || index * 350 + 1000,
                            captionAnimation =
                                $captionElem.attr("data-caption-animate") || defaultAnimation;
                        var t = setTimeout(function () {
                            $captionElem.css({
                                opacity: 1,
                            });
                            $captionElem.addClass(captionAnimation);
                        }, captionDelay);
                    });
                }

                function hide_captions($elem) {
                    var $captions = $elem;
                    $captions.each(function (caption) {
                        var caption = $(this),
                            captionAnimation =
                                caption.attr("data-caption-animate") || defaultAnimation;
                        caption.removeClass(captionAnimation);
                        caption.removeAttr("style");
                    });
                }

                function start_kenburn(elem) {
                    var currentSlide = elem.find(".slide.is-selected"),
                        currentSlideKenburns = currentSlide.hasClass("kenburns");
                    if (currentSlideKenburns) {
                        setTimeout(function () {
                            currentSlide.find(".kenburns-bg").addClass("kenburns-bg-animate");
                        }, 500);
                    }
                }

                function stop_kenburn(elem) {
                    var notCurrentSlide = elem.find(".slide:not(.is-selected)");
                    notCurrentSlide
                        .find(".kenburns-bg")
                        .removeClass("kenburns-bg-animate");
                }

                function slide_dark(elem) {
                    var $sliderClassSlide = elem.find(".slide.is-selected");
                    if (
                        $sliderClassSlide.hasClass("slide-dark") &&
                        Settings.headerHasDarkClass
                    ) {
                        $header.removeClass("dark");
                        Settings.sliderDarkClass = true;
                        Settings.headerDarkClassRemoved = true;
                    } else {
                        Settings.sliderDarkClass = false;
                        if (
                            Settings.headerDarkClassRemoved &&
                            Settings.headerHasDarkClass &&
                            !$body.hasClass("mainMenu-open") &&
                            !$header.hasClass("sticky-active")
                        ) {
                            $header.addClass("dark");
                        }
                    }
                }

                function sliderHeight(elem, state) {
                    var elem,
                        headerHeight = $header.outerHeight(),
                        topbarHeight = $topbar.outerHeight() || 0,
                        windowHeight = $window.height(),
                        sliderCurrentHeight = elem.height(),
                        screenHeightExtra = headerHeight + topbarHeight,
                        $sliderClassSlide = elem.find(".slide"),
                        sliderFullscreen = elem.hasClass("slider-fullscreen"),
                        screenRatio = elem.hasClass("slider-halfscreen") ? 1 : 1.2,
                        transparentHeader = $header.attr("data-transparent"),
                        customHeight = elem.attr("data-height"),
                        responsiveHeightXs = elem.attr("data-height-xs"),
                        containerFullscreen = elem.find(".container").first().outerHeight(),
                        contentCrop;

                    if (containerFullscreen >= windowHeight) {
                        contentCrop = true;
                        var sliderMinHeight = containerFullscreen;
                        elem.css("min-height", sliderMinHeight + 100);
                        $sliderClassSlide.css("min-height", sliderMinHeight + 100);
                        elem
                            .find(".flickity-viewport")
                            .css("min-height", sliderMinHeight + 100);
                    }

                    sliderElementsHeight("null");

                    function sliderElementsHeight(height) {
                        if (height == "null") {
                            elem.css("height", "");
                            $sliderClassSlide.css("height", "");
                            elem.find(".flickity-viewport").css("height", "");
                        } else {
                            elem.css("height", height);
                            $sliderClassSlide.css("height", height);
                            elem.find(".flickity-viewport").css("height", height);
                        }
                    }

                    if (customHeight) {
                        $(window).breakpoints("greaterEqualTo", "lg", function () {
                            sliderElementsHeight(customHeight + "px");
                        });
                    }
                    if (responsiveHeightXs) {
                        $(window).breakpoints("lessThan", "md", function () {
                            sliderElementsHeight(responsiveHeightXs + "px");
                        });
                    }
                }

                $inspiroSlider.each(function () {
                    var elem = $(this);
                    //Plugin Options
                    elem.options = {
                        cellSelector: elem.attr("data-item") || ".slide",
                        prevNextButtons: elem.data("arrows") == false ? false : true,
                        pageDots: elem.data("dots") == false ? false : true,
                        fade: elem.data("fade") == true ? true : false,
                        draggable: elem.data("drag") == true ? true : false,
                        freeScroll: elem.data("free-scroll") == true ? true : false,
                        wrapAround: elem.data("loop") == false ? false : true,
                        groupCells: elem.data("group-cells") == true ? true : false,
                        autoPlay: elem.attr("data-autoplay") || 7000,
                        pauseAutoPlayOnHover: elem.data("hoverpause") == true ? true : false,
                        adaptiveHeight: elem.data("adaptive-height") == false ? false : false,
                        asNavFor: elem.attr("data-navigation") || false,
                        selectedAttraction: elem.attr("data-attraction") || 0.07,
                        friction: elem.attr("data-friction") || 0.9,
                        initialIndex: elem.attr("data-initial-index") || 0,
                        accessibility: elem.data("accessibility") == true ? true : false,
                        setGallerySize: elem.data("gallery-size") == false ? false : false,
                        resize: elem.data("resize") == false ? false : false,
                        cellAlign: elem.attr("data-align") || "left",
                        playWholeVideo: elem.attr("data-play-whole-video") == false ? false : true,
                    };


                    //Kenburns effect
                    elem.find(".slide").each(function () {
                        if ($(this).hasClass("kenburns")) {
                            var elemChild = $(this),
                                elemChildImage = elemChild
                                    .css("background-image")
                                    .replace(/.*\s?url\([\'\"]?/, "")
                                    .replace(/[\'\"]?\).*/, "");

                            if (elemChild.attr("data-bg-image")) {
                                elemChildImage = elemChild.attr("data-bg-image");
                            }
                            elemChild.prepend(
                                '<div class="kenburns-bg" style="background-image:url(' +
                                elemChildImage +
                                ')"></div>'
                            );
                        }
                    });
                    elem.find(".slide video").each(function () {
                        this.pause();
                    });
                    $(window).breakpoints("lessThan", "lg", function () {
                        elem.options.draggable = true;
                    });

                    if (elem.find(".slide").length <= 1) {
                        elem.options.prevNextButtons = false;
                        elem.options.pageDots = false;
                        elem.options.autoPlay = false;
                        elem.options.draggable = false;
                    }

                    if (!$.isNumeric(elem.options.autoPlay) &&
                        elem.options.autoPlay != false
                    ) {
                        elem.options.autoPlay = Number(7000);
                    }

                    if (INSPIRO.core.rtlStatus() == true) {
                        elem.options.resize = true;
                    }

                    sliderHeight(elem);

                    var inspiroSliderData = elem.flickity({
                        cellSelector: elem.options.cellSelector,
                        prevNextButtons: elem.options.prevNextButtons,
                        pageDots: elem.options.pageDots,
                        fade: elem.options.fade,
                        draggable: elem.options.draggable,
                        freeScroll: elem.options.freeScroll,
                        wrapAround: elem.options.wrapAround,
                        groupCells: elem.options.groupCells,
                        autoPlay: Number(elem.options.autoPlay),
                        pauseAutoPlayOnHover: elem.options.pauseAutoPlayOnHover,
                        adaptiveHeight: elem.options.adaptiveHeight,
                        asNavFor: elem.options.asNavFor,
                        selectedAttraction: Number(elem.options.selectedAttraction),
                        friction: elem.options.friction,
                        initialIndex: elem.options.initialIndex,
                        accessibility: elem.options.accessibility,
                        setGallerySize: elem.options.setGallerySize,
                        resize: elem.options.resize,
                        cellAlign: elem.options.cellAlign,
                        rightToLeft: INSPIRO.core.rtlStatus(),
                        on: {
                            ready: function (index) {
                                var $captions = elem.find(
                                    ".slide.is-selected .slide-captions > *"
                                );
                                slide_dark(elem);
                                sliderHeight(elem);
                                start_kenburn(elem);
                                animate_captions($captions);
                                setTimeout(function () {
                                    elem
                                        .find(".slide:not(.is-selected) video")
                                        .each(function (i, video) {
                                            video.pause();
                                            video.currentTime = 0;
                                        });
                                }, 700);
                            },
                        },
                    });

                    var flkty = inspiroSliderData.data("flickity");

                    function wrapAroundStop() {
                        if (flkty.player.state != 'playing') {
                            disableAutoplay()
                            return;
                        }

                        var isAtLast = flkty.selectedIndex == flkty.slides.length - 1;
                        if (isAtLast) {
                            disableAutoplay();
                        }
                    }

                    function disableAutoplay() {
                        elem.flickity('stopPlayer');
                        elem.off('select.flickity', wrapAroundStop);
                    }

                    inspiroSliderData.on("change.flickity", function () {
                        var $captions = elem.find(".slide.is-selected .slide-captions > *");
                        hide_captions($captions);
                        setTimeout(function () {
                            stop_kenburn(elem);
                        }, 1000);
                        start_kenburn(elem);
                        animate_captions($captions);
                        elem.find(".slide video").each(function (i, video) {
                            video.currentTime = 0;
                        });
                    });

                    inspiroSliderData.on("select.flickity", function () {
                        //  INSPIRO.elements.backgroundImage();
                        var $captions = elem.find(".slide.is-selected .slide-captions > *");
                        slide_dark(elem);
                        sliderHeight(elem);
                        start_kenburn(elem);
                        animate_captions($captions);
                        var video = flkty.selectedElement.querySelector("video");
                        if (video) {
                            video.play();
                            flkty.options.autoPlay = Number(video.duration * 1000);
                        } else {
                            flkty.options.autoPlay = Number(elem.options.autoPlay);
                        }

                        if (elem.options.wrapAround == false) {
                            wrapAroundStop();
                        }

                    });
                    inspiroSliderData.on("dragStart.flickity", function () {
                        var $captions = elem.find(
                            ".slide:not(.is-selected) .slide-captions > *"
                        );
                        hide_captions($captions);
                    });
                    $(window).resize(function () {
                        sliderHeight(elem);
                        elem.flickity("reposition");
                    });
                });
            }
        },
        carousel: function (elem) {
            if (elem) {
                $carousel = elem;
            }

            if ($carousel.length > 0) {
                //Check if flickity plugin is loaded
                if (typeof $.fn.flickity === "undefined") {
                    INSPIRO.elements.notification(
                        "Warning",
                        "jQuery flickity plugin is missing in plugins.js file.",
                        "danger"
                    );
                    return true;
                }
                $carousel.each(function () {
                    var elem = $(this);
                    //Plugin Options
                    elem.options = {
                        containerWidth: elem.width(),
                        items: elem.attr("data-items") || 4,
                        itemsLg: elem.attr("data-items-lg"),
                        itemsMd: elem.attr("data-items-md"),
                        itemsSm: elem.attr("data-items-sm"),
                        itemsXs: elem.attr("data-items-xs"),
                        margin: elem.attr("data-margin") || 10,
                        cellSelector: elem.attr("data-item") || false,
                        prevNextButtons: elem.data("arrows") == false ? false : true,
                        pageDots: elem.data("dots") == false ? false : true,
                        fade: elem.data("fade") == true ? true : false,
                        draggable: elem.data("drag") == false ? false : true,
                        freeScroll: elem.data("free-scroll") == true ? true : false,
                        wrapAround: elem.data("loop") == false ? false : true,
                        groupCells: elem.data("group-cells") == true ? true : false,
                        autoPlay: elem.attr("data-autoplay") || 7000,
                        pauseAutoPlayOnHover: elem.data("hover-pause") == false ? false : true,
                        asNavFor: elem.attr("data-navigation") || false,
                        lazyLoad: elem.data("lazy-load") == true ? true : false,
                        initialIndex: elem.attr("data-initial-index") || 0,
                        accessibility: elem.data("accessibility") == true ? true : false,
                        adaptiveHeight: elem.data("adaptive-height") == true ? true : false,
                        autoWidth: elem.data("auto-width") == true ? true : false,
                        setGallerySize: elem.data("gallery-size") == false ? false : true,
                        resize: elem.data("resize") == false ? false : true,
                        cellAlign: elem.attr("data-align") || "left",
                        contain: elem.data("contain") == false ? false : true,
                        rightToLeft: INSPIRO.core.rtlStatus(),
                    };

                    //Calculate min/max on responsive breakpoints
                    elem.options.itemsLg =
                        elem.options.itemsLg ||
                        Math.min(Number(elem.options.items), Number(4));
                    elem.options.itemsMd =
                        elem.options.itemsMd ||
                        Math.min(Number(elem.options.itemsLg), Number(3));
                    elem.options.itemsSm =
                        elem.options.itemsSm ||
                        Math.min(Number(elem.options.itemsMd), Number(2));
                    elem.options.itemsXs =
                        elem.options.itemsXs ||
                        Math.min(Number(elem.options.itemsSm), Number(1));
                    var setResponsiveColumns;

                    function getCarouselColumns() {
                        switch ($(window).breakpoints("getBreakpoint")) {
                            case "xs":
                                setResponsiveColumns = Number(elem.options.itemsXs);
                                break;
                            case "sm":
                                setResponsiveColumns = Number(elem.options.itemsSm);
                                break;
                            case "md":
                                setResponsiveColumns = Number(elem.options.itemsMd);
                                break;
                            case "lg":
                                setResponsiveColumns = Number(elem.options.itemsLg);
                                break;
                            case "xl":
                                setResponsiveColumns = Number(elem.options.items);
                                break;
                        }
                    }

                    getCarouselColumns();
                    var itemWidth;
                    elem.find("> *").wrap('<div class="polo-carousel-item">');
                    if (elem.hasClass("custom-height")) {
                        elem.options.setGallerySize = false;
                        INSPIRO.core.customHeight(elem);
                        INSPIRO.core.customHeight(elem.find(".polo-carousel-item"));
                        var carouselCustomHeightStatus = true;
                    }
                    if (Number(elem.options.items) !== 1) {
                        if (elem.options.autoWidth || carouselCustomHeightStatus) {
                            elem.find(".polo-carousel-item").css({
                                "padding-right": elem.options.margin + "px",
                            });
                        } else {
                            itemWidth =
                                (elem.options.containerWidth + Number(elem.options.margin)) /
                                setResponsiveColumns;
                            elem.find(".polo-carousel-item").css({
                                width: itemWidth,
                                "padding-right": elem.options.margin + "px",
                            });
                        }
                    } else {
                        elem.find(".polo-carousel-item").css({
                            width: "100%",
                            "padding-right": "0 !important;",
                        });
                    }
                    if (elem.options.autoWidth || carouselCustomHeightStatus) {
                        elem.options.cellAlign = "center";
                    }

                    if (elem.options.autoPlay == "false") {
                        elem.options.autoPlay = false;
                    }

                    if (!$.isNumeric(elem.options.autoPlay) &&
                        elem.options.autoPlay != false
                    ) {
                        elem.options.autoPlay = Number(7000);
                    }

                    //Initializing plugin and passing the options
                    var $carouselElem = $(elem);
                    $carouselElem.imagesLoaded(function () {
                        // init Isotope after all images have loaded
                        $carouselElem.flickity({
                            cellSelector: elem.options.cellSelector,
                            prevNextButtons: elem.options.prevNextButtons,
                            pageDots: elem.options.pageDots,
                            fade: elem.options.fade,
                            draggable: elem.options.draggable,
                            freeScroll: elem.options.freeScroll,
                            wrapAround: elem.options.wrapAround,
                            groupCells: elem.options.groupCells,
                            autoPlay: Number(elem.options.autoPlay),
                            pauseAutoPlayOnHover: elem.options.pauseAutoPlayOnHover,
                            adaptiveHeight: elem.options.adaptiveHeight,
                            asNavFor: elem.options.asNavFor,
                            initialIndex: elem.options.initialIndex,
                            accessibility: elem.options.accessibility,
                            setGallerySize: elem.options.setGallerySize,
                            resize: elem.options.resize,
                            cellAlign: elem.options.cellAlign,
                            rightToLeft: elem.options.rightToLeft,
                            contain: elem.options.contain,
                        });
                        elem.addClass("carousel-loaded");
                    });
                    if (elem.hasClass("custom-height")) {
                        INSPIRO.core.customHeight(elem);
                    }
                    if (Number(elem.options.items) !== 1) {
                        $(window).on("resize", function () {
                            setTimeout(function () {
                                getCarouselColumns();
                                itemWidth =
                                    (elem.width() + Number(elem.options.margin)) /
                                    setResponsiveColumns;
                                if (elem.options.autoWidth || carouselCustomHeightStatus) {
                                    elem.find(".polo-carousel-item").css({
                                        "padding-right": elem.options.margin + "px",
                                    });
                                } else {
                                    if (!elem.hasClass("custom-height")) {
                                        elem.find(".polo-carousel-item").css({
                                            width: itemWidth,
                                            "padding-right": elem.options.margin + "px",
                                        });
                                    } else {
                                        INSPIRO.core.customHeight(elem.find(".polo-carousel-item"));
                                        elem.find(".polo-carousel-item").css({
                                            width: itemWidth,
                                            "padding-right": elem.options.margin + "px",
                                        });
                                    }
                                }
                                elem.find(".flickity-slider").css({
                                    "margin-right":
                                        -elem.options.margin / setResponsiveColumns + "px",
                                });
                                elem.flickity("reposition");
                            }, 300);
                        });
                    }
                });
            }
        },
    };
    INSPIRO.header = {
        functions: function () {
            INSPIRO.header.logoStatus();
            INSPIRO.header.stickyHeader();
            INSPIRO.header.topBar();
            INSPIRO.header.mainMenu();
            INSPIRO.header.mainMenuResponsiveShow();
            INSPIRO.header.pageMenu();
            INSPIRO.header.accordion();
            INSPIRO.header.tabs();
        },
        logoStatus: function (status) {
            var headerLogoDefault = headerLogo.find($(".logo-default")),
                headerLogoDark = headerLogo.find($(".logo-dark")),
                headerLogoFixed = headerLogo.find(".logo-fixed"),
                headerLogoResponsive = headerLogo.find(".logo-responsive");

            if ($header.hasClass("header-sticky") && headerLogoFixed.length > 0) {
                headerLogoDefault.css("display", "none");
                headerLogoDark.css("display", "none");
                headerLogoResponsive.css("display", "none");
                headerLogoFixed.css("display", "block");
            } else {
                headerLogoDefault.removeAttr("style");
                headerLogoDark.removeAttr("style");
                headerLogoResponsive.removeAttr("style");
                headerLogoFixed.removeAttr("style");
            }
            $(window).breakpoints("lessThan", "lg", function () {
                if (headerLogoResponsive.length > 0) {
                    headerLogoDefault.css("display", "none");
                    headerLogoDark.css("display", "none");
                    headerLogoFixed.css("display", "none");
                    headerLogoResponsive.css("display", "block");
                }
            });
        },
        stickyHeader: function () {
            var shrinkHeader = $header.attr("data-shrink") || 0,
                shrinkHeaderActive = $header.attr("data-sticky-active") || 200,
                scrollOnTop = $window.scrollTop();
            if ($header.hasClass("header-modern")) {
                shrinkHeader = 300;
            }

            $(window).breakpoints("greaterEqualTo", "lg", function () {
                if (!$header.is(".header-disable-fixed")) {
                    if (scrollOnTop > $headerOffsetTop + shrinkHeader) {
                        $header.addClass("header-sticky");
                        if (scrollOnTop > $headerOffsetTop + shrinkHeaderActive) {
                            $header.addClass("sticky-active");
                            if (Settings.submenuLight && Settings.headerHasDarkClass) {
                                $header.removeClass("dark");
                                Settings.headerDarkClassRemoved = true;
                            }
                            INSPIRO.header.logoStatus();
                        }
                    } else {
                        $header.removeClass().addClass($headerCurrentClasses);
                        if (Settings.sliderDarkClass && Settings.headerHasDarkClass) {
                            $header.removeClass("dark");
                            Settings.headerDarkClassRemoved = true;
                        }
                        INSPIRO.header.logoStatus();
                    }
                }
            });
            $(window).breakpoints("lessThan", "lg", function () {
                if (!$header.is(".header-disable-fixed")) {
                    if (scrollOnTop > $headerOffsetTop + shrinkHeader) {
                        $header.addClass("header-sticky");
                        if (scrollOnTop > $headerOffsetTop + shrinkHeaderActive) {
                            $header.addClass("sticky-active");
                            if (Settings.submenuLight && Settings.headerHasDarkClass) {
                                $header.removeClass("dark");
                                Settings.headerDarkClassRemoved = true;
                            }
                            INSPIRO.header.logoStatus();
                        }
                    } else {
                        $header.removeClass().addClass($headerCurrentClasses);
                        if (Settings.sliderDarkClass && Settings.headerHasDarkClass) {
                            $header.removeClass("dark");
                            Settings.headerDarkClassRemoved = true;
                        }
                        INSPIRO.header.logoStatus();
                    }
                }
            });
        },
        //chkd
        topBar: function () {
            if ($topbar.length > 0) {
                $("#topbar .topbar-dropdown .topbar-form").each(function (
                    index,
                    element
                ) {
                    if (
                        $window.width() - ($(element).width() + $(element).offset().left) <
                        0
                    ) {
                        $(element).addClass("dropdown-invert");
                    }
                });
            }
        },
        mainMenu: function () {
            if ($mainMenu.length > 0) {
                $mainMenu
                    .find(".dropdown, .dropdown-submenu")
                    .prepend('<span class="dropdown-arrow"></span>');

                var $menuItemLinks = $(
                        '#mainMenu nav > ul > li.dropdown > a[href="#"], #mainMenu nav > ul > li.dropdown > .dropdown-arrow, .dropdown-submenu > a[href="#"], .dropdown-submenu > .dropdown-arrow, .dropdown-submenu > span, .page-menu nav > ul > li.dropdown > a'
                    ),
                    $triggerButton = $("#mainMenu-trigger a, #mainMenu-trigger button"),
                    processing = false,
                    triggerEvent;

                $triggerButton.on("click", function (e) {
                    var elem = $(this);
                    e.preventDefault();
                    $(window).breakpoints("lessThan", "lg", function () {
                        var openMenu = function () {
                            if (!processing) {
                                processing = true;
                                Settings.menuIsOpen = true;
                                if (Settings.submenuLight && Settings.headerHasDarkClass) {
                                    $header.removeClass("dark");
                                    Settings.headerDarkClassRemoved = true;
                                } else {
                                    if (
                                        Settings.headerHasDarkClass &&
                                        Settings.headerDarkClassRemoved
                                    ) {
                                        $header.addClass("dark");
                                    }
                                }
                                elem.addClass("toggle-active");
                                $body.addClass("mainMenu-open");
                                INSPIRO.header.logoStatus();
                                $mainMenu.animate({
                                    "min-height": $window.height(),
                                }, {
                                    duration: 500,
                                    easing: "easeInOutQuart",
                                    start: function () {
                                        setTimeout(function () {
                                            $mainMenu.addClass("menu-animate");
                                        }, 300);
                                    },
                                    complete: function () {
                                        processing = false;
                                    },
                                });
                            }
                        };
                        var closeMenu = function () {
                            if (!processing) {
                                processing = true;
                                Settings.menuIsOpen = false;
                                INSPIRO.header.logoStatus();
                                $mainMenu.animate({
                                    "min-height": 0,
                                }, {
                                    start: function () {
                                        $mainMenu.removeClass("menu-animate");
                                    },
                                    done: function () {
                                        $body.removeClass("mainMenu-open");
                                        elem.removeClass("toggle-active");
                                        if (
                                            Settings.submenuLight &&
                                            Settings.headerHasDarkClass &&
                                            Settings.headerDarkClassRemoved &&
                                            !$header.hasClass("header-sticky")
                                        ) {
                                            $header.addClass("dark");
                                        }
                                        if (
                                            Settings.sliderDarkClass &&
                                            Settings.headerHasDarkClass &&
                                            Settings.headerDarkClassRemoved
                                        ) {
                                            $header.removeClass("dark");
                                            Settings.headerDarkClassRemoved = true;
                                        }
                                    },
                                    duration: 500,
                                    easing: "easeInOutQuart",
                                    complete: function () {
                                        processing = false;
                                    },
                                });
                            }
                        };
                        if (!Settings.menuIsOpen) {
                            triggerEvent = openMenu();
                        } else {
                            triggerEvent = closeMenu();
                        }
                    });
                });

                $menuItemLinks.on("click", function (e) {
                    $(this).parent("li").siblings().removeClass("hover-active");
                    if (
                        $body.hasClass("b--responsive") ||
                        $mainMenu.hasClass("menu-onclick")
                    ) {
                        $(this).parent("li").toggleClass("hover-active");
                    }
                    e.stopPropagation();
                    e.preventDefault();
                });

                $body.on("click", function (e) {
                    $mainMenu.find(".hover-active").removeClass("hover-active");
                });

                $(window).on("resize", function () {
                    if ($body.hasClass("mainMenu-open")) {
                        if (Settings.menuIsOpen) {
                            $mainMenuTriggerBtn.trigger("click");
                            $mainMenu.find(".hover-active").removeClass("hover-active");
                        }
                    }
                });

                /*invert menu fix*/
                $(window).breakpoints("greaterEqualTo", "lg", function () {
                    var $menuLastItem = $("nav > ul > li:last-child"),
                        $menuLastItemUl = $("nav > ul > li:last-child > ul"),
                        $menuLastInvert = $menuLastItemUl.width() - $menuLastItem.width(),
                        $menuItems = $("nav > ul > li").find(".dropdown-menu");

                    $menuItems.css("display", "block");

                    $(".dropdown:not(.mega-menu-item) ul ul").each(function (
                        index,
                        element
                    ) {
                        if (
                            $window.width() -
                            ($(element).width() + $(element).offset().left) <
                            0
                        ) {
                            $(element).addClass("menu-invert");
                        }
                    });

                    if ($menuLastItemUl.length > 0) {
                        if (
                            $window.width() -
                            ($menuLastItemUl.width() + $menuLastItem.offset().left) <
                            0
                        ) {
                            $menuLastItemUl.addClass("menu-last");
                        }
                    }
                    $menuItems.css("display", "");
                });
            }

            //Sidebar menu
            var $sidebarMenu = $(".sidebar-menu");
            $sidebarMenu
                .find(".sidebar-dropdown")
                .prepend('<span class="dropdown-arrow"></span>');
            $sidebarMenu
                .find('.sidebar-dropdown > a[href="#"]')
                .attr("href", "javascript:;");
            $('.sidebar-dropdown > a[href="javascript:;"], .sidebar-dropdown > .dropdown-arrow').on("click", function (e) {
                if ($(this).parent(".sidebar-dropdown").hasClass("active")) {
                    $(this).parent(".sidebar-dropdown").find(".sidebar-submenu").slideUp(200);
                    $(this).parent().removeClass("active");
                } else {
                    $(this).parent().removeClass("active");
                    $(this)
                        .parent(".sidebar-dropdown")
                        .find(".sidebar-submenu")
                        .slideDown(200);
                    $(this).parent().addClass("active");
                }
            });


            ///////////////// fixed menu on scroll for desktop

            var navbarFixedTop = $(".navbar-fixed-top");

            if (navbarFixedTop.length > 0) {
                var navbarFixedTopOffsetTop = navbarFixedTop.offset().top;
                if ($(window).width() > 992) {
                    $(window).scroll(function () {
                        if ($(this).scrollTop() > navbarFixedTopOffsetTop) {
                            $(".navbar-fixed-top").addClass("fixed-top");
                            // add padding top to show content behind navbar
                            $("body").css(
                                "padding-top",
                                $(".navbar-fixed-top").outerHeight() + "px"
                            );
                        } else {
                            $(".navbar-fixed-top").removeClass("fixed-top");
                            // remove padding top from body
                            $("body").css("padding-top", "0");
                        }
                    });
                } // end if
            }

            // Prevent closing from click inside dropdown
            $(document).on("click", ".dropdown-menu", function (e) {
                e.stopPropagation();
            });

            //chkd this - $(window).on('resize',function(){location.reload();});
            // refresh window on resize
            // $(window).on("resize", function () {
            //     if ($(window).width() > 992) {
            //         location.reload();
            //     }
            // });

            if ($(window).width() < 992) {
                $(".dropdown a, .dropdown-menu a").click(function (e) {
                    // e.preventDefault();
                    if ($(this).next(".dropdown-menu").length) {
                        $(this).next(".dropdown-menu").slideToggle();
                    }
                    $(".dropdown").on("hide.bs.dropdown", function () {
                        $(this).find(".dropdown-menu").hide();
                    });
                });
            }

            // offcanvas onmobile
            $("[data-trigger]").on("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                var offcanvas_id = $(this).attr("data-trigger");
                $(offcanvas_id).toggleClass("show");
                $("body").toggleClass("offcanvas-active");
                $(".screen-overlay").toggleClass("show");
            });

            // Close menu when pressing ESC
            $(document).on("keydown", function (event) {
                if (event.keyCode === 27) {
                    $(".mobile-offcanvas").removeClass("show");
                    $("body").removeClass("overlay-active");
                }
            });

            $(".btn-close, .screen-overlay").click(function (e) {
                $(".screen-overlay").removeClass("show");
                $(".mobile-offcanvas").removeClass("show");
                $("body").removeClass("offcanvas-active");
            });
        },
        mainMenuResponsiveShow: function () {
            $(window).breakpoints("lessThan", "lg", function () {
                if ($(".resposnsive-show").length > 0) {
                    $(".resposnsive-show").addClass("show");
                }
            });

            $(window).breakpoints("greaterEqualTo", "lg", function () {
                if ($(".resposnsive-show").length > 0) {
                    $(".resposnsive-show").removeClass("show");
                }
            });
        },
        accordion: function () {
            var accordionType = "accordion",
                toogleType = "toggle",
                accordionItem = "ac-item",
                itemActive = "ac-active",
                itemTitle = "ac-title",
                itemContent = "ac-content",
                $accs = $("." + accordionItem);
            $accs.length &&
            ($accs.each(function () {
                var $item = $(this);
                $item.hasClass(itemActive) ?
                    $item.addClass(itemActive) :
                    $item.find("." + itemContent).hide();
            }),
                $("." + itemTitle).on("click", function (e) {
                    var $link = $(this),
                        $item = $link.parents("." + accordionItem),
                        $acc = $item.parents("." + accordionType);
                    $item.hasClass(itemActive) ?
                        $acc.hasClass(toogleType) ?
                            ($item.removeClass(itemActive),
                                $link.next("." + itemContent).slideUp()) :
                            ($acc.find("." + accordionItem).removeClass(itemActive),
                                $acc.find("." + itemContent).slideUp()) :
                        ($acc.hasClass(toogleType) ||
                        ($acc.find("." + accordionItem).removeClass(itemActive),
                            $acc.find("." + itemContent).slideUp("fast")),
                            $item.addClass(itemActive),
                            $link.next("." + itemContent).slideToggle("fast")),
                        e.preventDefault();

                    if ($link.find(".custom-radio").length > 0) {
                        $link
                            .find(".custom-radio .custom-control-input")
                            .prop("checked", true);
                        return false;
                    }
                    return false;
                }));
        },
        pageMenu: function () {
            var $pageMenu = $(".page-menu");

            if ($pageMenu.length > 0) {
                $(window).breakpoints("greaterEqualTo", "lg", function () {
                    var shrinkPageMenu =
                        $pageMenu.attr("data-shrink") || $pageMenu.offset().top + 200;

                    if ($pageMenu.attr("data-sticky") == "true") {
                        $window.scroll(function () {
                            if ($window.scrollTop() > shrinkPageMenu) {
                                $pageMenu.addClass("sticky-active");
                                $header.addClass("pageMenu-sticky");
                            } else {
                                $pageMenu.removeClass("sticky-active");
                                $header.removeClass("pageMenu-sticky");
                            }
                        });
                    }
                });

                $pageMenu.each(function () {
                    $(this)
                        .find("#pageMenu-trigger")
                        .on("click", function () {
                            $pageMenu.toggleClass("page-menu-active");
                            $pageMenu.toggleClass("items-visible");
                        });
                });
            }
        },
        tabs: function () {
            $('.widget .nav-link').click(function (e) {
                e.preventDefault();
                $('.widget .nav-link').removeClass('active');
                $(this).addClass('active');
                $('.widget #tabs-posts-content .tab-pane').removeClass('show active');
                $('.widget #tabs-posts-content .tab-pane[data-labelledby="' + $(this).attr('data-controls') + '-tab"]').addClass('show active');
            });
        },
    };
    INSPIRO.elements = {
        functions: function () {
            INSPIRO.elements.animations();
            INSPIRO.elements.sidebarFixed();
        },
        animations: function () {
            var $animate = $("[data-animate]");
            if ($animate.length > 0) {
                //Check if jQuery Waypoint plugin is loaded
                if (typeof Waypoint === "undefined") {
                    INSPIRO.elements.notification(
                        "Warning",
                        "jQuery Waypoint plugin is missing in plugins.js file.",
                        "danger"
                    );
                    return true;
                }
                $animate.each(function () {
                    var elem = $(this);
                    elem.addClass("animate__animated");
                    //Plugin Options
                    elem.options = {
                        animation: elem.attr("data-animate") || "animate__fadeIn",
                        delay: elem.attr("data-animate-delay") || 200,
                        direction: ~elem.attr("data-animate").indexOf("Out") ?
                            "back" : "forward",
                        offsetX: elem.attr("data-animate-offsetX") || 0,
                        offsetY: elem.attr("data-animate-offsetY") || -100,
                    };
                    //Initializing jQuery Waypoint plugin and passing the options from data animations attributes
                    if (elem.options.direction == "forward") {
                        new Waypoint({
                            element: elem,
                            handler: function () {
                                var t = setTimeout(function () {
                                    elem.addClass(elem.options.animation + " visible");
                                }, elem.options.delay);
                                this.destroy();
                            },
                            offset: "100%",
                        });
                    } else {
                        elem.addClass("visible");
                        elem.on("click", function () {
                            elem.addClass(elem.options.animation);
                            return false;
                        });
                    }
                    //Demo play
                    if (elem.parents(".demo-play-animations").length) {
                        elem.on("click", function () {
                            elem.removeClass(elem.options.animation);
                            var t = setTimeout(function () {
                                elem.addClass(elem.options.animation);
                            }, 50);
                            return false;
                        });
                    }
                });
            }
        },
        notification: function (
            $title,
            $message,
            $type,
            $element,
            $delay,
            $placement,
            $animateEnter,
            $animateExit,
            $backgroundImage,
            $timeout
        ) {
            var $element,
                $elementContainer,
                $animateEnter = $animateEnter || "animate__fadeInDown",
                $animateExit = $animateExit || "animate__fadeOutDown",
                $placement,
                $backgroundImage,
                $backgroundImageContainer,
                $timeout;

            if ($placement) {
                $placement = $placement;
            } else {
                $placement = "top";
            }

            if ($element) {
                $elementContainer = "element-container";
                ($animateEnter = "animate__fadeIn"), ($animateExit = "animate__fadeOut");
            } else {
                $elementContainer = "col-11 col-md-4";
            }

            if ($backgroundImage) {
                $backgroundImageContainer =
                    'style="background-image:url(' +
                    $backgroundImage +
                    '); background-repeat: no-repeat; background-position: 50% 20%; height:120px !important; width:430px !important; border:0px;" ';
            }

            if (!$message) {
                $message = "";
            }

            $element = "body";

            var notify = function () {
                $.notify({
                    title: $title,
                    message: $message,
                }, {
                    element: $element,
                    type: $type || "warning",
                    delay: $delay || 10000,
                    template: '<div data-notify="container" ' +
                        $backgroundImageContainer +
                        ' class="bootstrap-notify ' +
                        $elementContainer +
                        ' alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        "</div>",
                    mouse_over: true,
                    allow_dismiss: true,
                    placement: {
                        from: $placement,
                    },
                    animate: {
                        enter: "animate__animated " + $animateEnter,
                        exit: "animate__animated " + $animateExit,
                    },
                });
            };

            if ($timeout) {
                setTimeout(function () {
                    notify();
                }, 2000);
            } else {
                notify();
            }
        },
        sidebarFixed: function () {
            if (INSPIRO.core.rtlStatus()) {
                return true;
            }
            var $sidebarFixed = $(".sticky-sidebar");
            if ($sidebarFixed.length > 0) {
                //Check if theiaStickySidebar plugin is loaded
                if (typeof $.fn.theiaStickySidebar === "undefined") {
                    INSPIRO.elements.notification(
                        "Warning",
                        "jQuery theiaStickySidebar plugin is missing in plugins.js file.",
                        "danger"
                    );
                    return true;
                }
                $sidebarFixed.each(function () {
                    var elem = $(this);
                    elem.options = {
                        additionalMarginTop: elem.attr("data-margin-top") || 120,
                        additionalMarginBottom: elem.attr("data-margin-bottom") || 50,
                    };
                    //Initialize theiaStickySidebar plugin and passing the options
                    elem.theiaStickySidebar({
                        additionalMarginTop: Number(elem.options.additionalMarginTop),
                        additionalMarginBottom: Number(elem.options.additionalMarginBottom),
                        disableOnResponsiveLayouts: true,
                    });
                });
            }
        },
    };
    //Load Functions on document ready
    $(document).ready(function () {
        INSPIRO.core.functions();
        INSPIRO.slider.functions();
        INSPIRO.header.functions();
        INSPIRO.elements.functions();
    });
    //Recall Functions on window scroll
    $window.on("scroll", function () {
        INSPIRO.header.stickyHeader();
    });
    //Recall Functions on window resize
    $window.on("resize", function () {
        INSPIRO.header.logoStatus();
        INSPIRO.header.stickyHeader();
        INSPIRO.header.mainMenuResponsiveShow();
    });
})(jQuery);

