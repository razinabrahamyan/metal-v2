window.footerHander = new Vue({
    el: "#footer",
    data: {
        map: undefined,
        placemark: undefined,
        points: addresses ?? null,
        yaMapsShown: false,
        calc_quiz_category: 10,
        weight: 1000,
    },
    watch: {
        calc_quiz_category: function () {
            $('[name="met_type_2"]').val($("[name=met_type_2] option:first").val());
        },
        weight: function () {
            this.calc();
        },
    },
    methods: {
        initMap: function () {
            this.map = new ymaps.Map("ymap", {
                center: [55.76, 37.64],
                zoom: 9,
                controls: []
            }, {
                searchControlProvider: 'yandex#search',
                suppressMapOpenBlock: true,
                suppressObsoleteBrowserNotifier: true,
            });

            this.map.controls.add(new ymaps.control.FullscreenControl());
            this.map.controls.add(new ymaps.control.ZoomControl({
                options: {
                    size: "small"
                }
            }));

            if (this.points !== null) {
                Object.entries(this.points).forEach(([key, point]) => {
                    this.map.geoObjects.add(new ymaps.Placemark([point.lat, point.lng], {
                        balloonContent: point.address
                    }));
                })
            }
        },
        moveToMapPoint: function (lat, lng) {
            this.map.setCenter([lat, lng], 15);
        },
        mountMap: function () {
            let el = $('#ymap')[0];
            var rect = el.getBoundingClientRect();

            if (rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /* or $(window).height() */
                rect.right <= (window.innerWidth || document.documentElement.clientWidth) /* or $(window).width() */) {
                var elem = document.createElement('script');
                elem.type = 'text/javascript';
                elem.src = 'https://api-maps.yandex.ru/2.1/?load=package.standard,package.geoObjects&lang=ru_RU&amp;apikey=8c1ddd83-7c9c-4d9e-a532-9c67ea915ff8&onload=window.footerHander.initMap';
                document.getElementsByTagName('body')[0].appendChild(elem);
                this.yaMapsShown = true;
            }
        },
        calc: function () {
            if ($('.calculator_block').length > 0) {
                setTimeout(function () {
                    let price = ($('[name="met_type_2"]').val() !== undefined) ? $('[name="met_type_2"]').val().replace(/ /g, '') * 1 : 0;
                    let forTonn = [7, 8, 9, 10];
                    if (forTonn.includes(window.footerHander.calc_quiz_category)) {
                        $('#totalPrice').text(price * (window.footerHander.weight / 1000));
                    } else {
                        $('#totalPrice').text(price * window.footerHander.weight);
                    }
                }, 25);
            }
        },
        seo: function (){
            /*SEO*/
            $('.breadcrumb').attr('itemscope', '').attr('itemtype', 'https://schema.org/BreadcrumbList');
            $('.breadcrumb li').attr('itemscope', '').attr('itemprop', "itemListElement").attr('itemtype', 'https://schema.org/ListItem');
            let breadcrumbCount = 1;
            $('.breadcrumb li:not(".active") a').attr('itemprop', 'item').each(function () {
                $(this).append('<meta itemprop="position" content="' + breadcrumbCount + '">');
                $(this).append('<meta itemprop="name" content="' + $(this).text() + '">');
                breadcrumbCount++;
            });
            $('.breadcrumb li.active').each(function () {
                $(this).append('<meta itemprop="position" content="' + breadcrumbCount + '">');
                $(this).append('<meta itemprop="name" content="' + $(this).text() + '">');
                breadcrumbCount++;
            });
            /*SEO*/
        },
        scb: function (){
            document.addEventListener("SCBWidgetOpen", function (event) {
                $('#scb_block,.scb_back-wrapper,#scb_button_wait,#scb_phone_input,.scb_checkbox_border').attr('style', 'border-radius: 0.42rem !important;');
                $('body').addClass('overflow-hidden');
            });
            document.addEventListener("SCBWidgetClose", function (event) {
                $('body').removeClass('overflow-hidden');
            });

            //Костыль для SCB
            $('#scb_udobnoe_block').ready(function () {
                setTimeout(function () {
                    if (typeof (dat) !== "undefined") {
                        $('#scb_udobnoe_block').remove();
                    }
                }, 1000);
                setTimeout(function () {
                    if (typeof (dat) !== "undefined") {
                        $('#scb_udobnoe_block').remove();
                    }
                }, 2000);
            });

            $('.lmk_scb_open_call').click(function () {
                if (typeof SCBopen !== "undefined") {
                    SCBopen(1, 'callback');
                } else {
                    console.log('SCB не доступен');
                }
            });
        },
        addMask: function (selector, masked = '+7 (___) ___-__-__') {
            const elems = document.querySelectorAll(selector);

            function mask(event) {
                const keyCode = event.keyCode;
                const template = masked,
                    def = template.replace(/\D/g, ""),
                    val = this.value.replace(/\D/g, "");
                let i = 0,
                    newValue = template.replace(/[_\d]/g, function (a) {
                        return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
                    });
                i = newValue.indexOf("_");
                if (i !== -1) {
                    newValue = newValue.slice(0, i);
                }
                let reg = template.substr(0, this.value.length).replace(/_+/g,
                    function (a) {
                        return "\\d{1," + a.length + "}";
                    }).replace(/[+()]/g, "\\$&");
                reg = new RegExp("^" + reg + "$");
                if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) {
                    this.value = newValue;
                }
                if (event.type === "blur" && this.value.length < 5) {
                    this.value = "";
                }

            }

            for (const elem of elems) {
                elem.addEventListener("input", mask);
                elem.addEventListener("focus", mask);
                elem.addEventListener("blur", mask);
            }
        },
    },
    mounted() {
        if ($('#ymap').is(":visible")) {
            this.mountMap();
            $(window).scroll(function () {
                if (!window.footerHander.yaMapsShown) {
                    window.footerHander.mountMap();
                }
            });
        }
        this.addMask('#wizard7 input[name=phone]');
        this.addMask('.widget-contact-form input[name=phone]');
        this.calc();
        this.seo();
        this.scb();
    },
});

new Vue({
    el: '.wizard_form_products',
    data: {
        quiz_category: 10,
    },
});

window.contactForm = new Vue({
    el: '.widget-contact-form',
    data: {
        formData: undefined,
        formSent: false,
    },
    methods: {
        sendForm: function (e) {
            e.preventDefault();
            if (Cookies.get("FORM_HAS_SENDED") !== "1") {
                const config = {
                    headers: {
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                }
                let formData = new FormData(e.target);
                formData.append('page', $('h1').text());

                axios.post('/axios/send-form', formData, config).then(response => {
                    if (response.status !== 200) {
                        // window.notify.formSuccess()
                        INSPIRO.elements.notification("Ошибка уже оформлена", "Попробуйте через 3 минуты", "danger");
                    } else {
                        var date = new Date();
                        date.setTime(date.getTime() + (3 * 60 * 1000));
                        expires = "; expires=" + date.toUTCString();
                        document.cookie = 'FORM_HAS_SENDED' + "=1" + expires + "; path=/";
                        INSPIRO.elements.notification("Заявка оформлена!",
                            "Наши консультанты свяжутся с вами в ближайшее время.", "success");
                    }
                }).catch(e => {
                    INSPIRO.elements.notification("Упс!", "Что то пошло не так...", "danger");
                    console.log(e);
                });
            } else {
                INSPIRO.elements.notification("Ошибка уже оформлена", "Попробуйте через 3 минуты", "danger");
            }
        },
    },
});
