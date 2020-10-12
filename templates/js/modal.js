(function($){

    const modal = $('.cookie-modal-container');
    const modal_inner = $('.cookie-modal-inner');
    let show_modal = true;

    $(document).ready(function() {

        $('.cookie-modal-btn').click(function() {
            console.log('asd');
            switchModal();
        });

        if(!modal.hasClass('cookie_set')) {
            let showModal = function() {
                if(show_modal) {
                    switchModal();
                }
            };
            setInterval(showModal, 4000);
        }

        $(document).keyup(function(e) {
            if (e.keyCode === 27) modal.fadeOut(300);
        });

        $('.btn-accept-all').click(function() {

            let data = {
                action: 'set_all_cookies',
                browser: Object.keys(jQuery.browser)[0]
            };

            if($('.stepbox-2').is(':visible')) {
                let request = false;

                $('.cookie-option-switch').each(function() {
                    let switch_el = $(this);

                    switch_el.find('.cookie-option-switch-dot').animate({left: 41}, 400, function() {
                        switch_el.removeClass('switch_off');
                        switch_el.addClass('switch_on');

                        if(!request) {
                            switchModal();

                            $.post( php.ajax_url, data, function () {
                                window.location.reload();
                            });
                            request = true;
                        }
                    });
                });
            } else {
                switchModal();

                $.post( php.ajax_url, data, function () {
                    window.location.reload();
                });
            }
        });

        $('.btn-accept-specific').click(function() {

            let data = {
                action: 'set_specific_cookies',
                // cookie_functional : $('.cookie_functional').hasClass('switch_on') ? '1' : '0',
                cookie_analitic : $('.cookie_analitic').hasClass('switch_on') ? '1' : '0',
                cookie_social: $('.cookie_social').hasClass('switch_on') ? '1' : '0',
                cookie_comercial: $('.cookie_comercial').hasClass('switch_on') ? '1' : '0',
                browser: Object.keys(jQuery.browser)[0]
            };

            switchModal();

            $.post( php.ajax_url, data, function () {
                window.location.reload();
            });
        });

        $('.btn-accept-partial').click(function() {
            $('.stepbox-1').hide("slide", { direction: "left" }, 200, function() {
                $('.stepbox-2').show("slide", { direction: "right" }, 200);
            });
        });

        function switchModal() {
            if(!$('.cookie-modal-container').is(':visible')) {
                modal.fadeIn(200, function() {
                    modal_inner.show("slide", { direction: "left" }, 800);
                });
            } else {
                modal_inner.hide("slide", { direction: "left" }, 600, function() {
                    modal.fadeOut(200);
                });
            }
            show_modal = false;
        }

        $('.cookie-option-switch').click(function() {
            let switch_el = $(this);
            if(switch_el.hasClass('switch_disabled')) {
                return;
            }

            if(switch_el.hasClass('switch_on')) {
                switch_el.find('.cookie-option-switch-dot').animate({left: -1}, 400, function() {
                    switch_el.removeClass('switch_on');
                    switch_el.addClass('switch_off');
                });
            } else {
                switch_el.find('.cookie-option-switch-dot').animate({left: 41}, 400, function() {
                    switch_el.removeClass('switch_off');
                    switch_el.addClass('switch_on');
                });
            }
        });
    });

})(jQuery);