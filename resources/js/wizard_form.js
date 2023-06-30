var wizard7 = $('#wizard7');
wizard7.steps({
    headerTag: "h3",
    bodyTag: '.wizard-content',
    autoFocus: true,
    enableAllSteps: true,
    titleTemplate: '<span class="number">#index#</span><span class="title">#title#</span>',
    onStepChanging: function (event, currentIndex, newIndex) {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex) {
            return true;
        }
        return wizard7.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex) {
    },
    onFinishing: function (event, currentIndex) {
        if (Cookies.get("FORM_HAS_SENDED") !== "1") {
            let isValid = wizard7.valid();
            if (isValid) {
                const config = {
                    headers: {
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                }

                let formData = new FormData(event.target);
                formData.append('page', $('h1').text());
                formData.append('link', window.location.href);

                axios.post('/axios/send-form', formData, config).then(response => {
                    if (response.status !== 200) {
                        return false;
                    } else {
                        var date = new Date();
                        date.setTime(date.getTime() + (3 * 60 * 1000));
                        expires = "; expires=" + date.toUTCString();
                        document.cookie = 'FORM_HAS_SENDED' + "=1" + expires + "; path=/";
                    }
                }).catch(e => {
                    console.log(e);
                    INSPIRO.elements.notification("Упс!", "Что то пошло не так...", "danger");
                    return false;
                });

            }

            return isValid;
        } else {
            INSPIRO.elements.notification("Ошибка уже оформлена", "Попробуйте через 3 минуты", "danger");
            return false;
        }
    },
    onFinished: function (event, currentIndex) {
        INSPIRO.elements.notification("Заявка оформлена!",
            "Наши консультанты свяжутся с вами в ближайшее время.", "success");
    }
});
//Validation
wizard7.validate({
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    errorElement: "div",
    rules: {
        full_name: {
            required: true,
            minlength: 1,
        },
        phone: {
            required: true,
            minlength: 18,
            maxlength: 18
        },
    },
    messages: {
        full_name: "Введите Ф.И.O клиента",
        phone: {
            required: "Введите телефон клиента",
            minlength: "Введите телефон полностью",
        },
    },
    errorPlacement: function (error, element) {
        $(element).parents(".form-group").append(error);
    }
});
$('.wizard').find(".actions ul > li > a").addClass("btn");
